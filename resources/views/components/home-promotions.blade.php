@props(['products' => collect()])

@php
    $defaults = [
        ['name' => 'Scoopy Prestige 2023', 'price' => 'LKR 899,000', 'image' => asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp'), 'url' => '#products'],
        ['name' => 'PCX 2023', 'price' => 'LKR 1,299,000', 'image' => asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp'), 'url' => '#products'],
        ['name' => 'Click 150i 2023', 'price' => 'LKR 749,000', 'image' => asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp'), 'url' => '#products'],
        ['name' => 'Vario 160 2023', 'price' => 'LKR 899,000', 'image' => asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp'), 'url' => '#products'],
    ];

    $items = $products->count() > 0
        ? $products->take(4)->map(fn ($p) => [
            'name' => $p->name ?? $p->title,
            'price' => 'Special Offer',
            'image' => $p->image ? asset('storage/' . $p->image) : $defaults[0]['image'],
            'url' => route('products.show', $p),
        ])->values()->all()
        : $defaults;
@endphp

<section id="promotions" class="promotions-section py-12 md:py-16 lg:py-20 bg-white w-full">
    <h2 class="litus-section-title mb-10 md:mb-12">Ongoing Promotions</h2>

    <div class="promotions-grid site-container">
        @foreach($items as $item)
            <article class="promo-card group">
                <div class="promo-card__badge">Limited Offer</div>
                <div class="promo-card__img-wrap">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="promo-card__img" loading="lazy">
                </div>
                <div class="promo-card__body">
                    <h3 class="promo-card__title">{{ $item['name'] }}</h3>
                    <p class="promo-card__price">Special Offer: <span>{{ $item['price'] }}</span></p>
                    <a href="{{ $item['url'] }}" class="litus-btn promo-card__btn">Buy Now</a>
                </div>
            </article>
        @endforeach
    </div>
</section>

<style>
    .promotions-section {
        width: 100%;
        max-width: 100%;
        overflow-x: hidden;
    }
    .promotions-grid {
        display: grid;
        grid-template-columns: 1fr;
        width: 100%;
        gap: 0.75rem;
    }
    @media (min-width: 640px) {
        .promotions-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .promotions-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
    .promo-card {
        position: relative;
        background: var(--color-card);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    .promo-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0, 16, 91, 0.12);
    }
    .promo-card__badge {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        background: var(--color-red);
        color: #fff;
        font-size: 0.625rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.375rem 0.75rem;
        clip-path: polygon(0 0, 100% 0, 85% 100%, 0 100%);
    }
    .promo-card__img-wrap {
        padding: 1.5rem 1rem 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 220px;
    }
    .promo-card__img {
        max-height: 190px;
        width: auto;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }
    @media (min-width: 640px) {
        .promo-card__img-wrap { min-height: 240px; }
        .promo-card__img { max-height: 210px; }
    }
    @media (min-width: 1024px) {
        .promo-card__img-wrap { min-height: 260px; padding: 1.75rem 1rem 1rem; }
        .promo-card__img { max-height: 230px; }
    }
    .promo-card:hover .promo-card__img { transform: scale(1.05); }
    .promo-card__body {
        padding: 0 1.25rem 1.5rem;
        text-align: center;
    }
    .promo-card__title {
        font-size: 0.9375rem;
        font-weight: 600;
        color: var(--color-navy);
        margin-bottom: 0.375rem;
    }
    .promo-card__price {
        font-size: 0.8125rem;
        color: var(--color-muted);
        margin-bottom: 1rem;
    }
    .promo-card__price span {
        color: var(--color-red);
        font-weight: 600;
    }
    .promo-card__btn {
        width: 100%;
        max-width: 140px;
        font-size: 0.6875rem;
        padding: 0.5rem 1rem;
    }
</style>
