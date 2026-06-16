@php
    $isHome = request()->routeIs('home');
    $hasHeroOverlay = request()->routeIs('home', 'about');
@endphp

<header class="{{ $hasHeroOverlay ? 'fixed' : 'sticky' }} top-0 left-0 right-0 z-50">
    <nav id="main-nav" class="main-nav transition-all duration-300 {{ $hasHeroOverlay ? 'main-nav--hero' : 'main-nav--scrolled' }}">
        <div class="site-container">
            <div class="h-16 lg:h-[4.5rem] relative flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center z-10">
                    <img
                        src="{{ asset('images/background/Logo-L-web.png') }}"
                        alt="Al Zaha General Trading"
                        class="nav-logo h-9 md:h-10 lg:h-11 w-auto object-contain transition-all duration-300"
                        loading="eager"
                        decoding="async"
                    >
                </a>

                <div class="hidden lg:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}">About Us</a>
                    <a href="{{ route('home') }}#products" class="nav-link">Motorcycles</a>
                    <a href="{{ route('home') }}#products" class="nav-link">Spare Parts</a>
                    <a href="{{ route('home') }}#products" class="nav-link">Tyres</a>
                    <a href="{{ route('contact') }}" class="nav-link">Dealer Finder</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact Us</a>
                    <a href="{{ route('home') }}#gallery" class="nav-link">Gallery</a>
                </div>

                <div class="flex items-center z-10">
                    <button type="button" class="nav-search-btn hidden sm:flex" aria-label="Search">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </button>
                    <button
                        type="button"
                        data-open-quote-modal
                        class="nav-cta hidden sm:inline-flex items-center justify-center px-5 py-2 rounded text-sm font-bold uppercase tracking-wider transition-all"
                    >
                        Join
                    </button>

                    <button
                        type="button"
                        class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded border transition-colors mobile-menu-btn"
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                        id="mobile-menu-button"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="lg:hidden hidden pb-4">
                <div class="mobile-menu-panel mt-2 rounded-xl overflow-hidden">
                    <div class="p-2 space-y-0.5">
                        <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
                        <a href="{{ route('about') }}" class="mobile-link {{ request()->routeIs('about') ? 'is-active' : '' }}">About Us</a>
                        <a href="{{ route('home') }}#products" class="mobile-link">Motorcycles</a>
                        <a href="{{ route('home') }}#products" class="mobile-link">Spare Parts</a>
                        <a href="{{ route('home') }}#products" class="mobile-link">Tyres</a>
                        <a href="{{ route('contact') }}" class="mobile-link">Dealer Finder</a>
                        <a href="{{ route('contact') }}" class="mobile-link {{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact Us</a>
                        <a href="{{ route('home') }}#gallery" class="mobile-link">Gallery</a>
                    </div>
                    <div class="p-3 border-t border-white/10">
                        <button type="button" data-open-quote-modal class="nav-cta w-full py-3 rounded text-sm font-bold uppercase tracking-wider">
                            Join
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    (() => {
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        const nav = document.getElementById('main-nav');
        if (!btn || !menu || !nav) return;

        const setExpanded = (expanded) => {
            btn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
            menu.classList.toggle('hidden', !expanded);
        };

        btn.addEventListener('click', () => setExpanded(btn.getAttribute('aria-expanded') !== 'true'));
        window.addEventListener('resize', () => { if (window.innerWidth >= 1024) setExpanded(false); });
        document.querySelectorAll('[data-open-quote-modal]').forEach((t) => t.addEventListener('click', () => setExpanded(false)));

        const updateNavbar = () => {
            const scrolled = window.scrollY > 40;
            nav.classList.toggle('main-nav--scrolled', scrolled);
            nav.classList.toggle('main-nav--hero', !scrolled && nav.classList.contains('main-nav--hero-init'));
        };

        if (nav.classList.contains('main-nav--hero')) {
            nav.classList.add('main-nav--hero-init');
        }
        updateNavbar();
        window.addEventListener('scroll', updateNavbar, { passive: true });
    })();
</script>

<style>
    .main-nav {
        background: transparent;
        border-bottom: 1px solid transparent;
    }
    .main-nav--hero .nav-link,
    .main-nav--hero .nav-search-btn,
    .main-nav--hero .mobile-menu-btn {
        color: #fff;
    }
    .main-nav--hero .mobile-menu-btn {
        border-color: rgba(255,255,255,0.35);
        background: rgba(255,255,255,0.1);
    }
    .main-nav--hero .nav-logo {
        filter: brightness(0) invert(1);
    }
    .main-nav--scrolled {
        background: rgba(255, 255, 255, 0.97) !important;
        backdrop-filter: blur(10px);
        border-bottom-color: rgba(0, 16, 91, 0.08) !important;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06) !important;
    }
    .main-nav--scrolled .nav-link {
        color: var(--color-muted);
    }
    .main-nav--scrolled .nav-link:hover,
    .main-nav--scrolled .nav-link.is-active {
        color: var(--color-navy);
    }
    .main-nav--scrolled .nav-search-btn,
    .main-nav--scrolled .mobile-menu-btn {
        color: var(--color-navy);
    }
    .main-nav--scrolled .mobile-menu-btn {
        border-color: #e7e5e4;
        background: #fff;
    }
    .main-nav--scrolled .nav-logo {
        filter: none;
    }

    .nav-link {
        display: inline-flex;
        align-items: center;
        height: 2.5rem;
        padding: 0 0.5rem;
        font-size: 0.9375rem;
        font-weight: 600;
        color: rgba(255,255,255,0.9);
        text-decoration: none;
        transition: color 0.2s ease;
        white-space: nowrap;
    }
    .nav-link:hover { color: #fff; }
    .nav-link.is-active { font-weight: 700; }

    .nav-search-btn {
        width: 2.25rem;
        height: 2.25rem;
        margin-right: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: transparent;
        border: none;
        cursor: pointer;
        border-radius: 50%;
        transition: background 0.2s;
    }
    .nav-search-btn:hover { background: rgba(255,255,255,0.12); }
    .main-nav--scrolled .nav-search-btn:hover { background: rgba(0,16,91,0.06); }

    .nav-cta {
        background: var(--color-navy);
        color: #fff;
        border: none;
        cursor: pointer;
    }
    .nav-cta:hover { background: var(--color-navy-light); }
    .main-nav--hero .nav-cta {
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.4);
    }
    .main-nav--hero .nav-cta:hover { background: rgba(255,255,255,0.25); }
    .main-nav--scrolled .nav-cta {
        background: var(--color-navy);
        border: none;
    }

    .mobile-menu-panel {
        background: var(--color-navy);
        border: 1px solid rgba(255,255,255,0.1);
    }
    .main-nav--scrolled .mobile-menu-panel {
        background: #fff;
        border-color: #e7e5e4;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }
    .mobile-link {
        display: flex;
        padding: 0.75rem 1rem;
        font-size: 1.0625rem;
        font-weight: 600;
        color: rgba(255,255,255,0.9);
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.2s;
    }
    .mobile-link:hover { background: rgba(255,255,255,0.08); color: #fff; }
    .main-nav--scrolled .mobile-link { color: var(--color-muted); }
    .main-nav--scrolled .mobile-link:hover { background: #f5f5f4; color: var(--color-navy); }
    .main-nav--scrolled .mobile-link.is-active { color: var(--color-navy); font-weight: 600; }
</style>
