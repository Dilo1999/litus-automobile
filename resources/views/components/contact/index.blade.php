@php
    $phone = '+960 779 7442';
    $phoneTel = 'tel:+9607797442';
    $email = 'sales@litusgroup.mv';
    $address = 'Ma. Elyzium, Buruzu magu, Malé, Maldives';
    $whatsapp = 'https://wa.me/9607797442';
    $heroImage = 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=900&q=80';
    $mapEmbed = 'https://maps.google.com/maps?q=LITUS+Group+Head+Office+Male+Maldives&t=m&z=15&output=embed&iwloc=near';
@endphp

<x-layouts.app title="Contact Us - LITUS Automobiles">
    <div class="min-h-screen bg-white text-gray-900">
        {{-- Hero --}}
        <section class="contact-hero page-hero-standard relative bg-[#00105B] text-white overflow-hidden">
            <div class="site-container h-full flex items-center">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center w-full py-4">
                    <div class="order-2 lg:order-1 flex justify-center lg:justify-start">
                        <div class="relative w-full max-w-[420px] aspect-[4/3] rounded-lg overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.35)]">
                            <img
                                src="{{ $heroImage }}"
                                alt="LITUS customer service team"
                                class="w-full h-full object-cover object-center"
                                loading="eager"
                            >
                        </div>
                    </div>
                    <div class="order-1 lg:order-2 text-center lg:text-left">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black mb-4 md:mb-5 leading-tight">Customer Service</h1>
                        <p class="text-white/90 text-sm sm:text-base leading-relaxed max-w-lg mx-auto lg:mx-0 mb-6 md:mb-8">
                            If you have questions about our motorcycles, services, or any general inquiries,
                            our friendly customer service team is ready to help.
                        </p>
                        <a
                            href="#contact-card"
                            class="inline-flex items-center justify-center px-8 py-3 rounded-md bg-[#4da3ff] text-white text-sm font-bold tracking-wide no-underline hover:bg-[#3b8ee6] transition-colors"
                        >
                            Contact Now
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Overlapping contact card --}}
        <section class="relative bg-white pb-16 md:pb-24 lg:pb-28">
            <div class="site-container relative z-10 -mt-16 sm:-mt-20 md:-mt-28 lg:-mt-32">
                <div
                    id="contact-card"
                    class="scroll-mt-28 bg-white rounded-2xl shadow-[0_18px_50px_rgba(15,23,42,0.14)] overflow-hidden border border-gray-100"
                >
                    <div class="grid lg:grid-cols-2">
                        {{-- Contact details --}}
                        <div class="px-6 sm:px-8 md:px-10 py-8 md:py-10 lg:py-12">
                            <ul class="space-y-6 md:space-y-7 mb-8">
                                <li class="flex items-start gap-4">
                                    <span class="flex-shrink-0 w-11 h-11 rounded-full bg-[#00105B]/10 flex items-center justify-center text-[#00105B]">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M5 4h4l2 5-3 1.5A11 11 0 0 0 13.5 16L15 13l5 2v4a2 2 0 0 1-2 2A14 14 0 0 1 3 6a2 2 0 0 1 2-2Z"/>
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-1">Phone</p>
                                        <a href="{{ $phoneTel }}" class="text-[#00105B] font-bold text-base sm:text-lg no-underline hover:text-[#4da3ff] transition-colors">{{ $phone }}</a>
                                    </div>
                                </li>
                                <li class="flex items-start gap-4">
                                    <span class="flex-shrink-0 w-11 h-11 rounded-full bg-[#00105B]/10 flex items-center justify-center text-[#00105B]">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M4 4h16v16H4z"/>
                                            <path d="m4 7 8 5 8-5"/>
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-1">Email</p>
                                        <a href="mailto:{{ $email }}" class="text-[#00105B] font-bold text-base sm:text-lg no-underline hover:text-[#4da3ff] transition-colors break-all">{{ $email }}</a>
                                    </div>
                                </li>
                                <li class="flex items-start gap-4">
                                    <span class="flex-shrink-0 w-11 h-11 rounded-full bg-[#00105B]/10 flex items-center justify-center text-[#00105B]">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M12 21s-6-5.1-6-10a6 6 0 0 1 12 0c0 4.9-6 10-6 10Z"/>
                                            <circle cx="12" cy="11" r="2.5"/>
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-1">Address</p>
                                        <p class="text-[#00105B] font-bold text-base sm:text-lg leading-relaxed">{{ $address }}</p>
                                    </div>
                                </li>
                            </ul>

                            <div class="flex items-center gap-3">
                                <a href="https://www.facebook.com/litusautomobiles" target="_blank" rel="noopener noreferrer" class="contact-social contact-social--facebook" aria-label="Facebook">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer" class="contact-social contact-social--whatsapp" aria-label="WhatsApp">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.882 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                </a>
                                <a href="mailto:{{ $email }}" class="contact-social contact-social--email" aria-label="Email">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path d="M4 4h16v16H4z"/>
                                        <path d="m4 7 8 5 8-5"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        {{-- Map --}}
                        <div class="min-h-[280px] lg:min-h-[380px] bg-gray-100">
                            <iframe
                                loading="lazy"
                                src="{{ $mapEmbed }}"
                                title="LITUS Group Head Office - Malé, Maldives"
                                aria-label="LITUS Group Head Office map"
                                width="100%"
                                height="100%"
                                class="w-full h-full min-h-[280px] lg:min-h-[380px]"
                                style="border:0;"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
