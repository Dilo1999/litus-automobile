@props([
    'testimonials' => [],
    'latestUpdatePosts' => [],
    'ownershipGuidePosts' => [],
    'ridingMaintenancePosts' => [],
])

@php
    $heroBg = 'https://images.unsplash.com/photo-1558981359-219d6364c9c8?auto=format&fit=crop&w=1600&q=80';
    $whatsapp = 'https://wa.me/9607797442';

    $sections = [
        [
            'id' => 'latest-updates',
            'label' => 'Latest Updates',
            'title' => 'Latest Updates',
            'description' => 'Share new arrivals, active promotions, and important company announcements from LITUS in one clear update section.',
            'accent' => '#d7a63f',
            'soft' => '#f8efd9',
            'alt' => false,
            'filters' => [
                ['title' => 'New Arrivals', 'filter_key' => 'new-arrivals'],
                ['title' => 'Promotions', 'filter_key' => 'promotions'],
                ['title' => 'Company Announcements', 'filter_key' => 'company-announcements'],
            ],
            'all_label' => 'All Updates',
        ],
        [
            'id' => 'ownership-guides',
            'label' => 'Ownership Guides',
            'title' => 'Ownership Guides',
            'description' => 'Explain LITUS ownership plans, Ijara concepts, documents, approvals, and early settlement in simple customer-friendly language.',
            'accent' => '#2563eb',
            'soft' => '#dbeafe',
            'alt' => true,
            'filters' => [
                ['title' => 'Plan Explanations', 'filter_key' => 'plan-explanations'],
                ['title' => 'Ijara Tips', 'filter_key' => 'ijara-tips'],
                ['title' => 'Early Settlement Guides', 'filter_key' => 'early-settlement-guides'],
            ],
            'all_label' => 'All Guides',
        ],
        [
            'id' => 'riding-maintenance',
            'label' => 'Riding & Maintenance',
            'title' => 'Riding & Maintenance',
            'description' => 'Support customers after purchase with practical service tips, safer riding advice, and product care guidance.',
            'accent' => '#059669',
            'soft' => '#d1fae5',
            'alt' => false,
            'filters' => [
                ['title' => 'Service Tips', 'filter_key' => 'service-tips'],
                ['title' => 'Riding Advice', 'filter_key' => 'riding-advice'],
                ['title' => 'Product Care', 'filter_key' => 'product-care'],
            ],
            'all_label' => 'All Tips',
        ],
    ];

    $sectionPosts = [
        'latest-updates' => $latestUpdatePosts,
        'ownership-guides' => $ownershipGuidePosts,
        'riding-maintenance' => $ridingMaintenancePosts,
    ];

    $customerStoryCards = [
        [
            'title' => 'Delivery Stories',
            'description' => 'Read how customers received their motorcycles — from order confirmation and shipment updates to handover day.',
            'image' => 'https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?auto=format&fit=crop&w=900&q=80',
            'items' => ['Order-to-delivery timelines', 'Island and atoll delivery experiences', 'Handover and first-ride moments'],
            'btn' => 'Read Delivery Stories',
            'url' => route('ownership-hub.show', ['category' => 'customer-stories', 'slug' => 'delivery-stories']),
        ],
        [
            'title' => 'Ownership Journeys',
            'description' => 'Follow real ownership paths — choosing a plan, completing payments, servicing, and long-term riding with LITUS.',
            'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=900&q=80',
            'items' => ['Plan selection and approval stories', 'Monthly payment and settlement journeys', 'Service, care, and everyday riding'],
            'btn' => 'Explore Ownership Journeys',
            'url' => route('ownership-hub.show', ['category' => 'customer-stories', 'slug' => 'ownership-journeys']),
        ],
    ];

    $customerStoriesAccent = '#7c3aed';
    $customerStoriesSoft = '#ede9fe';

    $sectionNav = array_merge(
        array_map(fn ($section) => [
            'label' => $section['label'],
            'id' => $section['id'],
            'accent' => $section['accent'],
            'soft' => $section['soft'],
        ], $sections),
        [[
            'label' => 'Customer Stories',
            'id' => 'customer-stories',
            'accent' => $customerStoriesAccent,
            'soft' => $customerStoriesSoft,
        ]]
    );
@endphp

