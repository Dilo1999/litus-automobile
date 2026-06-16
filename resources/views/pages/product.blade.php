<x-layouts.app :title="$productName . ' - LITUS Automobiles'">
    <div class="min-h-screen bg-litus-product text-white">
        <x-product.details
            :product="$product"
            :product-name="$productName"
            :image-url="$imageUrl"
            :specs="$specs"
            :original-price="$originalPrice"
            :sale-price="$salePrice"
            :special-discount="$specialDiscount"
            :whatsapp="$whatsapp"
        />
    </div>
</x-layouts.app>
