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

@once
<style>
    .ride-card {
        position: relative;
        background: #fff;
        border: 1px solid #e8e8e8;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .ride-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0, 16, 91, 0.12);
    }
    .ride-card__badge {
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
    .ride-card__img-wrap {
        background: var(--color-card);
        padding: 1.5rem 1rem 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 200px;
    }
    .ride-card__img {
        max-height: 170px;
        width: auto;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }
    .ride-card:hover .ride-card__img { transform: scale(1.05); }
    .ride-card__body {
        padding: 1rem 1.25rem 1.5rem;
        text-align: center;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .ride-card__title {
        font-size: 0.9375rem;
        font-weight: 700;
        color: var(--color-navy);
        margin-bottom: 0.375rem;
    }
    .ride-card__discount {
        font-size: 0.8125rem;
        color: var(--color-muted);
        margin-bottom: 1rem;
        flex: 1;
    }
    .ride-card__discount span {
        color: var(--color-red);
        font-weight: 600;
    }
    .ride-card__btn {
        font-size: 0.6875rem;
        padding: 0.5rem 1.25rem;
        min-width: 120px;
    }
</style>
@endonce
