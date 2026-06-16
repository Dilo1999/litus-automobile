@props([
    'title' => null,
    'metaDescription' => null,
    'metaKeywords' => null,
    'ogTitle' => null,
    'ogDescription' => null,
    'ogImage' => null,
    'robots' => null,
    'canonicalUrl' => null,
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $routeName = request()->route()?->getName();
        $seoPrefix = match($routeName) {
            'home' => 'seo_home',
            'about' => 'seo_about',
            'contact' => 'seo_contact',
            default => null,
        };

        $hasSettings = \Illuminate\Support\Facades\Schema::hasTable('settings');
        // SEO from System Settings takes precedence; then passed props; then defaults
        $pageTitle = ($seoPrefix && $hasSettings ? \App\Models\Setting::get("{$seoPrefix}_meta_title") : null)
            ?? $title
            ?? 'Al Zaha General Trading';
        $pageMetaDescription = ($seoPrefix && $hasSettings ? \App\Models\Setting::get("{$seoPrefix}_meta_description") : null)
            ?? $metaDescription;
        $pageMetaKeywords = ($seoPrefix && $hasSettings ? \App\Models\Setting::get("{$seoPrefix}_meta_keywords") : null)
            ?? $metaKeywords;
        $pageOgTitle = ($seoPrefix && $hasSettings ? \App\Models\Setting::get("{$seoPrefix}_og_title") : null)
            ?? $ogTitle
            ?? $pageTitle;
        $pageOgDescription = ($seoPrefix && $hasSettings ? \App\Models\Setting::get("{$seoPrefix}_og_description") : null)
            ?? $ogDescription
            ?? $pageMetaDescription;
        $pageOgImage = ($seoPrefix && $hasSettings ? \App\Models\Setting::get("{$seoPrefix}_og_image") : null)
            ?? $ogImage;
        $pageRobots = ($seoPrefix && $hasSettings ? \App\Models\Setting::get("{$seoPrefix}_robots", 'index,follow') : null)
            ?? $robots;
        $pageCanonical = $canonicalUrl ?? ($routeName ? url()->current() : null);

        $favicon = $hasSettings ? \App\Models\Setting::get('favicon') : null;
    @endphp
    <title>{{ $pageTitle }}</title>
    @if($pageMetaDescription)
        <meta name="description" content="{{ $pageMetaDescription }}">
    @endif
    @if($pageMetaKeywords)
        <meta name="keywords" content="{{ $pageMetaKeywords }}">
    @endif
    @if($pageRobots)
        <meta name="robots" content="{{ $pageRobots }}">
    @endif
    @if($pageCanonical)
        <link rel="canonical" href="{{ $pageCanonical }}">
    @endif

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $pageOgTitle }}">
    @if($pageOgDescription)
        <meta property="og:description" content="{{ $pageOgDescription }}">
    @endif
    <meta property="og:url" content="{{ $pageCanonical ?? url()->current() }}">
    <meta property="og:site_name" content="Al Zaha General Trading">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    @if($pageOgImage)
        <meta property="og:image" content="{{ asset('storage/' . $pageOgImage) }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
    @endif

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="{{ $pageOgImage ? 'summary_large_image' : 'summary' }}">
    <meta name="twitter:title" content="{{ $pageOgTitle }}">
    @if($pageOgDescription)
        <meta name="twitter:description" content="{{ $pageOgDescription }}">
    @endif
    @if($pageOgImage)
        <meta name="twitter:image" content="{{ asset('storage/' . $pageOgImage) }}">
    @endif

    <link rel="icon" href="{{ $favicon ? asset('storage/' . $favicon) : asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body @class([
    'bg-litus-bg',
    'bg-litus-product' => request()->routeIs('products.show'),
])>
    <x-shared.navigation />

    @php
        $formSuccessMessage = session('quote_success') ?? session('success');
        $formSuccessTitle = session('quote_success') ? 'Request received' : (session('success') ? 'Message sent' : null);
    @endphp

    @if ($formSuccessMessage)
        <div id="form-success-popup" class="form-success-popup" role="alert" aria-live="polite" aria-modal="true">
            <div class="form-success-popup-backdrop"></div>
            <div class="form-success-popup-box">
                <div class="form-success-popup-icon" aria-hidden="true">✓</div>
                <h3 class="form-success-popup-title">{{ $formSuccessTitle }}</h3>
                <p class="form-success-popup-message">{{ $formSuccessMessage }}</p>
                <button type="button" class="form-success-popup-btn" onclick="document.getElementById('form-success-popup').remove()">
                    OK
                </button>
            </div>
        </div>
        <script>
            (function () {
                var popup = document.getElementById('form-success-popup');
                if (!popup) return;
                var backdrop = popup.querySelector('.form-success-popup-backdrop');
                function closePopup() { popup.remove(); }
                if (backdrop) backdrop.addEventListener('click', closePopup);
                setTimeout(closePopup, 8000);
            })();
        </script>
    @endif
    
    <main>
        {{ $slot }}
    </main>

    @unless(request()->routeIs('home', 'products.show'))
        <x-shared.logo-marquee />
    @endunless

    @unless(request()->routeIs('products.show'))
        <x-shared.footer />
    @endunless

    <x-quote.modal :external-trigger="true" />

    @if ($errors->hasAny(['name', 'email', 'contact_number', 'country', 'product', 'message']))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.dispatchEvent(new CustomEvent('open-quote-modal', { detail: { modalId: 'quote-modal' } }));
            });
        </script>
    @endif
</body>
</html>
