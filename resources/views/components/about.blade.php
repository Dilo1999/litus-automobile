@php
    $accent = '#c19b46';
@endphp

<x-layout title="About Us - Al Zaha General Trading">
    <div class="min-h-screen" style="background-color: #F4F4F4;">
        <x-hero
            tagline="Al Zaha"
            title="General Trading LLC"
            subtitle="Learn more about our mission, vision, and the team behind Al Zaha General Trading."
        />

        {{-- Light section --}}
        <section class="relative py-10 md:py-16 overflow-hidden" style="background: #F4F4F4;">
            <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6">
                {{-- Header block --}}
                <div class="grid gap-10 lg:grid-cols-[1.2fr,1fr] lg:items-center mb-16">
                    <div class="text-left">
                        <div class="inline-flex items-center px-4 py-1.5 mb-4 rounded-full text-xs font-medium tracking-wide" style="border: 1px solid rgba(193,155,70,0.5); background: rgba(193,155,70,0.12); color: #9a7b2e;">
                            <span class="w-2 h-2 rounded-full mr-2" style="background: {{ $accent }};"></span>
                            Global Sourcing & Trading Partner
                        </div>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-stone-800 mb-4">
                            About <span style="color: {{ $accent }};">Al Zaha General Trading LLC</span>
                        </h1>
                        <p class="max-w-xl text-base sm:text-lg text-stone-600 mb-4">
                            Connecting businesses across Asia, Africa, and the Middle East with reliable global suppliers,
                            competitive pricing, and seamless end-to-end sourcing solutions.
                        </p>
                        <p class="max-w-xl text-sm sm:text-base text-stone-500">
                            Discover how our team, network, and values come together to create a seamless global sourcing experience for your business.
                        </p>
                    </div>

                    <div class="relative">
                        <div class="absolute -inset-4 opacity-40 pointer-events-none rounded-3xl" style="background: linear-gradient(135deg, {{ $accent }}20, transparent 50%);"></div>
                        <div class="relative overflow-hidden rounded-2xl bg-white border border-stone-200 shadow-sm">
                            <img
                                src="{{ asset('images/background/about-1-ezgif.com-png-to-webp-converter.webp') }}"
                                alt="Al Zaha global sourcing and trading background"
                                class="w-full h-full object-cover opacity-90"
                            />
                        </div>
                    </div>
                </div>

                {{-- Bento Box: Who We Are, At a Glance, Mission, Vision --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-20">
                    <div class="lg:col-span-2 rounded-2xl p-8 lg:p-10 bg-white border border-stone-200 shadow-sm">
                        <h2 class="text-2xl sm:text-3xl font-semibold text-stone-800 mb-6">Who We Are</h2>
                        <p class="text-stone-600 leading-relaxed mb-4">
                            At <span class="font-semibold text-stone-800">Al Zaha</span>, we specialize in global sourcing and trading, providing businesses in
                            <span class="font-medium text-stone-700">Asia, Africa, and the Middle East</span> with access to products from diverse key international markets.
                            While <span class="font-medium text-stone-700">Dubai</span> serves as a strategic hub for our operations, we go beyond, tapping into a global network of
                            suppliers to meet your sourcing needs, whether from Asia, Europe, or other parts of the world.
                        </p>
                        <p class="text-stone-600 leading-relaxed">
                            Our mission is to simplify the sourcing process by offering tailored solutions that connect your business with
                            the right products, at the right price, from the most reliable suppliers across the globe. We understand the
                            importance of timely delivery, cost-effectiveness, and quality, and we are committed to ensuring your satisfaction
                            every step of the way.
                        </p>
                    </div>

                    <div class="rounded-2xl p-6 lg:p-8 bg-white border border-stone-200 shadow-sm">
                        <h3 class="text-lg font-semibold text-stone-800 mb-2">At a Glance</h3>
                        <p class="text-sm text-stone-600 mb-4">
                            Your trusted partner for cross-border sourcing, reliable logistics, and transparent trading solutions.
                        </p>
                        <dl class="space-y-3 text-sm text-stone-600">
                            <div class="flex justify-between border-b border-stone-200 pb-2">
                                <dt>Regions Served</dt>
                                <dd class="font-semibold text-stone-800">Asia, Africa, Middle East</dd>
                            </div>
                            <div class="flex justify-between border-b border-stone-200 pb-2">
                                <dt>Sourcing Hubs</dt>
                                <dd class="font-semibold text-stone-800">Dubai, Asia, Europe</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Core Values</dt>
                                <dd class="font-semibold text-stone-800">Quality, Efficiency, Trust</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="rounded-2xl px-8 py-10 text-center bg-white border border-stone-200 shadow-sm">
                            <h2 class="text-xl sm:text-2xl font-semibold mb-4" style="color: {{ $accent }};">Mission of AL ZAHA</h2>
                            <p class="text-stone-600 leading-relaxed italic">
                                &ldquo;To provide innovative, reliable, and customer-centric sourcing and trading solutions that connect global markets
                                with quality products from Dubai. Al Zaha is committed to offering tailor-made services that meet the unique needs
                                of businesses across Asia, Africa, and the Middle East, with a focus on efficiency, transparency, and trust.&rdquo;
                            </p>
                        </div>

                        <div class="rounded-2xl px-8 py-10 text-center bg-white border border-stone-200 shadow-sm">
                            <h2 class="text-xl sm:text-2xl font-semibold mb-4" style="color: {{ $accent }};">Vision of AL ZAHA</h2>
                            <p class="text-stone-600 leading-relaxed italic">
                                &ldquo;To become the leading sourcing and trading partner across Asia, Africa, and the Middle East by 2030, recognized
                                for excellence in supply chain management, sustainable growth, and a commitment to fostering long-lasting
                                partnerships with our clients and suppliers.&rdquo;
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Why Choose Us --}}
                <div class="mb-20">
                    <div class="text-center mb-10">
                        <p class="text-xl sm:text-2xl md:text-3xl font-semibold tracking-[0.3em] uppercase mb-2" style="color: {{ $accent }};">
                            Why Choose Al Zaha
                        </p>
                        <h2 class="text-xl sm:text-2xl font-semibold text-stone-800 mb-3">
                            A Partner You Can Rely On
                        </h2>
                        <p class="text-sm sm:text-base text-stone-600 max-w-2xl mx-auto">
                            Seven core strengths that make us a trusted sourcing and trading partner for businesses across Asia, Africa, and the Middle East.
                        </p>
                    </div>

                    <div class="grid gap-6 md:gap-7 md:grid-cols-2 lg:grid-cols-3">
                        {{-- 1. Global Sourcing Expertise --}}
                        <div class="about-feature-card group relative rounded-2xl p-6 pt-7 hover:-translate-y-1 transition-all bg-white border border-stone-200 shadow-sm">
                            <div class="mb-3 flex items-center gap-2">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full" style="background: rgba(193,155,70,0.2);">
                                    <svg class="w-4 h-4" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M12 2a9.99 9.99 0 0 0-7.07 2.93A10 10 0 1 0 19.07 4.93 9.96 9.96 0 0 0 12 2Z" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2 12h20" stroke-width="1.4" stroke-linecap="round"/>
                                        <path d="M12 2a15 15 0 0 1 4 10 15 15 0 0 1-4 10 15 15 0 0 1-4-10 15 15 0 0 1 4-10Z" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <h3 class="text-base font-semibold text-stone-800">Global Sourcing Expertise</h3>
                            </div>
                            <p class="text-sm text-stone-600 leading-relaxed">
                                We source products from <span class="font-semibold text-stone-700">international markets</span>, including
                                <span class="font-semibold text-stone-700">Dubai, Asia, Europe</span>, and beyond, offering you access to a vast range of options for your business needs.
                            </p>
                        </div>

                        {{-- 2–6: feature cards --}}
                        <div class="about-feature-card group rounded-2xl p-5 lg:p-6 hover:-translate-y-0.5 transition-all duration-300 bg-white border border-stone-200 shadow-sm">
                            <div class="inline-flex h-8 w-8 items-center justify-center rounded-xl mb-3" style="background: rgba(193,155,70,0.2);">
                                <svg class="w-4 h-4" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                    <path d="M5 4h14v4H5zM5 10h9v4H5zM5 16h6v4H5z" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="text-sm font-semibold text-stone-800 mb-2">Tailored Solutions</h3>
                            <p class="text-xs text-stone-600 leading-relaxed">
                                <span class="font-medium text-stone-700">Customized sourcing</span> across all product categories for your unique needs.
                            </p>
                        </div>

                        <div class="about-feature-card group rounded-2xl p-5 lg:p-6 hover:-translate-y-0.5 transition-all duration-300 bg-white border border-stone-200 shadow-sm">
                            <div class="inline-flex h-8 w-8 items-center justify-center rounded-xl mb-3" style="background: rgba(193,155,70,0.2);">
                                <svg class="w-4 h-4" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                    <path d="M6.5 11.5 10 15l7.5-7.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12" cy="12" r="9" stroke-width="1.4"/>
                                </svg>
                            </div>
                            <h3 class="text-sm font-semibold text-stone-800 mb-2">Strong Supplier Relationships</h3>
                            <p class="text-xs text-stone-600 leading-relaxed">
                                Well-established connections with <span class="font-medium text-stone-700">global suppliers</span> for competitive prices.
                            </p>
                        </div>

                        <div class="about-feature-card group rounded-2xl p-5 lg:p-6 hover:-translate-y-0.5 transition-all duration-300 bg-white border border-stone-200 shadow-sm">
                            <div class="inline-flex h-8 w-8 items-center justify-center rounded-xl mb-3" style="background: rgba(193,155,70,0.2);">
                                <svg class="w-4 h-4" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                    <path d="M4 17h16M5 7h14l-1 8H6z" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="9" cy="18" r="1.3" stroke-width="1.2"/>
                                    <circle cx="17" cy="18" r="1.3" stroke-width="1.2"/>
                                </svg>
                            </div>
                            <h3 class="text-sm font-semibold text-stone-800 mb-2">End-to-End Service</h3>
                            <p class="text-xs text-stone-600 leading-relaxed">
                                From sourcing to logistics and delivery—products arrive <span class="font-medium text-stone-700">on time</span> and <span class="font-medium text-stone-700">within budget</span>.
                            </p>
                        </div>

                        <div class="about-feature-card group rounded-2xl p-5 lg:p-6 hover:-translate-y-0.5 transition-all duration-300 bg-white border border-stone-200 shadow-sm">
                            <div class="inline-flex h-8 w-8 items-center justify-center rounded-xl mb-3" style="background: rgba(193,155,70,0.2);">
                                <svg class="w-4 h-4" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                    <path d="M7 10c0-1.7 1.3-3 3-3h4a2 2 0 0 1 0 4h-4a2 2 0 0 0 0 4h3" stroke-linecap="round"/>
                                    <path d="M12 5v2m0 10v2" stroke-linecap="round"/>
                                    <circle cx="12" cy="12" r="9" stroke-width="1.4"/>
                                </svg>
                            </div>
                            <h3 class="text-sm font-semibold text-stone-800 mb-2">Competitive Pricing</h3>
                            <p class="text-xs text-stone-600 leading-relaxed">
                                Highly <span class="font-medium text-stone-700">competitive prices</span> across product categories to optimize your costs.
                            </p>
                        </div>

                        <div class="about-feature-card group rounded-2xl p-5 lg:p-6 hover:-translate-y-0.5 transition-all duration-300 bg-white border border-stone-200 shadow-sm">
                            <div class="inline-flex h-8 w-8 items-center justify-center rounded-xl mb-3" style="background: rgba(193,155,70,0.2);">
                                <svg class="w-4 h-4" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                    <path d="M3 10h13l3 4h2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 7h11v9H3z" stroke-linejoin="round"/>
                                    <circle cx="7" cy="18" r="1.3" stroke-width="1.2"/>
                                    <circle cx="16" cy="18" r="1.3" stroke-width="1.2"/>
                                </svg>
                            </div>
                            <h3 class="text-sm font-semibold text-stone-800 mb-2">Efficient Logistics</h3>
                            <p class="text-xs text-stone-600 leading-relaxed">
                                Strategic hubs like <span class="font-medium text-stone-700">Dubai</span> for fast delivery across Asia, Africa, and the Middle East.
                            </p>
                        </div>

                        {{-- 7. Trust and Transparency --}}
                        <div class="about-feature-card md:col-span-2 lg:col-span-3 group relative rounded-2xl p-6 pt-7 hover:-translate-y-1 transition-all bg-white border border-stone-200 shadow-sm">
                            <!-- <div class="absolute -top-4 left-6 inline-flex h-8 w-8 items-center justify-center rounded-full text-black text-xs font-semibold" style="background: {{ $accent }};">
                                07
                            </div> -->
                            <div class="mb-3 flex items-center gap-2">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full" style="background: rgba(193,155,70,0.2);">
                                    <svg class="w-4 h-4" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M5 20h14V7l-7-4-7 4z" stroke-width="1.4" stroke-linejoin="round"/>
                                        <path d="M9 11.5 11.5 14 16 9.5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <h3 class="text-base font-semibold text-stone-800">Trust and Transparency</h3>
                            </div>
                            <p class="text-sm text-stone-600 leading-relaxed">
                                We believe in building long-lasting partnerships through clear communication, transparency, and dedicated
                                customer service, ensuring that every sourcing experience with us is seamless and efficient.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Team Section --}}
                <div class="pt-12 border-t border-stone-200">
                    <div class="grid gap-10 lg:grid-cols-[3fr,2fr] lg:items-center">
                        <div>
                            <h2 class="text-2xl sm:text-3xl font-semibold text-stone-800 mb-4">Our Team</h2>
                            <p class="text-stone-600 leading-relaxed mb-4">
                                At <span class="font-semibold text-stone-800">Al Zaha General Trading LLC</span>, our success is driven by a dedicated and
                                experienced team of professionals who bring industry expertise, market insights, and a passion for delivering
                                top-notch customer service.
                            </p>
                            <p class="text-stone-600 leading-relaxed mb-4">
                                From sourcing specialists to supply chain managers, our team works tirelessly to ensure that every client
                                receives personalized solutions tailored to their business needs. We believe that our people are our greatest
                                asset, and their commitment to efficiency, transparency, and reliability is what sets us apart.
                            </p>
                            <p class="text-stone-600 leading-relaxed">
                                Each team member plays a vital role in making sure that the sourcing process is smooth and that our clients
                                always receive the best possible service, from initial inquiry to final delivery.
                            </p>
                        </div>

                        <div class="rounded-2xl p-6 bg-white border border-stone-200 shadow-sm">
                            <h3 class="text-lg font-semibold text-stone-800 mb-3">What You Can Expect</h3>
                            <ul class="space-y-2 text-sm text-stone-600">
                                <li class="flex items-start">
                                    <span class="mt-1.5 mr-2 h-1.5 w-1.5 rounded-full flex-shrink-0" style="background: {{ $accent }};"></span>
                                    Personalized support from a responsive and knowledgeable team.
                                </li>
                                <li class="flex items-start">
                                    <span class="mt-1.5 mr-2 h-1.5 w-1.5 rounded-full flex-shrink-0" style="background: {{ $accent }};"></span>
                                    Clear communication at every stage of the sourcing and delivery process.
                                </li>
                                <li class="flex items-start">
                                    <span class="mt-1.5 mr-2 h-1.5 w-1.5 rounded-full flex-shrink-0" style="background: {{ $accent }};"></span>
                                    Reliable execution built on experience, integrity, and a client-first mindset.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .about-feature-card { transition: border-color 0.2s ease; }
        .about-feature-card:hover { border-color: #c19b46; }
    </style>
</x-layout>
