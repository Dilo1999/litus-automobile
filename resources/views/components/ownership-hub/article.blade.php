@props([
    'article',
    'category',
    'slug',
    'testimonials' => [],
])

@php
    $heroBg = $article['image'] ?? 'https://images.unsplash.com/photo-1558981359-219d6364c9c8?auto=format&fit=crop&w=1600&q=80';
    $whatsapp = 'https://wa.me/9607797442';
    $isTestimonials = count($testimonials) > 0;
    $accent = '#7c3aed';
@endphp

<x-layouts.app :title="$article['title'] . ' - Ownership Hub'">
  <div class="min-h-screen bg-[#f6f7fb] text-gray-900 leading-normal">
    <section
      class="page-hero-standard relative bg-cover bg-center text-white"
      style="background-image: linear-gradient(90deg, rgba(5,10,25,0.92), rgba(5,10,25,0.55)), url('{{ $heroBg }}');"
    >
      <div class="site-container max-w-[900px]">
        <a href="{{ route('ownership-hub') }}" class="mb-4 inline-flex text-sm font-semibold text-[#d7a63f] no-underline hover:underline">
          ← Back to Ownership Hub
        </a>
        <p class="mb-2 text-xs font-extrabold uppercase tracking-wide text-[#d7a63f]">{{ $article['category_label'] }}</p>
        <h1 class="text-[clamp(2rem,5vw,3.25rem)] font-black leading-tight">{{ $article['title'] }}</h1>
        @if($isTestimonials)
          <p class="mt-4 max-w-[640px] text-base text-gray-200">{{ $article['excerpt'] }}</p>
        @endif
      </div>
    </section>

    <section class="py-12 md:py-16">
      <div class="site-container max-w-[1200px]">
        @if($isTestimonials)
          <div class="grid grid-cols-1 gap-[22px] md:grid-cols-2 lg:grid-cols-3">
            @foreach($testimonials as $testimonial)
              <x-ownership-hub.partials.testimonial-card
                :quote="$testimonial['quote']"
                :name="$testimonial['name']"
                :role="$testimonial['role']"
                :plan="$testimonial['plan']"
                :image="$testimonial['image']"
                :rating="$testimonial['rating'] ?? 5"
                :accent-color="$accent"
              />
            @endforeach
          </div>
        @else
          <article class="mx-auto max-w-[820px] rounded-[18px] bg-white p-6 shadow-[0_10px_26px_rgba(15,23,42,0.08)] md:p-10">
            <p class="mb-6 text-lg leading-relaxed text-gray-600">{{ $article['excerpt'] }}</p>
            <p class="mb-8 text-base leading-relaxed text-gray-500">
              Full article content for this guide will be published here soon. For immediate help,
              contact the LITUS team or explore our ownership plans and service resources.
            </p>
          </article>
        @endif

        <div class="mt-10 flex flex-wrap justify-center gap-3">
          <a
            href="{{ $whatsapp }}"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center justify-center rounded-lg bg-[#d7a63f] px-5 py-3 text-sm font-extrabold text-gray-900 no-underline transition hover:bg-[#c69532]"
          >
            Chat on WhatsApp
          </a>
          <a
            href="{{ route('ownership-plans') }}"
            class="inline-flex items-center justify-center rounded-lg border-2 border-navy px-5 py-3 text-sm font-extrabold text-navy no-underline transition hover:bg-navy hover:text-white"
          >
            View Ownership Plans
          </a>
        </div>
      </div>
    </section>
  </div>
</x-layouts.app>
