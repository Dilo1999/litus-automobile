<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->latest();

        $search = $request->filled('search') ? trim($request->search) : null;
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        $selectedBrands = $request->has('brand') ? (array) $request->brand : [];
        $selectedBrands = array_filter(array_map('trim', $selectedBrands));
        if (! empty($selectedBrands)) {
            $query->whereIn('brand', $selectedBrands);
        }

        $products = $query->paginate(20)->withQueryString();

        $featuredProduct = Product::query()->latest()->first();

        $catalogProducts = Product::query()->latest()->get();
        $promotionProducts = $catalogProducts->take(4);
        $topSellingProducts = $catalogProducts->count() > 4
            ? $catalogProducts->slice(4, 4)->values()
            : $catalogProducts->take(4);

        $baseQuery = Product::query();
        if ($search) {
            $baseQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        $brandRecords = Brand::query()->orderBy('name')->get();
        $brands = [];
        foreach ($brandRecords as $brand) {
            $count = (clone $baseQuery)
                ->where('brand', $brand->name)
                ->count();
            $brands[$brand->name] = $count;
        }

        $brandList = $brandRecords;

        return view('pages.home', compact(
            'products',
            'featuredProduct',
            'promotionProducts',
            'topSellingProducts',
            'brandList',
            'brands',
            'selectedBrands',
            'search',
        ));
    }

    public function show(Product $product)
    {
        $productName = $product->displayName();
        $imageUrl = $product->imageUrl();
        $specs = $product->parsedSpecs();
        $originalPrice = $product->formatMoney($product->original_price !== null ? (float) $product->original_price : null);
        $salePrice = $product->formatMoney($product->sale_price !== null ? (float) $product->sale_price : null);
        $specialDiscount = $product->formatMoney($product->resolvedSpecialDiscount());
        $whatsapp = 'https://wa.me/9607797442?text=' . rawurlencode('Hi, I am interested in ' . $productName);

        return view('pages.product', compact(
            'product',
            'productName',
            'imageUrl',
            'specs',
            'originalPrice',
            'salePrice',
            'specialDiscount',
            'whatsapp',
        ));
    }

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
