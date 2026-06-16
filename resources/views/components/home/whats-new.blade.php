<section id="whats-new" class="py-12 md:py-16 lg:py-20 bg-white overflow-hidden">
    <div class="site-container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div class="text-center mx-auto max-w-xl lg:max-w-none lg:mx-0 lg:px-4">
                <h2 class="font-serif text-3xl sm:text-4xl md:text-5xl lg:text-[3.25rem] font-semibold text-[var(--color-navy)] tracking-tight mb-5 md:mb-6 leading-tight">What's New ?</h2>
                <p class="text-[var(--color-muted)] text-base sm:text-lg md:text-xl leading-relaxed mx-auto">
                    Explore the latest models and innovations. From enhanced storage solutions to fuel-efficient engines,
                    our newest arrivals are designed for modern riders who demand style, comfort, and reliability.
                </p>
                <a href="#products" class="litus-btn mt-8 px-8 py-3.5 text-sm md:text-base inline-flex">Discover More</a>
            </div>
            <div class="relative rounded-lg overflow-hidden shadow-xl">
                <div class="relative aspect-[16/10] bg-black">
                    <iframe
                        id="whatsNewVideo"
                        data-src="https://www.youtube.com/embed/o8grf3wSwQU?autoplay=1&mute=1&playsinline=1&rel=0&modestbranding=1"
                        title="What's new at our dealership"
                        class="absolute inset-0 w-full h-full"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function () {
            const section = document.getElementById('whats-new');
            const iframe = document.getElementById('whatsNewVideo');
            if (!section || !iframe) return;

            const loadAndPlay = () => {
                if (iframe.src) return;
                iframe.src = iframe.dataset.src;
            };

            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            loadAndPlay();
                            observer.disconnect();
                        }
                    });
                }, { threshold: 0.35 });
                observer.observe(section);
            } else {
                loadAndPlay();
            }
        })();
    </script>
</section>
