@props([
    'items' => [],
    'brands' => ['All', 'Honda', 'Yamaha'],
    'selectedBrand' => null,
])

@php
    $activeBrand = $selectedBrand ?: 'All';
@endphp

<x-layouts.app title="Motorcycles - Al Zaha General Trading">
    <div class="min-h-screen bg-white">
        <x-motorcycles.hero />

        <section id="ride-collection" class="py-12 md:py-16 lg:py-20">
            <div class="site-container">
                <h2 class="litus-section-title mb-8 md:mb-10">Explore Our Ride Collection</h2>

                <nav class="brand-filters" aria-label="Filter by brand">
                    @foreach($brands as $brand)
                        @php
                            $isActive = strcasecmp($activeBrand, $brand) === 0;
                            $filterUrl = $brand === 'All'
                                ? route('motorcycles')
                                : route('motorcycles', ['brand' => $brand]);
                        @endphp
                        <a
                            href="{{ $filterUrl }}#ride-collection"
                            class="brand-filter {{ $isActive ? 'is-active' : '' }}"
                        >
                            {{ $brand }}
                        </a>
                    @endforeach
                </nav>

                @if(count($items) > 0)
                    <div class="rides-grid">
                        @foreach($items as $item)
                            <x-motorcycles.ride-card
                                :name="$item['name']"
                                :discount="$item['discount']"
                                :image="$item['image']"
                                :url="$item['url']"
                            />
                        @endforeach
                    </div>
                @else
                    <div class="rides-empty">
                        <p>No motorcycles found for this brand. Try another filter or <a href="{{ route('motorcycles') }}" class="text-[var(--color-navy)] font-semibold underline">view all</a>.</p>
                    </div>
                @endif
            </div>
        </section>
    </div>
</x-layouts.app>

<style>
    .brand-filters {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
        margin-bottom: 2.5rem;
        flex-wrap: wrap;
    }
    .brand-filter {
        font-size: 0.9375rem;
        font-weight: 500;
        color: var(--color-muted);
        text-decoration: none;
        padding-bottom: 0.375rem;
        border-bottom: 2px solid transparent;
        transition: color 0.2s ease, border-color 0.2s ease;
    }
    .brand-filter:hover {
        color: var(--color-navy);
    }
    .brand-filter.is-active {
        color: var(--color-navy);
        font-weight: 700;
        border-bottom-color: var(--color-navy);
    }
    .rides-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.25rem;
    }
    @media (min-width: 640px) {
        .rides-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 1024px) {
        .rides-grid { grid-template-columns: repeat(4, 1fr); }
    }
    .rides-empty {
        text-align: center;
        padding: 3rem 1.5rem;
        background: var(--color-bg);
        border-radius: 8px;
        color: var(--color-muted);
        font-size: 0.9375rem;
    }
</style>
