@props([
    'product',
    'productName' => '',
    'imageUrl' => '',
    'specs' => [],
    'originalPrice' => null,
    'salePrice' => null,
    'specialDiscount' => null,
    'whatsapp' => 'https://wa.me/9607797442',
])

@php
    $hasPricing = filled($originalPrice) || filled($salePrice);
    $displayOriginal = $originalPrice ?? ($hasPricing ? null : 'MVR 95,000.00');
    $displaySale = $salePrice ?? ($hasPricing ? null : 'MVR 84,000.00');
    $displayDiscount = $specialDiscount ?? ($hasPricing ? null : 'MVR 11,000.00');
    $buyUrl = $whatsapp;
@endphp

<div class="bg-litus-product text-white" id="product-content">
    {{-- Hero / pricing --}}
    <section class="page-hero-standard relative flex min-h-screen min-h-[100dvh] items-center justify-center overflow-hidden">
        <div
            class="absolute inset-0 scale-[1.08] bg-cover bg-center bg-no-repeat opacity-35 blur-[1px]"
            style="background-image: url('{{ $imageUrl }}');"
            aria-hidden="true"
        ></div>
        <div class="absolute inset-0 bg-litus-product-overlay/88"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-navy/35 via-transparent to-litus-product"></div>

        <div class="relative z-10 w-full py-8 text-center site-container">
            <h1 class="mb-5 font-serif text-[clamp(2rem,6vw,3.75rem)] font-bold leading-[1.05] tracking-tight">
                {{ $productName }}
            </h1>

            <div class="mb-2 text-[clamp(0.875rem,2vw,1rem)] leading-loose text-white/90">
                @if($displayOriginal)
                    <p>Original Price : <span class="font-semibold">{{ $displayOriginal }}</span></p>
                @endif
                @if($displaySale)
                    <p>Sale Price : <span class="font-semibold">{{ $displaySale }}</span></p>
                @endif
                @if(!$displayOriginal && !$displaySale)
                    <p>Contact us for the latest pricing on this model.</p>
                @endif
            </div>

            <p class="my-1 mb-5 font-script text-[clamp(2.5rem,8vw,4.5rem)] leading-tight text-white" aria-hidden="true">
                Limited Offer
            </p>

            @if($displayDiscount)
                <div class="flex justify-center">
                    <span class="inline-flex items-center justify-center rounded-full bg-litus-red px-5 py-2.5 text-[0.8125rem] font-bold tracking-wide text-white shadow-[0_8px_24px_rgba(196,30,58,0.35)]">
                        Special Price: {{ $displayDiscount }}
                    </span>
                </div>
            @endif
        </div>
    </section>

    {{-- Product showcase --}}
    <section class="relative z-[2] -mt-8">
        <div class="absolute inset-x-0 top-1/2 h-[clamp(180px,28vw,280px)] -translate-y-1/2 bg-gradient-to-r from-navy via-navy-band to-navy"></div>
        <div class="relative z-10 site-container">
            <div class="flex min-h-[clamp(260px,42vw,420px)] items-center justify-center px-0 py-6 pb-10">
                <img
                    src="{{ $imageUrl }}"
                    alt="{{ $productName }}"
                    class="w-full max-w-[720px] max-h-[clamp(240px,38vw,400px)] object-contain drop-shadow-[0_24px_48px_rgba(0,0,0,0.45)]"
                    loading="eager"
                    decoding="async"
                >
            </div>
        </div>
    </section>

    {{-- Specifications --}}
    <section class="relative -mt-px overflow-hidden">
        <div
            class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-[0.14]"
            style="background-image: url('{{ $imageUrl }}');"
            aria-hidden="true"
        ></div>
        <div class="absolute inset-0 bg-litus-product-overlay/92"></div>

        <div class="relative z-10 py-14 site-container md:py-20 lg:py-24">
            @if(count($specs) > 0)
            <div class="mx-auto grid max-w-[980px] grid-cols-1 gap-5 md:grid-cols-2 md:gap-x-12 md:gap-y-6">
                @foreach($specs as $spec)
                    <div class="flex items-start gap-3.5">
                        <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center text-white/85" aria-hidden="true">
                            <svg class="h-[1.35rem] w-[1.35rem]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M8 12l2.5 2.5L16 9"/>
                            </svg>
                        </span>
                        <p class="m-0 text-[0.9375rem] leading-relaxed text-white/90">
                            <span class="font-semibold">{{ $spec['label'] }} :</span> {{ $spec['value'] }}
                        </p>
                    </div>
                @endforeach
            </div>
            @endif

            <div class="mt-10 flex justify-center">
                <a
                    href="{{ $buyUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex min-w-[180px] items-center justify-center rounded-md border-2 border-white/90 px-9 py-3.5 text-[0.8125rem] font-bold uppercase tracking-widest text-white no-underline transition hover:-translate-y-px hover:bg-white hover:text-navy"
                >
                    Buy Now
                </a>
            </div>
        </div>
    </section>

    {{-- Compact social strip --}}
    <section class="border-t border-white/10 bg-litus-product-footer">
        <div class="py-10 text-center site-container md:py-12">
            <div class="mb-5 flex items-center justify-center gap-3.5">
                <a
                    href="https://www.facebook.com/litusautomobiles"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#1877f2] text-white no-underline transition hover:-translate-y-0.5 hover:opacity-90"
                    aria-label="Facebook"
                >
                    <svg class="h-[1.15rem] w-[1.15rem]" viewBox="0 0 24 24" fill="currentColor"><path d="M14 8.5V6.75c0-.69.56-1.25 1.25-1.25h1.5V3h-2.1C13.16 3 12 4.16 12 5.9V8.5H9.5v3.25H12V21h3.5v-9.25H17.9L18.5 8.5H15.5z"/></svg>
                </a>
                <a
                    href="https://www.instagram.com/litusautomobiles"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-[#f58529] via-[#dd2a7b] to-[#8134af] text-white no-underline transition hover:-translate-y-0.5 hover:opacity-90"
                    aria-label="Instagram"
                >
                    <svg class="h-[1.15rem] w-[1.15rem]" viewBox="0 0 24 24" fill="currentColor"><path d="M7 3h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4zm5 4.75A4.25 4.25 0 1 0 16.25 12 4.25 4.25 0 0 0 12 7.75zm5.75-2.5a1 1 0 1 0-1 1 1 1 0 0 0 1-1zM12 9.5A2.5 2.5 0 1 1 9.5 12 2.5 2.5 0 0 1 12 9.5z"/></svg>
                </a>
                <a
                    href="{{ $whatsapp }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#25d366] text-white no-underline transition hover:-translate-y-0.5 hover:opacity-90"
                    aria-label="WhatsApp"
                >
                    <svg class="h-[1.15rem] w-[1.15rem]" viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 2.1.68 4.03 1.84 5.6L2 22l4.63-1.92a9.86 9.86 0 0 0 5.41 1.59h.01c5.46 0 9.91-4.45 9.91-9.91C22 6.45 17.5 2 12.04 2zm5.8 14.07c-.25.7-1.45 1.34-2 1.42-.5.08-1.15.12-1.85-.12-.43-.16-1-.52-1.72-.9-3.03-1.78-5-5.02-5.15-5.25-.14-.23-1.23-1.64-1.23-3.13s.78-2.22 1.1-2.52c.28-.28.74-.4 1.18-.4.14 0 .27.01.39.01.33.01.5.04.72.56.25.6.86 2.1.93 2.25.07.15.12.33.02.53-.1.2-.15.33-.3.5-.15.17-.31.38-.44.5-.15.15-.31.31-.13.61.18.3.8 1.32 1.72 2.14 1.18 1.05 2.17 1.38 2.48 1.53.31.16.49.14.67-.08.18-.22.77-.9.98-1.21.21-.31.42-.26.72-.16.3.1 1.9.9 2.23 1.06.33.16.55.24.63.37.08.14.08.8-.17 1.5z"/></svg>
                </a>
            </div>
            <p class="m-0 text-xs tracking-wide text-white/55">
                Copyright © {{ date('Y') }} LITUS AUTOMOBILES — All Rights Reserved.
            </p>
        </div>
    </section>
</div>
