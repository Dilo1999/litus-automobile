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
