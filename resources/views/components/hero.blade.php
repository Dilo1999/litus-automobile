@props([
    'tagline' => 'Premium Trading',
    'title' => 'Al Zaha General Trading',
    'subtitle' => 'Quality products for your business.',
    'backgroundImage' => 'images/background/Build.png',
])

<section
    class="hero-section relative text-stone-800 overflow-hidden"
    style="
        margin-top: -4rem;
        padding-top: calc(1rem + 4rem);
        padding-bottom: 6rem;
        min-height: 36rem;
    "
>
    {{-- Background image --}}
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset($backgroundImage) }}');"></div>
    {{-- Light overlay for text readability – further reduced opacity so background image is more visible --}}
    <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(255,255,255,0.12) 0%, rgba(244,244,244,0.2) 100%);"></div>
    {{-- Pattern background --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'0.08\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <div class="relative z-10 w-full site-container" style="max-width: 1024px;">
        {{-- White transparent box (like home page hero) --}}
        <div class="relative rounded-3xl overflow-visible w-full" style="box-shadow: 0 25px 50px -12px rgba(0,0,0,0.2);">
            <div
                class="absolute inset-0 rounded-3xl pointer-events-none"
                style="background: rgba(255,255,255,0.50); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);"
                aria-hidden="true"
            ></div>
            <div class="relative z-10 flex flex-col items-center text-center px-8 py-10 sm:px-12 sm:py-12 md:px-16 md:py-14">
                <p class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-black tracking-[0.35em] uppercase mb-2" style="color: #c19b46;">{{ $tagline }}</p>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-[0.2em] uppercase text-stone-800">
                    {{ $title }}
                </h1>
                <p class="mt-6 text-base md:text-lg font-semibold text-stone-700 max-w-xl mx-auto">
                    {{ $subtitle }}
                </p>
            </div>
        </div>
        {{-- Divider (lines + icon) outside the box --}}
        <div class="mt-10 flex items-center justify-center gap-6">
            <span class="h-1.5 w-40 md:w-64" style="background-color: #c19b46;"></span>
            <span class="inline-flex h-12 w-12 min-w-[3rem] items-center justify-center rounded-full text-stone-500 overflow-hidden p-0">
                <img src="{{ asset('images/background/Untitled-3.png') }}" alt="" class="block h-8 w-8 max-w-full max-h-full object-contain flex-shrink-0 hero-icon" aria-hidden="true">
            </span>
            <span class="h-1.5 w-40 md:w-64" style="background-color: #c19b46;"></span>
        </div>
    </div>
</section>

<style>
    .hero-icon { object-position: 45% 45%; }
</style>
