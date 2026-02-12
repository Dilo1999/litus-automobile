<x-home
    :products="$products"
    :featuredProduct="$featuredProduct ?? null"
    :brandList="$brandList ?? []"
    :categories="$categories ?? []"
    :category-tree="$categoryTree ?? []"
    :brands="$brands ?? []"
    :selectedCategories="$selectedCategories ?? []"
    :selectedSubCategories="$selectedSubCategories ?? []"
    :selectedBrands="$selectedBrands ?? []"
    :search="$search ?? ''"
    :subCategoriesByCategory="$subCategoriesByCategory ?? []"
/>
