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
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Styles -->
    {{-- Uncomment when Vite dev server is running: npm run dev --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
    <style>
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Figtree', sans-serif;
        }
        /* Shared hero section – same fixed height for About Us & Contact Us */
        .hero-section {
            height: 520px;
            min-height: 520px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        @media (min-width: 640px) {
            .hero-section { height: 600px; min-height: 600px; }
        }
        @media (min-width: 768px) {
            .hero-section { height: 680px; min-height: 680px; }
        }
        @media (min-width: 1024px) {
            .hero-section { height: 760px; min-height: 760px; }
        }
    </style>
</head>
<body class="antialiased" style="background-color: #F4F4F4;">
    <x-navigation />

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
        <style>
            .form-success-popup {
                --color-gold: #c19b46;
                --color-gold-dim: #a8843a;
                --color-dark: #1a1a1a;
                position: fixed;
                inset: 0;
                z-index: 99999;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1rem;
            }
            .form-success-popup-backdrop {
                position: absolute;
                inset: 0;
                background: rgba(0,0,0,0.4);
                backdrop-filter: blur(6px);
            }
            .form-success-popup-box {
                position: relative;
                width: 100%;
                max-width: 380px;
                background: #fff;
                border-radius: 12px;
                border: 1px solid #e7e5e4;
                box-shadow: 0 20px 40px rgba(0,0,0,0.15);
                padding: 2rem 1.75rem;
                text-align: center;
            }
            .form-success-popup-box::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 2px;
                background: linear-gradient(to right, transparent, var(--color-gold), transparent);
                border-radius: 12px 12px 0 0;
            }
            .form-success-popup-icon {
                width: 3rem;
                height: 3rem;
                margin: 0 auto 1rem;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dim) 100%);
                color: #fff;
                font-size: 1.5rem;
                font-weight: 700;
                display: flex;
                align-items: center;
                justify-content: center;
                line-height: 1;
            }
            .form-success-popup-title {
                font-family: 'Playfair Display', serif;
                font-size: 1.25rem;
                font-weight: 600;
                color: var(--color-dark);
                margin: 0 0 0.5rem;
            }
            .form-success-popup-message {
                font-size: 0.9375rem;
                color: #57534e;
                line-height: 1.5;
                margin: 0 0 1.5rem;
            }
            .form-success-popup-btn {
                display: inline-block;
                background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dim) 100%);
                color: var(--color-dark);
                font-weight: 600;
                font-size: 0.875rem;
                padding: 0.625rem 1.75rem;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }
            .form-success-popup-btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 6px 16px rgba(193, 155, 70, 0.35);
            }
        </style>
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

    <x-logo-marquee />

    <x-footer />

    <x-quote-modal :external-trigger="true" />

    @if ($errors->hasAny(['name', 'email', 'contact_number', 'country', 'product', 'message']))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.dispatchEvent(new CustomEvent('open-quote-modal', { detail: { modalId: 'quote-modal' } }));
            });
        </script>
    @endif
</body>
</html>
