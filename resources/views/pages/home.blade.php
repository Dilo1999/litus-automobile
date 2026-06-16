<x-home.index
    :products="$products"
    :featuredProduct="$featuredProduct ?? null"
    :promotionProducts="$promotionProducts ?? collect()"
    :topSellingProducts="$topSellingProducts ?? collect()"
    :brandList="$brandList ?? []"
    :brands="$brands ?? []"
    :selectedBrands="$selectedBrands ?? []"
    :search="$search ?? ''"
/>
