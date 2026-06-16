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





<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');
    
    .brand-strip-wrapper {
        --color-gold: var(--color-accent, #00105B);
        --color-gold-light: var(--color-accent-light, #001a7a);
        --color-bg: #faf9f7;
        --color-card: #ffffff;
        --color-border: #e8e6e3;
        --font-serif: 'Playfair Display', serif;
        --font-sans: 'Inter', sans-serif;
    }
    
    .brand-strip-section {
        background: #F4F4F4;
        font-family: var(--font-sans);
    }
    
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    
    .scrollbar-hide {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    
    /* Navigation Buttons */
    .brand-nav-btn {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, var(--color-gold) 0%, #a8843a 100%);
        border: 1px solid rgba(193, 155, 70, 0.2);
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(193, 155, 70, 0.2);
    }
    
    .brand-nav-btn:hover {
        box-shadow: 0 4px 16px rgba(193, 155, 70, 0.3);
        background: linear-gradient(135deg, var(--color-gold-light) 0%, var(--color-gold) 100%);
    }
    
    .brand-nav-btn:active {
        opacity: 0.9;
    }
    
    .brand-nav-btn svg {
        width: 20px;
        height: 20px;
    }
    
    /* Brand Cards */
    .brand-card {
        background: #FFFFFF;
        border: 1px solid #e7e5e4;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }
    
    .brand-card:hover {
        border-color: rgba(0, 16, 91, 0.3);
        box-shadow: 0 4px 16px rgba(0, 16, 91, 0.12);
        transform: translateY(-2px);
    }
    
    /* Logo Container */
    .brand-logo-container {
        background: #F4F4F4;
        border: none;
        border-radius: 50%;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .brand-card:hover .brand-logo-container {
        background: #eeeeee;
        border-color: rgba(193, 155, 70, 0.4);
    }
    
    .brand-logo-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        display: block;
    }
    
    /* Brand Text */
    .brand-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 0.125rem;
    }
    
    .brand-cta {
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--color-gold);
        transform: translateY(120%);
        opacity: 0;
        transition: transform 0.25s ease-out, opacity 0.25s ease-out, color 0.25s ease-out;
    }
    
    .brand-card:hover .brand-cta {
        color: var(--color-gold-light);
        transform: translateY(0%);
        opacity: 1;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 1024px) {
        .brand-nav-btn {
            width: 40px;
            height: 40px;
        }
    }

    /* Force hide nav buttons on mobile, keep desktop behavior */
    @media (max-width: 1023.98px) {
        .brand-nav-btn {
            display: none !important;
        }
    }
    
    @media (max-width: 640px) {
        .brand-card {
            min-width: 160px;
        }
        
        .brand-name {
            font-size: 0.85rem;
        }
        
        .brand-cta {
            font-size: 0.75rem;
        }
    }
</style>


@endif