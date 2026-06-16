@php
    $hasHeroOverlay = request()->routeIs('home', 'about', 'motorcycles', 'ownership-plans', 'ownership-hub', 'ownership-hub.show', 'parts', 'service-center', 'contact', 'gallery', 'products.show');
    $navLogo = asset('images/icon/Litus-Automobiles-white.png');

    $navItems = [
        ['label' => 'Home', 'url' => route('home'), 'active' => request()->routeIs('home')],
        ['label' => 'About-Us', 'url' => route('about'), 'active' => request()->routeIs('about')],
        ['label' => 'Motorcycles', 'url' => route('motorcycles'), 'active' => request()->routeIs('motorcycles')],
        ['label' => 'Ownership Plans', 'url' => route('ownership-plans'), 'active' => request()->routeIs('ownership-plans')],
        ['label' => 'Ownership Hub', 'url' => route('ownership-hub'), 'active' => request()->routeIs('ownership-hub', 'ownership-hub.show')],
        ['label' => 'Parts', 'url' => route('parts'), 'active' => request()->routeIs('parts')],
        ['label' => 'Service Center', 'url' => route('service-center'), 'active' => request()->routeIs('service-center')],
        ['label' => 'Contact-Us', 'url' => route('contact'), 'active' => request()->routeIs('contact')],
        ['label' => 'Gallery', 'url' => route('gallery'), 'active' => request()->routeIs('gallery')],
    ];
@endphp

<header class="{{ $hasHeroOverlay ? 'fixed' : 'sticky' }} top-0 left-0 right-0 z-50">
    <nav id="main-nav" class="main-nav transition-all duration-300 {{ $hasHeroOverlay ? 'main-nav--hero' : 'main-nav--scrolled' }}">
        <div class="site-container">
            <div class="h-16 lg:h-[4.5rem] relative flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center z-10" aria-label="LITUS Automobiles">
                    <span class="nav-logo-slot h-9 md:h-10 lg:h-11 w-32 sm:w-36 md:w-40 lg:w-44" style="--nav-logo-url: url('{{ $navLogo }}')" role="img" aria-hidden="true"></span>
                </a>

                <div class="hidden xl:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 items-center gap-1">
                    @foreach($navItems as $item)
                        <a href="{{ $item['url'] }}" class="nav-link {{ $item['active'] ? 'is-active' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <div class="flex items-center z-10">
                    <a
                        href="{{ route('contact') }}"
                        class="nav-cta hidden lg:inline-flex items-center justify-center px-5 py-2 rounded text-sm font-bold uppercase tracking-wider transition-all"
                    >
                    Call Now
                    </a>

                    <button
                        type="button"
                        class="xl:hidden inline-flex items-center justify-center w-10 h-10 rounded border transition-colors mobile-menu-btn"
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                        id="mobile-menu-button"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="xl:hidden hidden pb-4">
                <div class="mobile-menu-panel mt-2 rounded-xl overflow-hidden">
                    <div class="p-2 space-y-0.5">
                        @foreach($navItems as $item)
                            <a href="{{ $item['url'] }}" class="mobile-link {{ $item['active'] ? 'is-active' : '' }}">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
                    <div class="p-3 border-t border-white/10">
                        <a href="{{ route('contact') }}" class="nav-cta w-full py-3 rounded text-sm font-bold uppercase tracking-wider text-center block">
                        Call Now
                        </a>
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
        window.addEventListener('resize', () => { if (window.innerWidth >= 1280) setExpanded(false); });

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
