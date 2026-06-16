@props([
    'products',
    'featuredProduct' => null,
    'promotionProducts' => collect(),
    'topSellingProducts' => collect(),
    'brandList' => [],
    'categories' => [],
    'categoryTree' => [],
    'brands' => [],
    'selectedCategories' => [],
    'selectedSubCategories' => [],
    'selectedBrands' => [],
    'search' => '',
    'subCategoriesByCategory' => [],
])

@php
    $navy = '#00105B';
    $red = '#C41E3A';
@endphp

<x-layouts.app title="Al Zaha General Trading">
    <div class="min-h-screen">
        <x-home.hero :featured-product="$featuredProduct" />

        <x-home.promotions :products="$promotionProducts" />

        <x-home.top-selling :products="$topSellingProducts" />

        <x-home.whats-new />

        <x-home.offerings />

        <x-home.who-we-are />

        <x-home.gallery />

        @if(count($brandList) > 0)
            <x-shared.brand-strip :brands="$brandList" accent="{{ $navy }}" />
        @endif

        {{-- Product Catalog --}}
        <section id="products" class="py-12 md:py-16 lg:py-20 relative overflow-hidden bg-white">
            <div class="relative z-10 site-container">
                <div class="mb-8 md:mb-10 text-center">
                    <h2 class="litus-section-title">Browse Our Catalog</h2>
                    <p class="mt-2 text-sm text-[var(--color-muted)]">Motorcycles, spare parts, tyres and more</p>
                </div>

                <form method="GET" action="{{ route('home') }}#products" id="home-filters-form">
                    <x-product.filter
                        :categories="$categories"
                        :category-tree="$categoryTree"
                        :brands="$brands"
                        :selected-categories="$selectedCategories"
                        :selected-sub-categories="$selectedSubCategories"
                        :selected-brands="$selectedBrands"
                        :search="$search"
                        :sub-categories-by-category="$subCategoriesByCategory"
                        :product-count="isset($products) && $products->count() > 0 ? ['first' => $products->firstItem(), 'last' => $products->lastItem(), 'total' => $products->total()] : null"
                        accent="{{ $navy }}"
                    />

                    @if(isset($products) && $products->count() > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 sm:gap-6 lg:gap-6 xl:gap-7 mt-6">
                            @foreach($products as $product)
                                <x-product.card :product="$product" />
                            @endforeach
                        </div>

                        @if($products->hasPages())
                            <nav class="mt-12 flex justify-center" aria-label="Product pagination">
                                <div class="inline-flex items-center gap-0.5 p-1 rounded-full bg-white border border-stone-200 shadow-sm">
                                    @if($products->onFirstPage())
                                        <span class="px-4 py-2 text-sm text-stone-400 select-none rounded-full">Previous</span>
                                    @else
                                        <a href="{{ $products->previousPageUrl() }}" class="px-4 py-2 text-sm font-medium text-stone-700 hover:bg-stone-100 rounded-full transition-colors">Previous</a>
                                    @endif

                                    @php
                                        $current = $products->currentPage();
                                        $last = $products->lastPage();
                                        $showFirst = min(3, $last);
                                    @endphp
                                    @foreach(range(1, $showFirst) as $page)
                                        @if($page === $current)
                                            <span class="min-w-[2.25rem] px-2.5 py-2 text-center text-sm font-semibold rounded-full text-white" style="background: {{ $navy }};" aria-current="page">{{ $page }}</span>
                                        @else
                                            <a href="{{ $products->url($page) }}" class="min-w-[2.25rem] px-2.5 py-2 text-center text-sm font-medium text-stone-700 hover:bg-stone-100 rounded-full transition-colors">{{ $page }}</a>
                                        @endif
                                    @endforeach

                                    @if($last > 3)
                                        <span class="px-2 py-2 text-stone-500">…</span>
                                        @if($last === $current)
                                            <span class="min-w-[2.25rem] px-2.5 py-2 text-center text-sm font-semibold rounded-full text-white" style="background: {{ $navy }};" aria-current="page">{{ $last }}</span>
                                        @else
                                            <a href="{{ $products->url($last) }}" class="min-w-[2.25rem] px-2.5 py-2 text-center text-sm font-medium text-stone-700 hover:bg-stone-100 rounded-full transition-colors">{{ $last }}</a>
                                        @endif
                                    @endif

                                    @if($products->hasMorePages())
                                        <a href="{{ $products->nextPageUrl() }}" class="px-4 py-2 text-sm font-medium text-stone-700 hover:bg-stone-100 rounded-full transition-colors">Next</a>
                                    @else
                                        <span class="px-4 py-2 text-sm text-stone-400 select-none rounded-full">Next</span>
                                    @endif
                                </div>
                            </nav>
                        @endif
                    @else
                        <div class="flex flex-col items-center justify-center py-16 md:py-24 px-6 rounded-2xl bg-[var(--color-bg)] border border-stone-200 mt-6">
                            @if(!empty($selectedCategories) || !empty($selectedSubCategories) || !empty($selectedBrands) || (isset($search) && $search !== ''))
                                <div class="w-14 h-14 rounded-full flex items-center justify-center mb-5" style="background: rgba(0,16,91,0.1);">
                                    <svg class="w-7 h-7" style="color: {{ $navy }};" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                </div>
                                <h3 class="text-lg md:text-xl font-semibold text-stone-800">No products match your filters</h3>
                                <p class="mt-2 text-sm text-stone-600 max-w-sm text-center">Try adjusting your search, category, or brand filters.</p>
                                <a href="{{ route('home') }}" class="litus-btn mt-6">Clear filters</a>
                            @else
                                <div class="w-14 h-14 rounded-full flex items-center justify-center mb-5 bg-stone-100">
                                    <svg class="w-7 h-7 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8 4-8-4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                                <h3 class="text-lg md:text-xl font-semibold text-stone-800">No products available</h3>
                                <p class="mt-2 text-sm text-stone-600 max-w-sm text-center">Products will appear here once added from the admin panel.</p>
                            @endif
                        </div>
                    @endif
                </form>
            </div>
        </section>
    </div>

    {{-- Floating chat button --}}
    <a href="{{ route('contact') }}" class="floating-chat" aria-label="Contact us">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
    </a>
</x-layouts.app>
