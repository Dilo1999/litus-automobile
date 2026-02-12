@props([
    'tagline' => 'Premium Trading',
    'heading' => 'Al Zaha General Trading',
    'description' => 'Quality products for your business. Browse our catalog below.',
    'featuredProduct' => null,
    'accent' => '#c19b46',
])

@php
    $productName = $featuredProduct ? ($featuredProduct->name ?? $featuredProduct->title ?? 'Product') : 'Featured Product';
    $heroSliderRaw = \App\Models\Setting::get('hero_slider_images');
    $heroSliderImages = is_string($heroSliderRaw) ? json_decode($heroSliderRaw, true) : (is_array($heroSliderRaw) ? $heroSliderRaw : []);
    if (empty($heroSliderImages)) {
        $legacy = \App\Models\Setting::get('hero_product_image');
        $heroSliderImages = $legacy ? [$legacy] : [];
    }
    $defaultImage = asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp');
    $heroImageUrls = array_map(fn ($path) => asset('storage/' . $path), $heroSliderImages);
    if (empty($heroImageUrls)) {
        $heroImageUrls = [$defaultImage];
    }
@endphp

<section
    class="home-hero-section relative flex items-center justify-center min-h-[60vh] md:min-h-[70vh] lg:min-h-[80vh] overflow-hidden py-16 md:py-20"
    style="
        background-image: url('{{ asset('images/background/6b38bb0353.jpeg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin-top: -4rem;
        padding-top: calc(4rem + 4rem);
    "
>
    {{-- Decorative accent line --}}
    <div class="absolute top-0 left-0 right-0 h-1 z-10" style="background: linear-gradient(90deg, transparent, {{ $accent }}, transparent); opacity: 0.6;"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Single card (one translucent white box) --}}
        <div 
            class="relative rounded-3xl shadow-2xl overflow-visible"
            style="box-shadow: 0 25px 50px -12px rgba(0,0,0,0.2);"
        >
            {{-- Card background stays clipped/rounded, content can overflow --}}
            <div
                class="absolute inset-0 rounded-3xl pointer-events-none"
                style="background: rgba(255,255,255,0.50); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);"
                aria-hidden="true"
            ></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 items-center">
                {{-- Left: Text content --}}
                <div class="px-8 py-3 sm:px-12 sm:py-4 md:px-16 md:py-5 lg:px-20 lg:py-6">
                    <p 
                        class="text-sm sm:text-base md:text-lg font-bold tracking-[0.3em] uppercase mb-1 text-black"
                    >
                        {{ $tagline }}
                    </p>
                    
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-[1.05] mb-0">
                        <span class="block text-6xl sm:text-7xl md:text-8xl lg:text-8xl font-black" style="color: #f4c157; text-shadow: 0 1px 0 rgba(0,0,0,0.25), 0 2px 8px rgba(0,0,0,0.12);">AL ZAHA</span>
                        <span class="block text-black text-2xl sm:text-3xl md:text-4xl lg:text-5xl">General Trading</span>
                    </h1>
                    
                    <p class="mt-3 sm:mt-8 text-base sm:text-lg text-gray-700 leading-relaxed max-w-md text-center sm:text-left mx-auto sm:mx-0">
                        {{ $description }}
                    </p>
                </div>

                {{-- Right: Product image slider --}}
                <div class="relative px-3 py-3 sm:px-4 sm:py-4 md:px-5 md:py-5 lg:px-6 lg:py-6 flex items-center justify-center overflow-visible">
                    <div class="relative w-full min-w-0 flex justify-center items-center pb-7 sm:pb-0 pt-4 sm:pt-0" style="min-height: 0;">
                        {{-- Scale wrapper: image renders larger (1.5x) --}}
                        <div class="origin-center flex justify-center items-center" style="width: 78%; transform: scale(1.42);">
                            <div class="hero-slider aspect-square relative overflow-hidden w-full" data-hero-slider>
                                <div 
                                    class="hero-slider__track flex h-full transition-transform duration-500 ease-out" 
                                    style="width: {{ count($heroImageUrls) * 100 }}%;" 
                                    data-hero-track
                                >
                                    @foreach ($heroImageUrls as $index => $url)
                                        <div
                                            class="hero-slider__slide flex-shrink-0 flex items-center justify-center"
                                            style="width: {{ 100 / count($heroImageUrls) }}%;"
                                            data-hero-slide
                                            role="img"
                                            aria-label="{{ $productName }} slide {{ $index + 1 }}"
                                        >
                                            <img
                                                src="{{ $url }}"
                                                alt="{{ $productName ?? 'Featured product' }}"
                                                class="w-full h-full object-contain drop-shadow-2xl"
                                                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        @if (count($heroImageUrls) > 1)
                            <div 
                                class="absolute bottom-2 left-0 right-0 z-20 flex justify-center gap-2" 
                                data-hero-dots 
                                role="tablist" 
                                aria-label="Hero image slides"
                            >
                                @foreach ($heroImageUrls as $index => $url)
                                    <button
                                        type="button"
                                        class="hero-slider__dot w-2.5 h-2.5 rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                        style="background: {{ $index === 0 ? $accent : '#D1D5DB' }}; focus:ring-color: {{ $accent }};"
                                        data-hero-dot
                                        data-index="{{ $index }}"
                                        aria-label="Go to slide {{ $index + 1 }}"
                                    ></button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($heroImageUrls) > 1)
        <script>
            (function() {
                var track = document.querySelector('[data-hero-track]');
                if (!track) return;
                var dots = document.querySelectorAll('[data-hero-dot]');
                var total = dots.length;
                if (total <= 1) return;
                var current = 0;
                var interval = 5000;
                var t;
                
                function show(i) {
                    current = (i + total) % total;
                    var offset = (current * 100) / total;
                    track.style.transform = 'translateX(-' + offset + '%)';
                    dots.forEach(function(d, j) {
                        d.style.background = j === current ? '{{ $accent }}' : '#D1D5DB';
                    });
                }
                
                function next() { show(current + 1); }
                function startInterval() { clearInterval(t); t = setInterval(next, interval); }
                
                dots.forEach(function(dot, i) {
                    dot.addEventListener('click', function() { show(i); startInterval(); });
                });
                
                startInterval();
            })();
        </script>
    @endif
</section>