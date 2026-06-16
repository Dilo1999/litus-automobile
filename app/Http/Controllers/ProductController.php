<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->latest();

        // Filter by search (name or title)
        $search = $request->filled('search') ? trim($request->search) : null;
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        // Filter by categories (hierarchical: root or any branch)
        $selectedCategories = $request->has('category') ? (array) $request->category : [];
        $selectedCategories = array_filter(array_map('trim', $selectedCategories));
        $selectedSubCategories = $request->has('sub_category') ? (array) $request->sub_category : [];
        $selectedSubCategories = array_filter(array_map('trim', $selectedSubCategories));

        if (!empty($selectedCategories) || !empty($selectedSubCategories)) {
            $query->where(function ($q) use ($selectedCategories, $selectedSubCategories) {
                // Products under any selected root (e.g. "computer" = all products with category=computer)
                if (!empty($selectedCategories)) {
                    $q->orWhereIn('category', $selectedCategories);
                }
                // Products under any selected branch: category=root AND sub_category in (node + descendants)
                // e.g. select "desk" → products where category=computer AND sub_category in (desk, desktop, anthima sub)
                if (!empty($selectedSubCategories)) {
                    foreach ($selectedSubCategories as $subName) {
                        $pairs = Category::getFilterExpansionForSubCategory($subName);
                        foreach ($pairs as $pair) {
                            $q->orWhere(function ($q2) use ($pair) {
                                $q2->where('category', $pair['root'])
                                    ->whereIn('sub_category', $pair['subs']);
                            });
                        }
                    }
                }
            });
        }

        // Filter by brands (any of the selected)
        $selectedBrands = $request->has('brand') ? (array) $request->brand : [];
        $selectedBrands = array_filter(array_map('trim', $selectedBrands));
        if (!empty($selectedBrands)) {
            $query->whereIn('brand', $selectedBrands);
        }

        $products = $query->paginate(20)->withQueryString();

        // Featured product for hero (first product from catalog)
        $featuredProduct = Product::query()->latest()->first();

        $catalogProducts = Product::query()->latest()->get();
        $promotionProducts = $catalogProducts->take(4);
        $topSellingProducts = $catalogProducts->count() > 4
            ? $catalogProducts->slice(4, 4)->values()
            : $catalogProducts->take(4);

        // Facets with product counts (from all products, not just current filter)
        $baseQuery = Product::query();
        if ($search) {
            $baseQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        // Build full category tree from categories table (hierarchy: parent_id)
        $categoryRecords = Category::query()
            ->orderBy('name')
            ->get();

        $categoryTree = $this->buildCategoryTreeFromRecords($categoryRecords, $baseQuery, $selectedCategories, $selectedSubCategories);

        // Legacy flat structures for backward compatibility (used by filter UI as fallback)
        $parentCategoryNames = $categoryRecords->whereNull('parent_id')->pluck('name')->values()->all();
        $categories = [];
        foreach ($parentCategoryNames as $categoryName) {
            $count = (clone $baseQuery)->where('category', $categoryName)->count();
            $categories[$categoryName] = $count;
        }
        $subCategoriesByCategory = [];
        foreach ($categoryRecords->whereNotNull('parent_id') as $record) {
            $parent = $categoryRecords->firstWhere('id', $record->parent_id);
            $parentName = $parent ? $parent->name : null;
            $subName = $record->name;
            if (empty($parentName) || empty($subName)) continue;
            if (!isset($subCategoriesByCategory[$parentName])) $subCategoriesByCategory[$parentName] = [];
            $count = (clone $baseQuery)->where('category', $parentName)->where('sub_category', $subName)->count();
            $subCategoriesByCategory[$parentName][$subName] = $count;
        }

        // Brands from brands table (with product counts)
        $brandRecords = Brand::query()->orderBy('name')->get();
        $brands = [];
        foreach ($brandRecords as $brand) {
            $count = (clone $baseQuery)
                ->where('brand', $brand->name)
                ->count();
            $brands[$brand->name] = $count;
        }

        // Brands from brands table for hero strip
        $brandList = $brandRecords;

        return view('home', compact(
            'products',
            'featuredProduct',
            'promotionProducts',
            'topSellingProducts',
            'brandList',
            'categories',
            'categoryTree',
            'brands',
            'selectedCategories',
            'selectedSubCategories',
            'selectedBrands',
            'search',
            'subCategoriesByCategory',
        ));
    }

    /**
     * Build full category tree for the filter so every level is visible (computer → desk → desktop → anthima sub).
     * Uses a plain array keyed by integer parent_id so child lookups work at every depth.
     */
    private function buildCategoryTreeFromRecords($allCategories, $baseQuery, array $selectedCategories, array $selectedSubCategories): array
    {
        $byParentId = [];
        foreach ($allCategories as $c) {
            $pid = $c->parent_id === null ? 0 : (int) $c->parent_id;
            if (! isset($byParentId[$pid])) {
                $byParentId[$pid] = [];
            }
            $byParentId[$pid][] = $c;
        }

        $build = function ($parentId, $rootName) use ($byParentId, $baseQuery, $selectedCategories, $selectedSubCategories, &$build) {
            $parentKey = (int) $parentId;
            $childList = $byParentId[$parentKey] ?? [];
            $children = collect($childList)->sortBy('name')->values();
            $nodes = [];
            foreach ($children as $cat) {
                $catId = (int) $cat->id;
                $nextRootName = $rootName === null ? $cat->name : $rootName;
                $childNodes = $build($catId, $nextRootName);
                if ($rootName === null) {
                    $count = (clone $baseQuery)->where('category', $cat->name)->count();
                } else {
                    $subNames = $cat->getSelfAndDescendantNames();
                    $count = (clone $baseQuery)->where('category', $rootName)->whereIn('sub_category', $subNames)->count();
                }
                $isSelected = $rootName === null
                    ? in_array($cat->name, $selectedCategories)
                    : in_array($cat->name, $selectedSubCategories);
                $hasSelectedDescendant = collect($childNodes)->contains('expand', true);
                // Start collapsed (+) on load; only expand when this node or a descendant is selected (so the path to selection stays visible)
                $expand = $isSelected || $hasSelectedDescendant;

                $nodes[] = [
                    'id' => $cat->id,
                    'name' => $cat->name,
                    'count' => $count,
                    'rootName' => $rootName === null ? null : $rootName,
                    'children' => $childNodes,
                    'expand' => $expand,
                ];
            }
            return $nodes;
        };

        return $build(0, null);
    }

    public function show(Product $product)
    {
        return view('product', compact('product'));
    }

    /**
     * Search products for quote modal (returns JSON).
     */
    public function searchForQuote(Request $request)
    {
        $q = $request->filled('q') ? trim($request->q) : '';
        if (strlen($q) < 2) {
            return response()->json(['products' => []]);
        }
        $products = Product::query()
            ->where(function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%')
                    ->orWhere('title', 'like', '%' . $q . '%');
            })
            ->orderBy('name')
            ->limit(15)
            ->get(['id', 'name', 'title']);
        return response()->json([
            'products' => $products->map(fn ($p) => [
                'id' => $p->id,
                'name' => $p->name,
                'title' => $p->title ?: $p->name,
            ]),
        ]);
    }
}
