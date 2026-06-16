@php
    $accent = '#c19b46';
    $accentHover = '#a8843a';
@endphp

<x-layouts.app title="Contact Us - Al Zaha General Trading">
    <div class="min-h-screen" style="background-color: #F4F4F4;">
        <x-shared.hero
            tagline="Al Zaha"
            title="Contact Us"
            subtitle="Reach out to our team for inquiries, partnerships, or support. We're here to help your business grow."
            background-image="images/background/contactBuild.png"
        />

        {{-- Contact content – light section --}}
        <section class="relative py-10 md:py-16 overflow-hidden" style="background: #F4F4F4;">
            <div class="relative z-10 site-container">
                <div class="mb-8 md:mb-10">
                    <h2 class="text-xl md:text-2xl font-bold tracking-tight text-stone-800">Get in touch</h2>
                    <p class="mt-1 text-sm text-stone-600">Send a message or use the details below</p>
                </div>

                <div class="grid lg:grid-cols-12 gap-6 md:gap-8">
                    {{-- Form card --}}
                    <div class="lg:col-span-7">
                        <div id="contact-form" class="rounded-2xl overflow-hidden scroll-mt-24 bg-white border border-stone-200 shadow-sm">
                            <div class="px-6 sm:px-8 lg:px-10 py-8 md:py-10">
                                <h3 class="text-lg font-semibold text-stone-800 mb-1">Send us a message</h3>
                                <p class="text-sm text-stone-600 mb-6">Fill out the form below and we'll get back to you shortly.</p>

                                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                                    @csrf

                                    <div class="grid sm:grid-cols-2 gap-5">
                                        <div>
                                            <label for="name" class="block text-xs font-medium text-stone-600 mb-1.5">Name</label>
                                            <input
                                                type="text"
                                                id="name"
                                                name="name"
                                                required
                                                class="contact-input w-full px-4 py-3 rounded-xl text-sm text-stone-800 placeholder-stone-400 transition-all outline-none bg-white border border-stone-200"
                                                placeholder="Your name"
                                            >
                                        </div>
                                        <div>
                                            <label for="email" class="block text-xs font-medium text-stone-600 mb-1.5">Email</label>
                                            <input
                                                type="email"
                                                id="email"
                                                name="email"
                                                required
                                                class="contact-input w-full px-4 py-3 rounded-xl text-sm text-stone-800 placeholder-stone-400 transition-all outline-none bg-white border border-stone-200"
                                                placeholder="you@company.com"
                                            >
                                        </div>
                                    </div>

                                    <div>
                                        <label for="phone" class="block text-xs font-medium text-stone-600 mb-1.5">Phone</label>
                                        <input
                                            type="text"
                                            id="phone"
                                            name="phone"
                                            class="contact-input w-full px-4 py-3 rounded-xl text-sm text-stone-800 placeholder-stone-400 transition-all outline-none bg-white border border-stone-200"
                                            placeholder="+971 50 123 4567"
                                        >
                                    </div>

                                    <div>
                                        <label for="message" class="block text-xs font-medium text-stone-600 mb-1.5">Message</label>
                                        <textarea
                                            id="message"
                                            name="message"
                                            rows="4"
                                            required
                                            class="contact-input w-full px-4 py-3 rounded-xl text-sm text-stone-800 placeholder-stone-400 transition-all outline-none resize-none bg-white border border-stone-200"
                                            placeholder="How can we help you?"
                                        ></textarea>
                                    </div>

                                    <button
                                        type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-sm font-semibold text-black transition-all hover:opacity-95 active:scale-[0.99]"
                                        style="background-color: {{ $accent }}; box-shadow: 0 4px 14px rgba(193, 155, 70, 0.35);"
                                    >
                                        Send message
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M5 12h14M12 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Contact info + map --}}
                    <div class="lg:col-span-5 space-y-6">
                        {{-- Contact cards --}}
                        <div class="space-y-4">
                            <div class="rounded-2xl p-6 flex items-start gap-4 bg-white border border-stone-200 shadow-sm">
                                <span class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center" style="background: rgba(193, 155, 70, 0.2);">
                                    <svg class="w-5 h-5" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 21s-6-5.1-6-10a6 6 0 0 1 12 0c0 4.9-6 10-6 10Z"/>
                                        <circle cx="12" cy="11" r="2.5"/>
                                    </svg>
                                </span>
                                <div>
                                    <h3 class="text-sm font-semibold text-stone-800 mb-1">Office address</h3>
                                    <p class="text-sm text-stone-600 leading-relaxed">
                                        18B street, Umm Ramool-215,<br>
                                        Al Rashidiya, Dubai
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-2xl p-6 flex items-start gap-4 bg-white border border-stone-200 shadow-sm">
                                <span class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center" style="background: rgba(193, 155, 70, 0.2);">
                                    <svg class="w-5 h-5" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M5 4h4l2 5-3 1.5A11 11 0 0 0 13.5 16L15 13l5 2v4a2 2 0 0 1-2 2A14 14 0 0 1 3 6a2 2 0 0 1 2-2Z"/>
                                    </svg>
                                </span>
                                <div>
                                    <h3 class="text-sm font-semibold text-stone-800 mb-1">Phone</h3>
                                    <a href="tel:+971043967075" class="text-sm text-stone-600 transition-colors contact-link-hover">
                                        +971 04 396 7075
                                    </a>
                                </div>
                            </div>

                            <div class="rounded-2xl p-6 flex items-start gap-4 bg-white border border-stone-200 shadow-sm">
                                <span class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center" style="background: rgba(193, 155, 70, 0.2);">
                                    <svg class="w-5 h-5" style="color: {{ $accent }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M4 4h16v16H4z"/>
                                        <path d="m4 7 8 5 8-5"/>
                                    </svg>
                                </span>
                                <div>
                                    <h3 class="text-sm font-semibold text-stone-800 mb-1">Email</h3>
                                    <a href="mailto:sales@alzahageneraltrading.com" class="text-sm text-stone-600 transition-colors contact-link-hover break-all">
                                        sales@alzahageneraltrading.com
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Map --}}
                        <div class="rounded-2xl overflow-hidden bg-white border border-stone-200 shadow-sm">
                            <iframe
                                loading="lazy"
                                src="https://maps.google.com/maps?q=18B%20street%2C%20umm%20ramool-215%2C%20Al%20rashidia%2C%20Dubai&amp;t=m&amp;z=14&amp;output=embed&amp;iwloc=near"
                                title="Al Zaha General Trading - Dubai Office"
                                aria-label="Al Zaha General Trading - Dubai Office"
                                width="100%"
                                height="220"
                                class="w-full"
                                style="border:0; filter: grayscale(0.3) contrast(1.05);"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .contact-input:focus {
            border-color: {{ $accent }} !important;
            box-shadow: 0 0 0 3px rgba(193, 155, 70, 0.2);
        }
        .contact-link-hover:hover { color: #c19b46; }
    </style>
</x-layouts.app>
