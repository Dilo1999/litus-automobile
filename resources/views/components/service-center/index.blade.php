@php
    $heroBg = 'https://images.unsplash.com/photo-1625047509248-ec889cb3753?auto=format&fit=crop&w=1920&q=80';
    $formImage = 'https://images.unsplash.com/photo-1556745757-8d76bdb6834a?auto=format&fit=crop&w=900&q=80';

    $services = [
        ['name' => 'Periodic Maintenance', 'icon' => 'periodic'],
        ['name' => 'Accident Repair', 'icon' => 'accident'],
        ['name' => 'Engine Overhaul', 'icon' => 'overhaul'],
        ['name' => 'Irregular Maintenance', 'icon' => 'irregular'],
    ];

    $serviceDetails = [
        [
            'title' => 'Periodic Maintenance',
            'text' => 'Maintenance that is done after driving a specific number of kilometers set by the manufacturer of the automobile. These will help keep your automobile in top shape and ensure a longer life for the vehicle. Honda recommends first maintenance after 1000km, after which they recommend maintenance after every 6000km. Yamaha recommends a first service after 1000km and regular maintenance every 9000km.',
        ],
        [
            'title' => 'Irregular Maintenance',
            'text' => 'Maintenance made outside of the recommended periodic maintenance. These will address issues noticed while driving and is most commonly required if periodic maintenance is neglected.',
        ],
        [
            'title' => 'Accident Repairs',
            'text' => 'This encompasses any damage received due to collisions or other road accidents. Repairs will be made on the outer and inner workings of the motorcycle after sufficient observations have been made. The owner of the vehicle is required to bring the vehicle to a service center and the diagnosis will proceed from there.',
        ],
        [
            'title' => 'Engine Overhaul',
            'text' => 'An engine overhaul is usually required after 6 to 7 years of driving. During the overhaul procedure, the engine will be fully disassembled and manually inspected for issues. Any and all parts of the motorcycle can be changed upon request.',
        ],
        [
            'title' => 'Pick and Drop Service',
            'text' => 'Litus Service Center mechanics will go to the location of the vehicle and bring it to the service center for inspection and repairs.',
        ],
    ];
@endphp

