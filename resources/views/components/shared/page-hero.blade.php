@props([
    'tagline' => null,
    'title' => 'About Us',
    'subtitle' => '',
    'backgroundImage' => 'images/background/about-1-ezgif.com-png-to-webp-converter.webp',
])

@php
    $bg = asset($backgroundImage);
@endphp

<section class="page-hero page-hero-standard relative flex items-start w-full overflow-hidden">
    <div
        class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ $bg }}');"
        role="img"
        aria-hidden="true"
    ></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#00105B]/80 via-[#00105B]/40 to-[#00105B]/25"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#00105B]/35 to-transparent"></div>

    <div class="relative z-10 w-full site-container">
        <div class="max-w-2xl">
            @if($tagline)
                <p class="text-white/80 text-xs sm:text-sm font-semibold tracking-[0.25em] uppercase mb-3">
                    {{ $tagline }}
                </p>
            @endif
            <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-[1.1] mb-4">
                {{ $title }}
            </h1>
            @if($subtitle)
                <p class="text-white/85 text-sm sm:text-base leading-relaxed max-w-xl">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#C41E3A] to-transparent opacity-80"></div>
</section>
