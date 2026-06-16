@php
    $logos = range(1, 15);
@endphp
<section
    id="logo-marquee"
    class="relative z-0 overflow-hidden flex items-center h-[8rem] md:h-[9rem] bg-litus-bg"
>
    <div class="marquee-track flex items-center gap-12 md:gap-16 w-max h-full animate-logo-scroll">
        {{-- First set of logos --}}
        @foreach ($logos as $i)
            <div class="marquee-item flex-shrink-0 flex items-center justify-center h-full" style="width: 140px;">
                <img src="{{ asset('images/partners/' . $i . '.webp') }}" alt="Partner {{ $i }}" class="max-h-[4.5rem] md:max-h-20 w-auto object-contain">
            </div>
        @endforeach
        {{-- Duplicate set for seamless loop --}}
        @foreach ($logos as $i)
            <div class="marquee-item flex-shrink-0 flex items-center justify-center h-full" style="width: 140px;">
                <img src="{{ asset('images/partners/' . $i . '.webp') }}" alt="Partner {{ $i }}" class="max-h-[4.5rem] md:max-h-20 w-auto object-contain">
            </div>
        @endforeach
    </div>
</section>
