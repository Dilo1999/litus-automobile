@php
    $galleryImages = [
        asset('images/background/6b38bb0353.jpeg'),
        asset('images/background/dubai-1-1536x1024.webp'),
        asset('images/background/about-1-ezgif.com-png-to-webp-converter.webp'),
        asset('images/background/Build.png'),
    ];

    $heroSliderRaw = \App\Models\Setting::get('hero_slider_images');
    $heroSliderImages = is_string($heroSliderRaw) ? json_decode($heroSliderRaw, true) : (is_array($heroSliderRaw) ? $heroSliderRaw : []);
    if (!empty($heroSliderImages)) {
        $galleryImages = array_map(fn ($path) => asset('storage/' . $path), array_slice($heroSliderImages, 0, 4));
        while (count($galleryImages) < 4) {
            $galleryImages[] = asset('images/background/6b38bb0353.jpeg');
        }
    }
@endphp

<section id="gallery" class="py-12 md:py-16 lg:py-20 bg-[#F4F4F4]">
    <div class="site-container">
        <h2 class="font-serif text-center text-[clamp(1.5rem,3vw,2rem)] font-semibold text-[#00105B] tracking-tight mb-10 md:mb-12">Ride the Visual Journey</h2>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
            @foreach($galleryImages as $index => $src)
                <div class="group relative overflow-hidden rounded-lg aspect-[4/3] bg-[#EBEBEB] shadow-[0_2px_8px_rgba(0,0,0,0.06)]">
                    <img
                        src="{{ $src }}"
                        alt="Gallery image {{ $index + 1 }}"
                        class="w-full h-full object-cover transition-transform duration-[600ms] ease-out group-hover:scale-[1.08]"
                        loading="lazy"
                    >
                    <span class="absolute inset-0 bg-gradient-to-t from-[#00105B]/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none" aria-hidden="true"></span>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('gallery') }}" class="litus-btn">View Gallery</a>
        </div>
    </div>
</section>
