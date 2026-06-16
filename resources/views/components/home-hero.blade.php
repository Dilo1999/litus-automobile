@props([
    'featuredProduct' => null,
])

@php
    $heroBg = asset('images/background/6b38bb0353.jpeg');
    $heroSliderRaw = \App\Models\Setting::get('hero_slider_images');
    $heroSliderImages = is_string($heroSliderRaw) ? json_decode($heroSliderRaw, true) : (is_array($heroSliderRaw) ? $heroSliderRaw : []);
    if (empty($heroSliderImages)) {
        $legacy = \App\Models\Setting::get('hero_product_image');
        $heroSliderImages = $legacy ? [$legacy] : [];
    }
@endphp

<section
    class="home-hero-full relative flex items-end w-full overflow-hidden"
>
    <div
        class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ $heroBg }}');"
        role="img"
        aria-label="Featured motorcycle showcase"
    ></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#00105B]/70 via-[#00105B]/20 to-transparent"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#00105B]/30 to-transparent"></div>

    <div class="relative z-10 w-full site-container pb-12 md:pb-16 lg:pb-20">
        <div class="max-w-xl">
            <p class="text-white/80 text-xs sm:text-sm font-semibold tracking-[0.25em] uppercase mb-3">
                Premium Motorcycles &amp; Scooters
            </p>
            <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-[1.05] mb-4">
                Ride With<br>Confidence
            </h1>
            <p class="text-white/85 text-sm sm:text-base leading-relaxed max-w-md mb-6">
                Discover our range of quality motorcycles, scooters, genuine parts, and expert service — your trusted partner on every journey.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="#promotions" class="litus-btn litus-btn--red">View Offers</a>
                <a href="#products" class="litus-btn" style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.4);">Browse Models</a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#C41E3A] to-transparent opacity-80"></div>
</section>

<style>
    .home-hero-full {
        min-height: 100vh;
        min-height: 100dvh;
        height: 100vh;
        height: 100dvh;
    }
</style>
