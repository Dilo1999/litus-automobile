@props([
    'images' => [],
    'featured' => '',
])

@php
    $heroBg = 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=1920&q=80';
@endphp

<x-layouts.app title="Gallery - LITUS Automobiles">
    <div class="min-h-screen bg-white text-gray-900">
        {{-- Hero --}}
        <section
            class="page-hero-standard relative flex items-center bg-cover bg-center max-md:bg-[center_40%] overflow-hidden"
            style="background-image: linear-gradient(rgba(0,16,91,0.78), rgba(0,16,91,0.78)), url('{{ $heroBg }}');"
        >
            <div class="site-container w-full">
                <div class="max-w-2xl">
                    <p class="text-[#4da3ff] font-bold uppercase tracking-[0.2em] text-xs sm:text-sm mb-3">Gallery</p>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-white leading-tight mb-4">Ride the Visual Journey</h1>
                    <p class="text-white/85 text-sm sm:text-base leading-relaxed max-w-xl">
                        Explore moments from the road — our motorcycles, riders, and the lifestyle that comes with every ride.
                    </p>
                </div>
            </div>
        </section>

        {{-- Photo grid --}}
        <section class="py-12 md:py-16 lg:py-20">
            <div class="site-container">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-1.5 sm:gap-2 lg:gap-2.5">
                    @foreach($images as $index => $src)
                        <button
                            type="button"
                            class="group relative aspect-square overflow-hidden p-0 border-0 cursor-pointer bg-gray-100"
                            data-gallery-open="{{ $index }}"
                            aria-label="Open gallery image {{ $index + 1 }}"
                        >
                            <img
                                src="{{ $src }}"
                                alt="Gallery image {{ $index + 1 }}"
                                class="w-full h-full object-cover block transition-transform duration-[450ms] ease-out group-hover:scale-[1.06]"
                                loading="lazy"
                            >
                            <span class="absolute inset-0 bg-gradient-to-t from-[#00105B]/35 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none" aria-hidden="true"></span>
                        </button>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Featured banner --}}
        @if($featured)
            <section class="pb-12 md:pb-16 lg:pb-20">
                <div class="site-container">
                    <div class="relative overflow-hidden rounded-lg bg-black">
                        <img
                            src="{{ $featured }}"
                            alt="Featured ride"
                            class="w-full aspect-[21/9] sm:aspect-[21/8] object-cover"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/30 pointer-events-none"></div>
                    </div>
                </div>
            </section>
        @endif
    </div>

    {{-- Lightbox --}}
    <div
        id="galleryLightbox"
        class="fixed inset-0 z-[99990] flex items-center justify-center p-4 bg-black/90 opacity-0 invisible transition-all duration-200"
        aria-hidden="true"
    >
        <button type="button" id="galleryLightboxClose" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/10 text-white text-2xl leading-none border-0 cursor-pointer hover:bg-white/20 transition-colors" aria-label="Close">&times;</button>
        <button type="button" id="galleryPrev" class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 text-white text-xl border-0 cursor-pointer hover:bg-white/20 transition-colors" aria-label="Previous">&#8249;</button>
        <img id="galleryLightboxImg" src="" alt="" class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl">
        <button type="button" id="galleryNext" class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 text-white text-xl border-0 cursor-pointer hover:bg-white/20 transition-colors" aria-label="Next">&#8250;</button>
    </div>

    <script>
        const galleryImages = @json($images);
        const lightbox = document.getElementById('galleryLightbox');
        const lightboxImg = document.getElementById('galleryLightboxImg');
        let currentIndex = 0;

        function openLightbox(index) {
            currentIndex = index;
            lightboxImg.src = galleryImages[currentIndex];
            lightbox.classList.remove('opacity-0', 'invisible');
            lightbox.classList.add('opacity-100', 'visible');
            lightbox.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightbox.classList.add('opacity-0', 'invisible');
            lightbox.classList.remove('opacity-100', 'visible');
            lightbox.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        function showImage(index) {
            currentIndex = (index + galleryImages.length) % galleryImages.length;
            lightboxImg.src = galleryImages[currentIndex];
        }

        document.querySelectorAll('[data-gallery-open]').forEach(btn => {
            btn.addEventListener('click', () => openLightbox(Number(btn.dataset.galleryOpen)));
        });
        document.getElementById('galleryLightboxClose').addEventListener('click', closeLightbox);
        document.getElementById('galleryPrev').addEventListener('click', () => showImage(currentIndex - 1));
        document.getElementById('galleryNext').addEventListener('click', () => showImage(currentIndex + 1));
        lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });
        document.addEventListener('keydown', e => {
            if (lightbox.classList.contains('invisible')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') showImage(currentIndex - 1);
            if (e.key === 'ArrowRight') showImage(currentIndex + 1);
        });
    </script>
</x-layouts.app>
