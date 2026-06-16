<section id="offerings" class="py-12 md:py-16 lg:py-20" style="background: var(--color-bg);">
    <div class="site-container">
        <h2 class="litus-section-title mb-10 md:mb-14">What We Offer at LITUS</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
            <article class="offer-card">
                <div class="offer-card__img-wrap">
                    <img
                        src="{{ asset('images/background/Build.png') }}"
                        alt="Application made easy"
                        class="offer-card__img"
                        loading="lazy"
                        onerror="this.parentElement.classList.add('offer-card__img-wrap--placeholder')"
                    >
                </div>
                <h3 class="offer-card__title">Application Made Easy</h3>
                <p class="offer-card__text">
                    With our easy to follow application process, getting your dream ride has never been simpler.
                    Our team guides you through every step from selection to delivery.
                </p>
            </article>

            <article class="offer-card">
                <div class="offer-card__img-wrap">
                    <img
                        src="{{ asset('images/background/dubai-1-1536x1024.webp') }}"
                        alt="Genuine parts"
                        class="offer-card__img"
                        loading="lazy"
                        onerror="this.parentElement.classList.add('offer-card__img-wrap--placeholder')"
                    >
                </div>
                <h3 class="offer-card__title">Genuine Parts</h3>
                <p class="offer-card__text">
                    We only use genuine parts to ensure your motorcycle or scooter performs at its best.
                    Quality components backed by manufacturer warranties for peace of mind.
                </p>
            </article>

            <article class="offer-card">
                <div class="offer-card__img-wrap">
                    <img
                        src="{{ asset('images/background/6b38bb0353.jpeg') }}"
                        alt="Reliable service"
                        class="offer-card__img"
                        loading="lazy"
                        onerror="this.parentElement.classList.add('offer-card__img-wrap--placeholder')"
                    >
                </div>
                <h3 class="offer-card__title">Reliable Service</h3>
                <p class="offer-card__text">
                    Our trained technicians provide expert maintenance and repair services to keep your ride
                    in peak condition. Scheduled servicing, diagnostics, and roadside assistance available.
                </p>
            </article>
        </div>
    </div>
</section>

<style>
    .offer-card { text-align: center; }
    .offer-card__img-wrap {
        aspect-ratio: 4/3;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 1.25rem;
        background: var(--color-card);
    }
    .offer-card__img-wrap--placeholder {
        background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%);
    }
    .offer-card__img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .offer-card:hover .offer-card__img { transform: scale(1.05); }
    .offer-card__title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--color-navy);
        margin-bottom: 0.75rem;
    }
    .offer-card__text {
        font-size: 0.875rem;
        line-height: 1.65;
        color: var(--color-muted);
        max-width: 32ch;
        margin: 0 auto;
    }
</style>