<x-layouts.app title="Ownership Hub - LITUS Automobiles">
  <div class="min-h-screen bg-[#f6f7fb] text-gray-900 leading-normal">
    {{-- Hero --}}
    <section
      class="relative bg-cover bg-center text-white py-[70px] md:py-[95px]"
      style="background-image: linear-gradient(90deg, rgba(5,10,25,0.94), rgba(5,10,25,0.62)), url('{{ $heroBg }}');"
    >
      <div class="site-container max-w-[1200px]">
        <p class="mb-2.5 text-[13px] font-extrabold uppercase tracking-wide text-[#d7a63f]">LITUS Ownership Hub</p>
        <h1 class="mb-5 text-[clamp(38px,6vw,72px)] font-black uppercase leading-none">
          Ownership Hub
          <span class="mt-1 block text-[#d7a63f]">Updates, Guides & Tips</span>
        </h1>
        <p class="max-w-[720px] text-lg text-gray-200">
          A dedicated blog-style hub for LITUS customers to explore latest updates,
          ownership guidance, Ijara information, riding advice, and maintenance tips.
        </p>
      </div>
    </section>

    {{-- Section quick nav --}}
    <nav class="border-b border-[#eef0f4] bg-white shadow-[0_8px_24px_rgba(15,23,42,0.06)]" aria-label="Ownership Hub sections">
      <div class="site-container max-w-[1200px] py-4 md:py-5">
        <div class="flex flex-wrap justify-center gap-2.5 md:gap-3">
          @foreach($sectionNav as $item)
            <a
              href="#{{ $item['id'] }}"
              data-hub-section-link
              class="inline-flex items-center justify-center rounded-full px-4 py-2.5 text-xs font-extrabold uppercase tracking-wide no-underline transition hover:-translate-y-px md:px-5 md:text-[13px]"
              style="background-color: {{ $item['soft'] }}; color: {{ $item['accent'] }};"
            >
              {{ $item['label'] }}
            </a>
          @endforeach
        </div>
      </div>
    </nav>

    {{-- Category sections --}}
    @foreach($sections as $section)
      <section id="{{ $section['id'] }}" class="scroll-mt-20 py-[55px] lg:scroll-mt-24 md:py-[75px] {{ $section['alt'] ? 'bg-white' : '' }}">
        <div class="site-container max-w-[1200px]">
          <div class="mb-[34px] max-w-[820px]">
            <span
              class="mb-3.5 inline-flex rounded-full px-3 py-1.5 text-xs font-black uppercase"
              style="background-color: {{ $section['soft'] }}; color: {{ $section['accent'] }};"
            >
              {{ $section['label'] }}
            </span>
            <h2 class="mb-3 text-[clamp(30px,4vw,48px)] font-black leading-tight text-slate-900">{{ $section['title'] }}</h2>
            <p class="text-[17px] text-gray-500">{{ $section['description'] }}</p>
          </div>

          @if(! empty($sectionPosts[$section['id']]))
            <x-ownership-hub.partials.filtered-posts
              :filters="$section['filters']"
              :posts="$sectionPosts[$section['id']]"
              :accent-color="$section['accent']"
              :soft-color="$section['soft']"
              :all-label="$section['all_label']"
              :aria-label="'Filter ' . strtolower($section['label'])"
            />
          @endif
        </div>
      </section>
    @endforeach

    {{-- Customer Stories / Testimonials --}}
    <section id="customer-stories" class="scroll-mt-20 bg-white py-[55px] lg:scroll-mt-24 md:py-[75px]">
      <div class="site-container max-w-[1200px]">
        <div class="mb-[34px] max-w-[820px]">
          <span
            class="mb-3.5 inline-flex rounded-full px-3 py-1.5 text-xs font-black uppercase"
            style="background-color: {{ $customerStoriesSoft }}; color: {{ $customerStoriesAccent }};"
          >
            Customer Stories
          </span>
          <h2 class="mb-3 text-[clamp(30px,4vw,48px)] font-black leading-tight text-slate-900">Customer Stories</h2>
          <p class="text-[17px] text-gray-500">
            Real Google reviews from LITUS customers - sharing their experiences with purchases,
            delivery, service, and ownership support.
          </p>
        </div>

        <x-ownership-hub.partials.testimonial-slider
          :testimonials="$testimonials"
          :accent-color="$customerStoriesAccent"
        />

        <div class="mt-8 text-center">
          <a
            href="https://www.google.com/search?q=litus+automobiles&rlz=1C1HKFL_en-GBLK1198LK1198&oq=litus+automobiles&gs_lcrp=EgZjaHJvbWUqBggAEEUYOzIGCAAQRRg7MgcIARAAGIAEMgcIAhAAGIAEMgcIAxAAGIAEMgcIBBAAGIAEMgYIBRBFGDwyBggGEEUYPDIGCAcQRRg80gEINDM2N2owajeoAgCwAgA&sourceid=chrome&ie=UTF-8#lrd=0x3b3f7efec481ff9f:0xe0d186de232eaf3d,1,,,,"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center justify-center rounded-lg px-[18px] py-3 text-sm font-extrabold text-white no-underline transition hover:-translate-y-px hover:brightness-95"
            style="background-color: {{ $customerStoriesAccent }};"
          >
            View All Testimonials
          </a>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-[22px] md:grid-cols-2">
          @foreach($customerStoryCards as $card)
            <x-ownership-hub.partials.card
              label="Customer Stories"
              :title="$card['title']"
              :description="$card['description']"
              :image="$card['image']"
              :items="$card['items']"
              :btn-text="$card['btn']"
              :url="$card['url']"
              :accent-color="$customerStoriesAccent"
              card-bg="bg-gray-50"
            />
          @endforeach
        </div>
      </div>
    </section>

    {{-- Final CTA --}}
    <section class="py-[55px] md:py-[75px]">
      <div class="site-container max-w-[1200px]">
        <div class="rounded-3xl bg-[#07111f] px-7 py-11 text-center text-white">
          <h2 class="mb-2.5 text-[clamp(30px,4vw,44px)] font-black">Need help with ownership?</h2>
          <p class="mx-auto mb-6 max-w-[720px] text-base text-slate-300">
            Talk to the LITUS team for help choosing a plan, understanding Ijara,
            learning about early settlement, or finding the right motorcycle for your needs.
          </p>
          <div class="flex flex-wrap justify-center gap-3">
            <a
              href="{{ $whatsapp }}"
              target="_blank"
              rel="noopener noreferrer"
              class="inline-flex items-center justify-center rounded-lg bg-[#d7a63f] px-[18px] py-3 text-sm font-extrabold text-gray-900 no-underline transition hover:bg-[#c69532]"
            >
              Chat on WhatsApp
            </a>
            <a
              href="{{ route('ownership-plans') }}"
              class="inline-flex items-center justify-center rounded-lg bg-white px-[18px] py-3 text-sm font-extrabold text-gray-900 no-underline transition hover:bg-gray-100"
            >
              View Ownership Plans
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    document.querySelectorAll('[data-hub-section-link]').forEach((link) => {
      link.addEventListener('click', (event) => {
        const targetId = link.getAttribute('href')?.slice(1);
        if (!targetId) return;

        const target = document.getElementById(targetId);
        if (!target) return;

        event.preventDefault();

        const nav = document.getElementById('main-nav');
        const offset = (nav?.offsetHeight || 72) + 16;
        const top = target.getBoundingClientRect().top + window.scrollY - offset;

        window.scrollTo({ top, behavior: 'smooth' });
      });
    });

    document.querySelectorAll('[data-hub-filter-root]').forEach((root) => {
      const posts = Array.from(root.querySelectorAll('[data-hub-post]'));
      const emptyState = root.querySelector('[data-hub-empty]');
      const postsGrid = root.querySelector('[data-hub-posts]');

      const applyFilter = (filter) => {
        let visibleCount = 0;

        root.querySelectorAll('[data-hub-filter]').forEach((button) => {
          button.classList.toggle('is-active', button.dataset.hubFilter === filter);
        });

        posts.forEach((post) => {
          const show = filter === 'all' || post.dataset.hubPost === filter;
          post.classList.toggle('hidden', !show);
          if (show) visibleCount += 1;
        });

        if (postsGrid) postsGrid.classList.toggle('hidden', visibleCount === 0);
        if (emptyState) emptyState.classList.toggle('hidden', visibleCount > 0);
      };

      root.querySelectorAll('[data-hub-filter]').forEach((button) => {
        button.addEventListener('click', () => {
          applyFilter(button.dataset.hubFilter || 'all');
        });
      });

      applyFilter('all');
    });
  </script>
</x-layouts.app>
