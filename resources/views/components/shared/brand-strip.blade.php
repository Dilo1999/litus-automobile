@props([
    'brands' => [],
    'accent' => '#c19b46',
])

@if(count($brands) > 0)


<section class="brand-strip-wrapper brand-strip-section py-6 lg:py-8 overflow-hidden" style="--color-accent: {{ $accent }}; --color-accent-light: {{ $accent }}cc;">
    <div class="relative site-container">
        {{-- Left arrow – desktop only --}}
        <button
            type="button"
            data-brand-strip-prev
            class="brand-nav-btn hidden lg:flex absolute left-0 top-1/2 -translate-y-1/2 z-10"
            aria-label="Previous brands"
        >
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        {{-- Right arrow – desktop only --}}
        <button
            type="button"
            data-brand-strip-next
            class="brand-nav-btn hidden lg:flex absolute right-0 top-1/2 -translate-y-1/2 z-10"
            aria-label="Next brands"
        >
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <div 
            id="brand-strip-scroll" 
            class="flex gap-4 sm:gap-5 lg:gap-6 overflow-x-auto pb-2 scrollbar-hide -mx-4 px-4 sm:mx-0 sm:px-0"
        >
            @foreach($brands as $brand)
                @php
                    $logoUrl = $brand->logo
                        ? asset('storage/' . $brand->logo)
                        : 'https://ui-avatars.com/api/?name=' . urlencode($brand->name) . '&color=7F9CF5&background=EBF4FF&size=80';
                    $filterUrl = route('home', ['brand' => [$brand->name]]);
                @endphp
                <a
                    href="{{ $filterUrl }}#home-filters-form"
                    class="brand-card flex-shrink-0 flex items-center gap-3 sm:gap-4 px-3 py-3 sm:px-4 sm:py-4 lg:px-5 lg:py-4 min-w-[150px] sm:min-w-[170px] lg:min-w-[200px]"
                >
                    <div class="brand-logo-container flex-shrink-0 w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 flex items-center justify-center">
                        <img
                            src="{{ $logoUrl }}"
                            alt="{{ $brand->name }}"
                            class="brand-logo-img"
                        >
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="brand-name truncate">{{ $brand->name }}</p>
                        <p class="brand-cta truncate">View </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollEl = document.getElementById('brand-strip-scroll');
        const prevBtn = document.querySelector('[data-brand-strip-prev]');
        const nextBtn = document.querySelector('[data-brand-strip-next]');
        const scrollAmount = 320;

        if (scrollEl && prevBtn) {
            prevBtn.addEventListener('click', function () {
                scrollEl.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });
        }
        if (scrollEl && nextBtn) {
            nextBtn.addEventListener('click', function () {
                scrollEl.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        }
    });
</script>


@endif