<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
    ];

    protected $casts = [
        'parent_id' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = static::uniqueSlugFor($category->name);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') && ! $category->isDirty('slug')) {
                $category->slug = static::uniqueSlugFor($category->name, $category->id);
            }
        });

        static::saving(function ($category) {
            if ($category->parent_id == $category->id) {
                $category->parent_id = null;
            }
            if ($category->exists && $category->parent_id && in_array($category->parent_id, $category->getDescendantIds())) {
                $category->parent_id = null;
            }
        });
    }

    protected static function uniqueSlugFor(string $name, ?int $excludeId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $count = 0;
        while (true) {
            $query = static::where('slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
            if (! $query->exists()) {
                break;
            }
            $count++;
            $slug = $base . '-' . $count;
        }
        return $slug;
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('name');
    }

    /**
     * Get all descendant category IDs (children, grandchildren, etc.) to prevent circular parent.
     */
    public function getDescendantIds(): array
    {
        $ids = [];
        foreach ($this->children as $child) {
            $ids[] = $child->id;
            $ids = array_merge($ids, $child->getDescendantIds());
        }
        return $ids;
    }

    /**
     * Breadcrumb path e.g. "Electronics > Phones > Smartphones"
     */
    public function getBreadcrumbAttribute(): string
    {
        $parts = [];
        $cat = $this;
        while ($cat) {
            array_unshift($parts, $cat->name);
            $cat = $cat->parent;
        }
        return implode(' › ', $parts);
    }

    /**
     * Depth in hierarchy (0 = top-level, 1 = first sub-category, etc.)
     */
    public function getDepthAttribute(): int
    {
        $depth = 0;
        $cat = $this->parent;
        while ($cat) {
            $depth++;
            $cat = $cat->parent;
        }
        return $depth;
    }

    /**
     * Get all sub-category names (descendants) for a root category by name.
     * Used for product form: Sub Category options under the selected Category.
     */
    public static function getSubCategoryOptionsForRoot(?string $rootName): array
    {
        if (blank($rootName)) {
            return [];
        }
        $root = static::query()->whereNull('parent_id')->where('name', $rootName)->first();
        if (! $root) {
            return [];
        }
        $ids = $root->getDescendantIds();
        if (empty($ids)) {
            return [];
        }
        return static::query()->whereIn('id', $ids)->orderBy('name')->pluck('name', 'name')->toArray();
    }

    /**
     * Get direct children of a category within a root branch.
     * $parentName null = direct children of root. Otherwise the named category under that root.
     */
    public static function getDirectChildrenInRoot(?string $rootName, ?string $parentName = null): array
    {
        if (blank($rootName)) {
            return [];
        }
        $all = static::query()->orderBy('name')->get();

        // Build maps for quick traversal without relying on lazy-loaded relationships.
        $byId = $all->keyBy('id');
        $byParentId = [];
        foreach ($all as $c) {
            $pid = $c->parent_id === null ? 0 : (int) $c->parent_id;
            if (! isset($byParentId[$pid])) {
                $byParentId[$pid] = [];
            }
            $byParentId[$pid][] = $c;
        }

        // Locate the root by name (top-level category with this name).
        /** @var self|null $root */
        $root = $all->first(function ($c) use ($rootName) {
            return $c->parent_id === null && $c->name === $rootName;
        });

        if (! $root) {
            return [];
        }

        // If no parentName provided, return direct children of the root.
        if (blank($parentName)) {
            return collect($byParentId[(int) $root->id] ?? [])
                ->sortBy('name')
                ->pluck('name', 'name')
                ->toArray();
        }

        // Otherwise, find the parent node with this name under the root's subtree.
        $targetParent = null;
        $queue = [(int) $root->id];
        while (! empty($queue)) {
            $id = array_shift($queue);
            foreach ($byParentId[$id] ?? [] as $child) {
                if (trim($child->name) === $parentName) {
                    $targetParent = $child;
                    break 2;
                }
                $queue[] = (int) $child->id;
            }
        }

        if (! $targetParent) {
            return [];
        }

        return collect($byParentId[(int) $targetParent->id] ?? [])
            ->sortBy('name')
            ->pluck('name', 'name')
            ->toArray();
    }

    /**
     * Find a category by name that is a descendant of the given root.
     */
    public static function findCategoryByNameUnderRoot(self $root, string $name): ?self
    {
        if ($root->name === $name) {
            return $root;
        }
        foreach ($root->children as $child) {
            $found = static::findCategoryByNameUnderRoot($child, $name);
            if ($found) {
                return $found;
            }
        }
        return null;
    }

    /**
     * Path from root's immediate child to leaf: e.g. ['desk', 'desktop', 'anthima sub'].
     * Used to fill cascading level fields when editing a product.
     */
    public static function getPathFromRootToLeaf(?string $rootName, ?string $leafName): array
    {
        if (blank($rootName) || blank($leafName)) {
            return [];
        }
        $root = static::query()->whereNull('parent_id')->where('name', $rootName)->first();
        if (! $root) {
            return [];
        }
        $leaf = static::findCategoryByNameUnderRoot($root, $leafName);
        if (! $leaf || $leaf->id === $root->id) {
            return [];
        }
        $path = [];
        $cat = $leaf;
        while ($cat && (int) $cat->id !== (int) $root->id) {
            $path[] = $cat->name;
            $cat = $cat->parent;
        }
        return array_reverse($path);
    }

    /**
     * Names of this category and all descendants (for product filter: products can have sub_category = any of these).
     */
    public function getSelfAndDescendantNames(): array
    {
        $names = [$this->name];
        foreach ($this->children as $child) {
            $names = array_merge($names, $child->getSelfAndDescendantNames());
        }
        return $names;
    }

    /**
     * For filter: given a selected sub-category name, return [root, subs] so we filter
     * products where category=root AND sub_category IN subs (covers this node and all descendants).
     * Returns array of ['root' => string, 'subs' => string[]] (one per branch if name exists in multiple roots).
     * Uses a flat list + parent_id so super sub-categories (any depth) are found reliably.
     */
    public static function getFilterExpansionForSubCategory(string $subCategoryName): array
    {
        $subCategoryName = trim($subCategoryName);
        if ($subCategoryName === '') {
            return [];
        }

        $all = static::query()->orderBy('name')->get();
        $byId = $all->keyBy('id');
        $byParentId = [];
        foreach ($all as $c) {
            $pid = $c->parent_id === null ? 0 : (int) $c->parent_id;
            if (! isset($byParentId[$pid])) {
                $byParentId[$pid] = [];
            }
            $byParentId[$pid][] = $c;
        }

        // Find all categories whose name matches (same name can exist under different roots)
        $matchingNodes = $all->filter(function ($c) use ($subCategoryName) {
            return trim($c->name) === $subCategoryName;
        });

        $result = [];
        foreach ($matchingNodes as $node) {
            $root = static::resolveRootFromNode($node, $byId);
            if (! $root) {
                continue;
            }
            $subs = static::collectSelfAndDescendantNames($node->id, $byParentId);
            $result[] = [
                'root' => $root->name,
                'subs' => $subs,
            ];
        }

        return $result;
    }

    /**
     * Walk up parent_id to get the root category.
     */
    private static function resolveRootFromNode(self $node, $byId): ?self
    {
        $cat = $node;
        while ($cat->parent_id !== null) {
            $parentId = (int) $cat->parent_id;
            $cat = $byId->get($parentId);
            if (! $cat) {
                return null;
            }
        }
        return $cat;
    }

    /**
     * Collect category name and all descendant names using byParentId map (no relationship loading).
     */
    private static function collectSelfAndDescendantNames(int $categoryId, array $byParentId): array
    {
        $names = [];
        $stack = [$categoryId];
        $byId = [];
        foreach ($byParentId as $pid => $list) {
            foreach ($list as $c) {
                $byId[(int) $c->id] = $c;
            }
        }
        while (! empty($stack)) {
            $id = array_shift($stack);
            $cat = $byId[$id] ?? null;
            if (! $cat) {
                continue;
            }
            $names[] = $cat->name;
            $children = $byParentId[(int) $id] ?? [];
            foreach ($children as $child) {
                $stack[] = (int) $child->id;
            }
        }
        return $names;
    }
}