<x-layouts.app title="Service Center - LITUS Automobiles">
    <div class="min-h-screen bg-white text-gray-900">
        {{-- Hero --}}
        <section
            class="service-hero page-hero-standard relative bg-cover bg-center overflow-hidden"
            style="background-image: linear-gradient(rgba(0,16,91,0.35), rgba(0,16,91,0.35)), url('{{ $heroBg }}');"
            aria-label="Service Center"
        ></section>

        {{-- What we offer --}}
        <section class="py-12 md:py-16 lg:py-20">
            <div class="site-container">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start mb-10 md:mb-14">
                    <h2 class="text-2xl sm:text-3xl md:text-[2rem] font-black text-[#00105B] leading-tight">
                        What we offer at<br>Our Service Centers
                    </h2>
                    <div class="lg:pt-1">
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed mb-6">
                            Precision tune-ups, inspections, and diagnostics for optimal performance and safety.
                        </p>
                        <a href="#service-booking" class="inline-flex items-center justify-center px-6 py-3 rounded-md bg-[#00105B] text-white text-sm font-bold tracking-wide no-underline hover:bg-[#001a7a] transition-colors">
                            Contact Now
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                    @foreach($services as $service)
                        <div class="flex flex-col items-center text-center">
                            <div class="w-[72px] h-[72px] sm:w-20 sm:h-20 rounded-full bg-[#00105B] flex items-center justify-center text-white mb-3">
                                @include('components.service-center.partials.service-icon', ['icon' => $service['icon']])
                            </div>
                            <p class="text-[#00105B] font-bold text-xs sm:text-sm leading-snug max-w-[140px]">{{ $service['name'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Booking --}}
        <section id="service-booking" class="py-12 md:py-16 lg:py-20 bg-[#f6f7fb] scroll-mt-24">
            <div class="site-container">
                <div class="text-center mb-8 md:mb-10">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#00105B] mb-2">Book an appointment now.</h2>
                    <p class="text-gray-600 text-sm sm:text-base">We will contact you right-away !</p>
                </div>

                <div class="relative bg-white rounded-2xl overflow-hidden shadow-[0_12px_40px_rgba(15,23,42,0.1)]">
                    <div class="grid lg:grid-cols-[minmax(0,340px)_1fr]">
                        <div class="relative hidden lg:block min-h-[580px]">
                            <img
                                src="{{ $formImage }}"
                                alt="Customer support representative"
                                class="absolute inset-0 w-full h-full object-cover object-top"
                                loading="lazy"
                            >
                        </div>

                        <div class="relative bg-[#00105B] px-6 sm:px-8 md:px-10 py-8 md:py-10">
                            <div class="hidden lg:flex absolute -left-6 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white items-center justify-center shadow-lg z-10">
                                <svg class="w-6 h-6 text-[#00105B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M3 11v2a2 2 0 0 0 2 2h1l3 5h2l1-5h4l1 5h2l3-5h1a2 2 0 0 0 2-2v-2"/>
                                    <path d="M5 11a7 7 0 0 1 14 0"/>
                                </svg>
                            </div>

                            <form action="{{ route('service-center.store') }}" method="POST" class="space-y-4">
                                @csrf

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="sc_name" class="block text-white text-sm mb-1.5">Your name</label>
                                        <input type="text" id="sc_name" name="name" value="{{ old('name') }}" required class="service-input w-full">
                                    </div>
                                    <div>
                                        <label for="sc_phone" class="block text-white text-sm mb-1.5">Your Mobile No</label>
                                        <input type="text" id="sc_phone" name="phone" value="{{ old('phone') }}" required class="service-input w-full">
                                    </div>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="sc_id" class="block text-white text-sm mb-1.5">Your ID No</label>
                                        <input type="text" id="sc_id" name="id_number" value="{{ old('id_number') }}" required class="service-input w-full">
                                    </div>
                                    <div>
                                        <label for="sc_reg" class="block text-white text-sm mb-1.5">Motorcycle Reg No</label>
                                        <input type="text" id="sc_reg" name="reg_number" value="{{ old('reg_number') }}" required class="service-input w-full">
                                    </div>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="sc_model" class="block text-white text-sm mb-1.5">Motorcycle Model name</label>
                                        <input type="text" id="sc_model" name="model" value="{{ old('model') }}" required class="service-input w-full">
                                    </div>
                                    <div>
                                        <label for="sc_date" class="block text-white text-sm mb-1.5">Booking Date</label>
                                        <input type="date" id="sc_date" name="booking_date" value="{{ old('booking_date') }}" required min="{{ date('Y-m-d') }}" class="service-input w-full service-input-date">
                                    </div>
                                </div>

                                @if($errors->any())
                                    <div class="rounded-lg border border-red-300 bg-red-50/10 px-4 py-3 text-sm text-red-200">
                                        Please check the form and try again.
                                    </div>
                                @endif

                                <button type="submit" class="service-submit-btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Service details --}}
        <section class="py-12 md:py-16 lg:py-20">
            <div class="site-container">
                <div class="max-w-3xl mx-auto space-y-10 md:space-y-14">
                    @foreach($serviceDetails as $detail)
                        <article class="text-center">
                            <h3 class="text-xl sm:text-2xl font-black text-[#00105B] mb-3 md:mb-4">{{ $detail['title'] }}</h3>
                            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">{{ $detail['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <style>
        .service-input {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.85);
            border-radius: 6px;
            color: #ffffff;
            font-size: 14px;
            padding: 11px 14px;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .service-input:focus {
            border-color: #ffffff;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.15);
        }
        .service-input-date { color-scheme: dark; }
        .service-submit-btn {
            display: block;
            width: 100%;
            max-width: 220px;
            margin-top: 0.5rem;
            height: 44px;
            padding: 0 16px;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-align: center;
            color: #00105B;
            background: #ffffff;
            border: 2px solid #ffffff;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }
        .service-submit-btn:hover {
            background: transparent;
            color: #ffffff;
            transform: translateY(-1px);
        }
        @media (max-width: 768px) {
            .service-hero {
                background-image: linear-gradient(rgba(0,16,91,0.45), rgba(0,16,91,0.45)), url('{{ $heroBg }}') !important;
                background-position: center 40% !important;
            }
        }
    </style>
</x-layouts.app>
