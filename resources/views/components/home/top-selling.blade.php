@props(['products' => collect()])

@php
    $defaults = [
        ['name' => 'Scoopy Prestige', 'price' => 'LKR 899,000', 'image' => asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp'), 'url' => '#products'],
        ['name' => 'Click 150i', 'price' => 'LKR 749,000', 'image' => asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp'), 'url' => '#products'],
        ['name' => 'ADV 160', 'price' => 'LKR 1,199,000', 'image' => asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp'), 'url' => '#products'],
        ['name' => 'PCX 160', 'price' => 'LKR 1,299,000', 'image' => asset('images/product/HONDA-AIR-BLADE-125-PREMIUM-VERSION-2025-SILVER-RED-BLACK-300x300.webp'), 'url' => '#products'],
    ];

    $items = $products->count() > 0
        ? $products->take(4)->map(fn ($p) => [
            'name' => $p->name ?? $p->title,
            'price' => 'Enquire for price',
            'image' => $p->image ? asset('storage/' . $p->image) : $defaults[0]['image'],
            'url' => route('products.show', $p),
        ])->values()->all()
        : $defaults;
@endphp

<section id="top-selling" class="py-12 md:py-16 lg:py-20" style="background: var(--color-bg);">
    <div class="site-container">
        <h2 class="litus-section-title mb-10 md:mb-12">Top Selling Rides</h2>

        <div class="top-selling-grid">
            @foreach($items as $item)
                <article class="top-card group">
                    <div class="top-card__img-wrap">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="top-card__img" loading="lazy">
                    </div>
                    <div class="top-card__body">
                        <h3 class="top-card__title">{{ $item['name'] }}</h3>
                        <p class="top-card__price">{{ $item['price'] }}</p>
                        <a href="{{ $item['url'] }}" class="litus-btn top-card__btn">Learn More</a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<style>
    .top-selling-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }
    @media (min-width: 640px) {
        .top-selling-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .top-selling-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
    .top-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    .top-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(0, 16, 91, 0.12);
    }
    .top-card__img-wrap {
        background: var(--color-card);
        padding: 3rem 2rem 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 280px;
    }
    @media (min-width: 768px) {
        .top-card__img-wrap {
            min-height: 300px;
            padding: 3.25rem 2rem 2.25rem;
        }
    }
    @media (min-width: 1024px) {
        .top-card__img-wrap {
            min-height: 320px;
        }
    }
    .top-card__img {
        max-height: 240px;
        width: auto;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }
    @media (min-width: 768px) {
        .top-card__img { max-height: 260px; }
    }
    @media (min-width: 1024px) {
        .top-card__img { max-height: 280px; }
    }
    .top-card:hover .top-card__img { transform: scale(1.06); }
    .top-card__body {
        padding: 1.25rem 1.5rem 1.75rem;
        text-align: center;
    }
    .top-card__title {
        font-size: 1.0625rem;
        font-weight: 600;
        color: var(--color-navy);
        margin-bottom: 0.25rem;
    }
    .top-card__price {
        font-size: 0.875rem;
        color: var(--color-navy);
        font-weight: 500;
        margin-bottom: 1.25rem;
    }
    .top-card__btn {
        font-size: 0.6875rem;
        padding: 0.5rem 1.25rem;
    }
</style>
