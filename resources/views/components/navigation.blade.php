@php
    $accent = '#c19b46';
@endphp

<header class="sticky top-0 z-50">
    <nav id="main-nav" class="main-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="h-16 relative flex items-center justify-between">
                {{-- Logo (left) --}}
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center z-10">
                    <img
                        src="{{ asset('images/background/Logo-L-web.png') }}"
                        alt="Al Zaha General Trading"
                        class="h-9 md:h-10 lg:h-11 w-auto object-contain transition-opacity"
                        loading="eager"
                        decoding="async"
                    >
                </a>

                {{-- Desktop nav (centered on page) --}}
                <div class="hidden md:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center gap-1.5">
                    <a
                        href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}"
                    >
                        Home
                    </a>
                    <a
                        href="{{ route('about') }}"
                        class="nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}"
                    >
                        About Us
                    </a>
                    <a
                        href="{{ route('contact') }}"
                        class="nav-link {{ request()->routeIs('contact') ? 'is-active' : '' }}"
                    >
                        Contact Us
                    </a>
                </div>

                {{-- Right side --}}
                <div class="flex items-center gap-3 z-10">
                    <button
                        type="button"
                        data-open-quote-modal
                        class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold text-white shadow-md shadow-amber-900/20 transition-all hover:shadow-lg hover:shadow-amber-900/25 active:scale-[0.98]"
                        style="background-color: {{ $accent }};"
                    >
                        Request a Quote
                    </button>

                    {{-- Mobile menu button --}}
                    <button
                        type="button"
                        class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-full border border-stone-200 bg-white hover:bg-stone-50 transition-colors"
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                        id="mobile-menu-button"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5 text-neutral-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Mobile menu – modern card design --}}
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <div class="mt-3 rounded-2xl bg-white/95 backdrop-blur-sm border border-stone-200/80 shadow-xl shadow-stone-400/15 overflow-hidden">
                    <div class="p-3 space-y-0.5">
                        <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
                        <a href="{{ route('about') }}" class="mobile-link {{ request()->routeIs('about') ? 'is-active' : '' }}">About</a>
                        <a href="{{ route('contact') }}" class="mobile-link {{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact</a>
                    </div>
                    <div class="p-3 border-t border-stone-100">
                        <button
                            type="button"
                            data-open-quote-modal
                            class="w-full inline-flex items-center justify-center px-5 py-3 rounded-full text-sm font-semibold text-white shadow-md shadow-amber-900/20 transition-all hover:shadow-lg hover:shadow-amber-900/25 active:scale-[0.98]"
                            style="background-color: {{ $accent }};"
                        >
                            Request a Quote
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

        // Mobile menu toggle
        const setExpanded = (expanded) => {
            btn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
            menu.classList.toggle('hidden', !expanded);
        };

        btn.addEventListener('click', () => {
            const expanded = btn.getAttribute('aria-expanded') === 'true';
            setExpanded(!expanded);
        });

        // Close on resize up to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) setExpanded(false);
        });

        // Close mobile menu when opening quote modal
        document.querySelectorAll('[data-open-quote-modal]').forEach((trigger) => {
            trigger.addEventListener('click', () => setExpanded(false));
        });

        // Navbar scroll effect - transparent at top, solid when scrolled
        const updateNavbar = () => {
            const scrolled = window.scrollY > 15;
            nav.classList.toggle('main-nav--scrolled', scrolled);
        };

        updateNavbar();
        window.addEventListener('scroll', updateNavbar, { passive: true });
    })();
</script>

<style>
    /* Nav: glass at top, solid when scrolled */
    .main-nav {
        background-color: rgba(255, 255, 255, 0.2) !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.35) !important;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1) !important;
    }
    .main-nav.main-nav--scrolled {
        background-color: rgba(255, 255, 255, 0.92) !important;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border-bottom-color: rgba(0, 0, 0, 0.08) !important;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06) !important;
    }

    .nav-link {
        display: inline-flex;
        align-items: center;
        height: 2.5rem;
        padding: 0 1rem;
        border-radius: 9999px;
        font-size: 1.0625rem;
        font-weight: 600;
        color: #57534e;
        transition: background-color 200ms ease, color 200ms ease, box-shadow 200ms ease, transform 150ms ease;
    }
    .nav-link:hover {
        background: transparent;
        color: #c19b46;
    }
    .nav-link.is-active {
        background: transparent;
        color: #1a1a1a;
        box-shadow: none;
        transform: none;
    }
    .nav-link.is-active:hover {
        background: transparent;
        color: #1a1a1a;
    }

    .mobile-link {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0.875rem 1rem;
        border-radius: 9999px;
        font-size: 1.0625rem;
        font-weight: 600;
        color: #57534e;
        transition: background-color 200ms ease, color 200ms ease, box-shadow 200ms ease, transform 150ms ease;
    }
    .mobile-link:hover {
        background: transparent;
        color: #c19b46;
    }
    .mobile-link.is-active {
        background: transparent;
        color: #1a1a1a;
        box-shadow: none;
        transform: none;
    }
</style>