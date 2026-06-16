@props([
    'name',
    'discount',
    'image',
    'url' => '#',
])

<article class="ride-card group">
    <div class="ride-card__badge">Limited Offer</div>
    <div class="ride-card__img-wrap">
        <img src="{{ $image }}" alt="{{ $name }}" class="ride-card__img" loading="lazy">
    </div>
    <div class="ride-card__body">
        <h3 class="ride-card__title">{{ $name }}</h3>
        <p class="ride-card__discount">Discount : <span>{{ $discount }}</span></p>
        <a href="{{ $url }}" class="litus-btn ride-card__btn">Buy Now</a>
    </div>
</article>
