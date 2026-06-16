@props([
    'tagline' => null,
    'title' => 'About Us',
    'subtitle' => '',
    'backgroundImage' => 'images/background/about-1-ezgif.com-png-to-webp-converter.webp',
    'size' => 'medium',
])

@php
    $bg = asset($backgroundImage);
    $heightClass = $size === 'large' ? 'page-hero--large' : 'page-hero--medium';
@endphp

<section class="page-hero {{ $heightClass }} relative flex items-end w-full overflow-hidden">
    <div
        class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ $bg }}');"
        role="img"
        aria-hidden="true"
    ></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#00105B]/80 via-[#00105B]/40 to-[#00105B]/25"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#00105B]/35 to-transparent"></div>

    <div class="relative z-10 w-full site-container pb-10 md:pb-14 lg:pb-16">
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

<style>
    .page-hero--medium {
        min-height: 42vh;
        min-height: 42dvh;
    }
    .page-hero--large {
        min-height: 100vh;
        min-height: 100dvh;
        height: 100vh;
        height: 100dvh;
    }
    @media (min-width: 768px) {
        .page-hero--medium {
            min-height: 48vh;
            min-height: 48dvh;
        }
    }
</style>
