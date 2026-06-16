@props([
    'testimonials' => [],
])

@php
    $heroBg = 'https://images.unsplash.com/photo-1558981359-219d6364c9c8?auto=format&fit=crop&w=1600&q=80';
    $featuredBg = 'https://images.unsplash.com/photo-1599819811279-d5ad9cccf838?auto=format&fit=crop&w=1400&q=80';
    $whatsapp = 'https://wa.me/9607797442';

    $sections = [
        [
            'label' => 'Latest Updates',
            'title' => 'Latest Updates',
            'description' => 'Share new arrivals, active promotions, and important company announcements from LITUS in one clear update section.',
            'accent' => '#d7a63f',
            'soft' => '#f8efd9',
            'alt' => false,
            'cards' => [
                [
                    'title' => 'New Arrivals',
                    'description' => 'Feature newly available motorcycles, fresh stock, new colors, model updates, and product highlights.',
                    'image' => 'https://images.unsplash.com/photo-1609630875171-b1321377ee65?auto=format&fit=crop&w=900&q=80',
                    'items' => ['New motorcycle models and variants', 'Recently added stock', 'Product availability updates'],
                    'btn' => 'View New Arrivals',
                    'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'new-arrivals']),
                ],
                [
                    'title' => 'Promotions',
                    'description' => 'Publish current campaigns, special ownership offers, seasonal promotions, and limited-time customer benefits.',
                    'image' => 'https://images.unsplash.com/photo-1558981852-426c6c22a060?auto=format&fit=crop&w=900&q=80',
                    'items' => ['Special offers and campaigns', 'Limited-time promotions', 'Important offer conditions'],
                    'btn' => 'View Promotions',
                    'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'promotions']),
                ],
                [
                    'title' => 'Company Announcements',
                    'description' => 'Use this area for official LITUS notices, service changes, branch updates, partnerships, and customer announcements.',
                    'image' => 'https://images.unsplash.com/photo-1486006920555-c77dcf18193c?auto=format&fit=crop&w=900&q=80',
                    'items' => ['Official LITUS notices', 'Service and process updates', 'Branch or operation announcements'],
                    'btn' => 'Read Announcements',
                    'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'company-announcements']),
                ],
            ],
        ],
        [
            'label' => 'Ownership Guides',
            'title' => 'Ownership Guides',
            'description' => 'Explain LITUS ownership plans, Ijara concepts, documents, approvals, and early settlement in simple customer-friendly language.',
            'accent' => '#2563eb',
            'soft' => '#dbeafe',
            'alt' => true,
            'cards' => [
                [
                    'title' => 'Plan Explanations',
                    'description' => 'Help customers understand each ownership plan and choose the option that suits their documents, guarantor situation, and budget.',
                    'image' => 'https://images.unsplash.com/photo-1622185135505-2d795003994a?auto=format&fit=crop&w=900&q=80',
                    'items' => ['Prime, Family, Secure, Flexi, Freedom, and Premium', 'Eligibility and document guidance', 'Best-fit plan explanations'],
                    'btn' => 'Read Plan Explanations',
                    'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'plan-explanations']),
                ],
                [
                    'title' => 'Ijara Tips',
                    'description' => 'Provide simple tips about the Islamic-compliant Ijara structure, application preparation, payment expectations, and approval process.',
                    'image' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=900&q=80',
                    'items' => ['Ijara explained simply', 'Application preparation tips', 'Approval process guidance'],
                    'btn' => 'Read Ijara Tips',
                    'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'ijara-tips']),
                ],
                [
                    'title' => 'Early Settlement Guides',
                    'description' => 'Explain how early settlement works, when it applies, and how customers can request support from the LITUS team.',
                    'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=80',
                    'items' => ['Early settlement basics', 'Plan-specific settlement guidance', 'How to request settlement support'],
                    'btn' => 'Explore Early Settlement',
                    'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'early-settlement-guides']),
                ],
            ],
        ],
        [
            'label' => 'Riding & Maintenance',
            'title' => 'Riding & Maintenance',
            'description' => 'Support customers after purchase with practical service tips, safer riding advice, and product care guidance.',
            'accent' => '#059669',
            'soft' => '#d1fae5',
            'alt' => false,
            'cards' => [
                [
                    'title' => 'Service Tips',
                    'description' => 'Share maintenance reminders that help customers keep their motorcycles reliable, safe, and ready for daily use.',
                    'image' => 'https://images.unsplash.com/photo-1591637333184-19aa84b3e01f?auto=format&fit=crop&w=900&q=80',
                    'items' => ['Regular service checklist', 'Oil, brakes, tyres, lights, and battery reminders', 'Early issue detection tips'],
                    'btn' => 'Read Service Tips',
                    'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'service-tips']),
                ],
                [
                    'title' => 'Riding Advice',
                    'description' => 'Publish helpful riding guidance for new and experienced riders, including safe habits and daily commute advice.',
                    'image' => 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=900&q=80',
                    'items' => ['Safe everyday riding habits', 'Rainy weather riding advice', 'First-time owner guidance'],
                    'btn' => 'Explore Riding Advice',
                    'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'riding-advice']),
                ],
                [
                    'title' => 'Product Care',
                    'description' => 'Help customers protect their motorcycle and accessories with simple cleaning, storage, and long-term care recommendations.',
                    'image' => 'https://images.unsplash.com/photo-1619771914272-e3c1ba17ba4d?auto=format&fit=crop&w=900&q=80',
                    'items' => ['Cleaning and storage advice', 'Battery and tyre care', 'Long-term product condition tips'],
                    'btn' => 'Learn Product Care',
                    'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'product-care']),
                ],
            ],
        ],
    ];

    $customerStoriesAccent = '#7c3aed';
    $customerStoriesSoft = '#ede9fe';

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

    {{-- Intro --}}
    <div class="site-container max-w-[1200px]">
      <div class="relative z-[2] -mt-9 rounded-[18px] bg-white p-6 shadow-[0_14px_35px_rgba(15,23,42,0.12)] md:p-[30px]">
        <h2 class="mb-2.5 text-[30px] font-black text-slate-900">Your complete ownership resource</h2>
        <p class="max-w-[850px] text-base text-gray-500">
          Ownership Hub replaces the traditional news page with a more useful customer resource.
          Each section below works as a blog category. When a customer clicks a button, they are
          taken to the related inner guide page.
        </p>
      </div>
    </div>

    {{-- Featured --}}
    <section class="py-[55px] pb-0 md:py-[75px]">
      <div class="site-container max-w-[1200px]">
        <div
          class="flex min-h-[300px] items-end rounded-[22px] bg-cover bg-center p-7 text-white md:min-h-[320px] md:p-[42px]"
          style="background-image: linear-gradient(90deg, rgba(5,10,25,0.88), rgba(5,10,25,0.38)), url('{{ $featuredBg }}');"
        >
          <div class="max-w-[650px]">
            <span class="mb-3 inline-flex rounded-full bg-[#d7a63f] px-3 py-1.5 text-xs font-black uppercase text-gray-900">Featured Guide</span>
            <h2 class="mb-2.5 text-[clamp(30px,4vw,46px)] font-black leading-tight">How to Choose the Right LITUS Ownership Plan</h2>
            <p class="mb-[18px] text-base text-gray-200">
              Help customers understand ownership plan options, required documents,
              guarantor requirements, and payment expectations before they apply.
            </p>
            <a
              href="{{ route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'choose-the-right-ownership-plan']) }}"
              class="inline-flex rounded-lg bg-[#d7a63f] px-[18px] py-3 text-sm font-black text-gray-900 no-underline transition hover:bg-[#c69532]"
            >
              Read Featured Guide
            </a>
          </div>
        </div>
      </div>
    </section>

    {{-- Category sections --}}
    @foreach($sections as $section)
      <section class="py-[55px] md:py-[75px] {{ $section['alt'] ? 'bg-white' : '' }}">
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

          <div class="grid grid-cols-1 gap-[22px] sm:grid-cols-2 lg:grid-cols-3">
            @foreach($section['cards'] as $card)
              <x-ownership-hub.partials.card
                :label="$section['label']"
                :title="$card['title']"
                :description="$card['description']"
                :image="$card['image']"
                :items="$card['items']"
                :btn-text="$card['btn']"
                :url="$card['url']"
                :accent-color="$section['accent']"
                :card-bg="$section['alt'] ? 'bg-gray-50' : 'bg-white'"
              />
            @endforeach
          </div>
        </div>
      </section>
    @endforeach

    {{-- Customer Stories / Testimonials --}}
    <section class="bg-white py-[55px] md:py-[75px]">
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
</x-layouts.app>
