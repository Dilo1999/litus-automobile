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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-3 items-start">
            @foreach($items as $item)
                <a href="{{ $item['url'] }}#product-content" class="top-card w-full block no-underline text-inherit">
                    <div class="top-card__media">
                        <img
                            src="{{ $item['image'] }}"
                            alt="{{ $item['name'] }}"
                            class="top-card__img"
                            loading="lazy"
                        >
                    </div>
                    <div class="top-card__body">
                        <h3 class="top-card__title">{{ $item['name'] }}</h3>
                        <p class="top-card__price">{{ $item['price'] }}</p>
                    </div>
                    <div class="top-card__action">
                        <span class="top-card__cta">Learn More</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
