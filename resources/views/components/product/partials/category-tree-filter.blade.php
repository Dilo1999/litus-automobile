@props([
    'nodes' => [],
    'depth' => 0,
    'selectedCategories' => [],
    'selectedSubCategories' => [],
    'context' => 'drawer',
])

@foreach($nodes as $node)
    @php
        $name = $node['name'];
        $count = $node['count'];
        $children = $node['children'] ?? [];
        $isRoot = ($node['rootName'] ?? null) === null;
        $hasChildren = !empty($children);
        $toggleKey = 'tree-' . (isset($node['id']) ? (int) $node['id'] : md5($name . '-' . $depth)) . '-' . $context;
        $isSelected = $isRoot ? in_array($name, $selectedCategories) : in_array($name, $selectedSubCategories);
        // Start collapsed (+) on load; expand only when server says so (e.g. path to a selected filter)
        $isExpanded = (bool) ($hasChildren ? ($node['expand'] ?? false) : ($node['expand'] ?? $isSelected));
        $indentPx = $depth > 0 ? (12 + $depth * 20) : 0;
    @endphp
    <div class="category-tree-item">
        <div class="category-tree-row flex items-center gap-2 py-2 pr-1.5 min-h-[2.25rem] rounded-lg transition-colors {{ $isSelected ? 'category-tree-row--selected' : '' }}" style="{{ $indentPx > 0 ? 'padding-left: ' . $indentPx . 'px;' : 'padding-left: 0.5rem;' }}">
            <label class="flex items-center gap-2.5 cursor-pointer flex-1 min-w-0">
                @if($isRoot)
                    <input type="checkbox" name="category[]" value="{{ $name }}" {{ $isSelected ? 'checked' : '' }} class="product-filter-checkbox rounded border-stone-300 h-4 w-4 shrink-0">
                @else
                    <input type="checkbox" name="sub_category[]" value="{{ $name }}" {{ $isSelected ? 'checked' : '' }} class="product-filter-checkbox rounded border-stone-300 h-3.5 w-3.5 shrink-0">
                @endif
                <span class="category-tree-name text-sm font-medium truncate {{ $isRoot ? 'text-stone-800' : 'text-stone-600' }}">{{ $name }}</span>
                <span class="category-tree-count shrink-0">{{ $count }}</span>
            </label>
            @if($hasChildren)
                <button
                    type="button"
                    class="category-tree-toggle inline-flex items-center justify-center w-7 h-7 text-stone-500 rounded-lg shrink-0 cursor-pointer transition-colors border border-transparent hover:bg-stone-200/60 hover:text-stone-800"
                    data-category-toggle="{{ $toggleKey }}"
                    aria-expanded="{{ $isExpanded ? 'true' : 'false' }}"
                    aria-label="{{ $isExpanded ? 'Collapse' : 'Expand' }} {{ $name }}"
                >
                    <span data-toggle-icon class="text-sm font-semibold leading-none">{{ $isExpanded ? '−' : '+' }}</span>
                </button>
            @else
                <span class="w-7 shrink-0 block"></span>
            @endif
        </div>

        @if($hasChildren)
            <div
                class="category-tree-children border-l-2 ml-3 pl-0.5 {{ $isExpanded ? '' : 'hidden' }}"
                data-subcategories-for="{{ $toggleKey }}"
                style="border-color: rgba(193,155,70,0.25);"
            >
                @include('components.product.partials.category-tree-filter', [
                    'nodes' => $children,
                    'depth' => $depth + 1,
                    'selectedCategories' => $selectedCategories,
                    'selectedSubCategories' => $selectedSubCategories,
                    'context' => $context,
                ])
            </div>
        @endif
    </div>
@endforeach
