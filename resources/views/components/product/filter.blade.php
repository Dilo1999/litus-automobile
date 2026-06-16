@props([
    'brands' => [],
    'selectedBrands' => [],
    'search' => '',
    'productCount' => null,
    'accent' => '#c19b46',
])

{{-- Filter bar + product count – pill bar --}}
<div class="mb-6 flex flex-wrap items-center justify-between gap-4" style="--filter-accent: {{ $accent }};">
    <button
        type="button"
        data-open-filter
        class="hidden sm:inline-flex items-center gap-2.5 px-5 py-2.5 rounded-full bg-white/95 backdrop-blur-sm border border-stone-200/80 text-sm font-medium text-stone-700 shadow-sm shadow-stone-200/40 hover:bg-white hover:shadow-md hover:border-stone-300/80 transition-all duration-200 active:scale-[0.98] hover:shadow-[0_4px_14px_rgba(193,155,70,0.15)]"
    >
        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full text-white shrink-0" style="background-color: {{ $accent }}; box-shadow: 0 2px 8px rgba(193,155,70,0.35);">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
            </svg>
        </span>
        <span class="hidden md:inline">Filters</span>
    </button>
    @if($productCount && $productCount['total'] > 0)
        <p class="hidden sm:inline-flex items-center gap-2 text-sm text-stone-500 px-3 py-1.5 rounded-full bg-white/70 border border-stone-200/60">
            <span class="inline-block w-2 h-2 rounded-full bg-amber-500/80"></span>
            {{ $productCount['first'] }}–{{ $productCount['last'] }} of {{ $productCount['total'] }} products
        </p>
    @endif

    {{-- Slide-in filter drawer (opens from filter triggers) --}}
    <div
        id="mobile-filter-overlay"
        class="fixed inset-0 z-40 bg-black/30 backdrop-blur-md opacity-0 pointer-events-none transition-opacity duration-200"
        aria-hidden="true"
    >
        <div
            id="mobile-filter-drawer"
            class="absolute inset-y-0 left-0 w-full max-w-sm flex flex-col rounded-r-2xl overflow-hidden shadow-2xl shadow-stone-600/20 transform -translate-x-full transition-transform duration-300 border border-white/30"
            style="background: linear-gradient(180deg, rgba(250,250,249,0.78) 0%, rgba(245,245,244,0.68) 100%); backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);"
        >
            {{-- Drawer header – accent strip --}}
            <div class="flex-shrink-0 px-5 py-4 border-b border-white/35" style="background: linear-gradient(135deg, rgba(193,155,70,0.14) 0%, rgba(255,255,255,0.55) 100%);">
                <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        <span class="inline-flex h-11 w-11 items-center justify-center shrink-0 rounded-xl text-white shadow-md" style="background: linear-gradient(145deg, {{ $accent }} 0%, #a8843a 100%); box-shadow: 0 4px 14px rgba(193,155,70,0.45);">
                            <img src="{{ asset('images/background/icons8-filter-100.png') }}" alt="" class="w-6 h-6 object-contain brightness-0 invert" aria-hidden="true">
                        </span>
                        <div class="min-w-0">
                            <p class="text-sm font-bold text-stone-800">Refine results</p>
                            <p class="text-xs text-stone-500 mt-0.5">Search & brands</p>
                        </div>
                    </div>
                    <button
                        type="button"
                        id="close-mobile-filter"
                        class="inline-flex items-center justify-center h-9 w-9 rounded-xl border border-stone-200 text-stone-500 hover:bg-white/80 hover:text-stone-800 hover:border-stone-300 transition-colors shadow-sm"
                    >
                        <span class="sr-only">Close filters</span>
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                            <path d="M6 6l12 12M6 18L18 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Drawer body --}}
            <div class="flex-1 overflow-y-auto px-4 py-5 product-filter-scrollbar">
                <div class="space-y-6">
                    {{-- Search – pill style --}}
                    <div class="product-filter-section">
                        <label class="product-filter-section-label">Search</label>
                        <div class="relative rounded-xl bg-white/70 border border-white/45 shadow-sm focus-within:border-white/70 focus-within:ring-2 focus-within:ring-stone-200/30 transition-all product-filter-search-wrap backdrop-blur-md">
                            <input
                                type="text"
                                name="search"
                                value="{{ $search }}"
                                placeholder="Search products..."
                                class="product-filter-search w-full bg-transparent py-3 pl-4 pr-11 text-sm text-stone-900 placeholder-stone-400 focus:ring-0 focus:outline-none rounded-xl"
                            >
                            <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 flex h-7 w-7 items-center justify-center rounded-lg bg-stone-100/80">
                                <svg class="w-4 h-4 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="h-px bg-gradient-to-r from-transparent via-stone-200/80 to-transparent"></div>

                    {{-- Brands --}}
                    <div class="product-filter-section">
                        <div class="flex items-center justify-between mb-3">
                            <p class="product-filter-section-label">Brands</p>
                            <span class="text-[11px] text-stone-900 font-bold tabular-nums">{{ count($brands) }} options</span>
                        </div>
                        <div class="space-y-1 max-h-48 overflow-y-auto pr-1 product-filter-scrollbar rounded-xl border border-white/40 bg-white/45 p-1.5 shadow-inner backdrop-blur-md">
                            @forelse($brands as $brandName => $count)
                                @php $isBrandSelected = in_array($brandName, $selectedBrands); @endphp
                                <label class="flex items-center gap-3 cursor-pointer group rounded-lg px-3 py-2.5 border border-transparent hover:bg-white/65 hover:border-white/55 transition-all {{ $isBrandSelected ? 'bg-white/70 border-white/60 shadow-sm ring-1 ring-inset' : '' }}" style="{{ $isBrandSelected ? '--tw-ring-color: rgba(193,155,70,0.35);' : '' }}">
                                    <input
                                        type="checkbox"
                                        name="brand[]"
                                        value="{{ $brandName }}"
                                        {{ $isBrandSelected ? 'checked' : '' }}
                                        class="product-filter-checkbox rounded border-stone-300 h-4 w-4 shrink-0"
                                    >
                                    <div class="flex items-center justify-between gap-2 flex-1 min-w-0">
                                        <span class="text-sm font-medium text-stone-700 group-hover:text-stone-900 truncate">{{ $brandName }}</span>
                                        <span class="product-filter-count">{{ $count }}</span>
                                    </div>
                                </label>
                            @empty
                                <p class="text-sm text-stone-500 py-3 px-3">No brands yet.</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- Actions – sticky at bottom of scroll --}}
                    <div class="pt-10 space-y-2">
                        <button
                            type="submit"
                            class="product-filter-apply w-full inline-flex items-center justify-center gap-2 py-3.5 px-4 text-sm font-semibold rounded-xl text-white transition-all duration-200 active:scale-[0.99] shadow-md"
                            style="background: linear-gradient(145deg, {{ $accent }} 0%, #a8843a 100%); box-shadow: 0 4px 14px rgba(193, 155, 70, 0.4);"
                        >
                            <span>Apply</span>
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>

                        @if(!empty($selectedBrands) || (isset($search) && $search !== ''))
                            <a
                                href="{{ route('home') }}"
                                class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 text-sm font-medium rounded-xl border-2 border-white/45 text-stone-700 hover:bg-white/60 hover:border-white/60 hover:text-stone-900 transition-colors bg-white/35 backdrop-blur-md"
                            >
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 6l12 12M6 18L18 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                                </svg>
                                <span>Clear all</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Floating filter icon (mobile only, left middle) --}}
    <button
        type="button"
        data-open-filter
        class="sm:hidden fixed -left-6 top-1/2 -translate-y-1/2 z-40 inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/95 backdrop-blur-sm shadow-lg shadow-stone-400/30 border border-stone-200 hover:shadow-[0_6px_20px_rgba(193,155,70,0.25)] active:scale-95 transition-all"
        style="box-shadow: 0 4px 14px rgba(0,0,0,0.08);"
        aria-label="Open filters"
    >
        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full text-white" style="background: linear-gradient(145deg, {{ $accent }} 0%, #a8843a 100%); box-shadow: 0 2px 8px rgba(193,155,70,0.4);">
            <img src="{{ asset('images/background/icons8-filter-100.png') }}" alt="" class="w-4 h-4 object-contain brightness-0 invert" aria-hidden="true">
        </span>
    </button>

    @if($productCount && $productCount['total'] > 0)
        <p class="sm:hidden text-sm text-stone-500 mb-6 inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/70 border border-stone-200/60">
            <span class="inline-block w-2 h-2 rounded-full bg-amber-500/80"></span>
            {{ $productCount['first'] }}–{{ $productCount['last'] }} of {{ $productCount['total'] }} products
        </p>
    @endif
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var openFilterButtons = document.querySelectorAll('[data-open-filter]');
        var closeMobileFilter = document.getElementById('close-mobile-filter');
        var mobileOverlay = document.getElementById('mobile-filter-overlay');
        var mobileDrawer = document.getElementById('mobile-filter-drawer');

        function setMobileFilterOpen(isOpen) {
            if (!mobileOverlay || !mobileDrawer) return;
            if (isOpen) {
                mobileOverlay.classList.remove('pointer-events-none', 'opacity-0');
                mobileOverlay.classList.add('opacity-100');
                mobileDrawer.classList.remove('-translate-x-full');
            } else {
                mobileOverlay.classList.add('pointer-events-none', 'opacity-0');
                mobileOverlay.classList.remove('opacity-100');
                mobileDrawer.classList.add('-translate-x-full');
            }
        }

        if (openFilterButtons.length && mobileOverlay && mobileDrawer) {
            openFilterButtons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var isOpen = !mobileOverlay.classList.contains('pointer-events-none');
                    setMobileFilterOpen(!isOpen);
                });
            });
        }

        if (closeMobileFilter) {
            closeMobileFilter.addEventListener('click', function () {
                setMobileFilterOpen(false);
            });
        }

        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', function (e) {
                if (e.target === mobileOverlay) setMobileFilterOpen(false);
            });
        }

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') setMobileFilterOpen(false);
        });
    });
</script>
