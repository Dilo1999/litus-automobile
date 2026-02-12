@props(['product'])

@php
    $imageUrl = $product->image
        ? asset('storage/' . $product->image)
        : 'https://via.placeholder.com/400x400/f5f5f5/e5e5e5?text=No+Image';
    $productName = $product->name ?? $product->title ?? 'Product';
@endphp

<a
    href="{{ route('products.show', $product) }}#product-content"
    class="product-card block"
>
    <div class="product-card-inner">
        <div class="product-card-imgBox">
            <img
                src="{{ $imageUrl }}"
                alt="{{ $productName }}"
                class="product-card-img"
            >
        </div>
        <div class="product-card-contentBox">
            <h3 class="product-card-title">{{ $product->name ?? $product->title ?? 'Product' }}</h3>
            @if(!empty($product->title) && trim($product->title) !== trim($product->name ?? ''))
                <p class="product-card-subtitle">{{ $product->title }}</p>
            @endif
            <span class="product-card-cta">View details</span>
        </div>
    </div>
</a>

@once
<style>
    /* Product card – light design with skewed gold accent */
    .product-card {
        position: relative;
        width: 100%;
        min-height: 360px;
        background: #FFFFFF;
        border-radius: 20px;
        overflow: hidden;
        text-decoration: none;
        display: block;
        transition: transform 0.3s, box-shadow 0.3s;
        border: 1px solid #e7e5e4;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.1);
    }
    .product-card::before {
        content: "";
        position: absolute;
        top: -50%;
        width: 100%;
        height: 100%;
        background: #c19b46;
        transform: skewY(345deg);
        transition: 0.5s;
        z-index: 0;
    }
    .product-card:hover::before {
        top: -70%;
        transform: skewY(390deg);
    }
    .product-card-inner {
        position: relative;
        z-index: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        min-height: 360px;
    }
    .product-card-imgBox {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px 20px 10px;
        flex: 1;
    }
    .product-card-img {
        max-height: 180px;
        width: auto;
        object-fit: contain;
        transition: transform 0.5s;
    }
    .product-card:hover .product-card-img {
        transform: scale(1.05);
    }
    .product-card-contentBox {
        position: relative;
        padding: 16px 20px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
    }
    .product-card-title {
        font-size: 15px;
        color: #1a1a1a;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .product-card-subtitle {
        font-size: 12px;
        color: #57534e;
        margin-top: 4px;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .product-card-cta {
        position: relative;
        top: 60px;
        opacity: 0;
        padding: 10px 28px;
        margin-top: 12px;
        color: #fff;
        background: #c19b46;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.5s;
    }
    .product-card:hover .product-card-cta {
        top: 0;
        opacity: 1;
    }
    .product-card-cta:hover {
        background: #a8843a;
    }
</style>
@endonce
