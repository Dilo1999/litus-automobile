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

<section id="gallery" class="py-12 md:py-16 lg:py-20" style="background: var(--color-bg);">
    <div class="site-container">
        <h2 class="litus-section-title mb-10 md:mb-12">Ride the Visual Journey</h2>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
            @foreach($galleryImages as $index => $src)
                <div class="gallery-item group overflow-hidden rounded-lg aspect-[4/3]">
                    <img
                        src="{{ $src }}"
                        alt="Gallery image {{ $index + 1 }}"
                        class="gallery-item__img"
                        loading="lazy"
                    >
                </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('contact') }}" class="litus-btn">View Gallery</a>
        </div>
    </div>
</section>

<style>
    .gallery-item {
        position: relative;
        background: var(--color-card);
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .gallery-item__img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .gallery-item:hover .gallery-item__img {
        transform: scale(1.08);
    }
    .gallery-item::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,16,91,0.4), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .gallery-item:hover::after { opacity: 1; }
</style>
