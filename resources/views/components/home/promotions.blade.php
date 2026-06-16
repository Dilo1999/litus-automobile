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
            <a href="{{ $item['url'] }}#product-content" class="promo-card group block no-underline text-inherit">
                <div class="promo-card__badge">Limited Offer</div>
                <div class="promo-card__img-wrap">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="promo-card__img" loading="lazy">
                </div>
                <div class="promo-card__body">
                    <h3 class="promo-card__title">{{ $item['name'] }}</h3>
                    <p class="promo-card__price">Special Offer: <span>{{ $item['price'] }}</span></p>
                    <span class="litus-btn promo-card__btn">Buy Now</span>
                </div>
            </a>
        @endforeach
    </div>
</section>
