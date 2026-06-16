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
