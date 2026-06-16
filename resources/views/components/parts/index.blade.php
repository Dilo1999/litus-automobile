@php
    $heroBg = 'https://images.unsplash.com/photo-1609630875171-b13213772735?auto=format&fit=crop&w=1920&q=80';
    $formImage = 'https://images.unsplash.com/photo-1556745757-8d76bdb6834a?auto=format&fit=crop&w=900&q=80';

    $brands = ['Honda', 'Yamaha', 'Suzuki', 'Piaggio'];
    $years = range((int) date('Y'), 2000);
    $formCategories = [
        'Body Covers',
        'Engine Components',
        'Braking Systems',
        'Electrical and Ignition',
        'Chassis and Suspension',
    ];

    $categories = [
        ['name' => 'Body Components', 'icon' => 'body'],
        ['name' => 'Engine Components', 'icon' => 'engine'],
        ['name' => 'Braking Systems', 'icon' => 'braking'],
        ['name' => 'Electrical & Ignition', 'icon' => 'electrical'],
        ['name' => 'Chassis & Suspension', 'icon' => 'chassis'],
        ['name' => 'Wheels & Tires', 'icon' => 'wheels'],
    ];
@endphp

<x-layouts.app title="Motorcycle Spare Parts - LITUS Automobiles">
    <div class="min-h-screen bg-white text-gray-900">
        {{-- Hero --}}
        <section
            class="parts-hero page-hero-standard relative flex items-center justify-center bg-cover bg-center overflow-hidden"
            style="--hero-bg-image: url('{{ $heroBg }}'); background-image: linear-gradient(rgba(0,16,91,0.72), rgba(0,16,91,0.72)), var(--hero-bg-image);"
        >
            <div class="relative z-10 flex flex-col items-center text-center px-4">
                <div class="flex items-center gap-4 sm:gap-5">
                    <svg class="w-14 h-14 sm:w-16 sm:h-16 md:w-[72px] md:h-[72px] text-white shrink-0" viewBox="0 0 64 64" fill="none" aria-hidden="true">
                        <circle cx="32" cy="32" r="28" stroke="currentColor" stroke-width="3"/>
                        <circle cx="32" cy="32" r="10" stroke="currentColor" stroke-width="3"/>
                        <path d="M32 4v12M32 48v12M4 32h12M48 32h12M11.5 11.5l8.5 8.5M44 44l8.5 8.5M11.5 52.5l8.5-8.5M44 20l8.5-8.5" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                    <div class="text-left">
                        <p class="text-white font-black uppercase tracking-[0.35em] text-xl sm:text-2xl md:text-3xl leading-none mb-1">LITUS</p>
                        <p class="text-white font-black uppercase tracking-[0.45em] text-2xl sm:text-3xl md:text-4xl leading-none">PARTS</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Intro --}}
        <section class="py-12 md:py-16 lg:py-20">
            <div class="site-container">
                <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#00105B] mb-5 md:mb-6">Motorcycle Genuine Spare Parts</h2>
                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                    Explore our Spare Parts page for a curated selection of genuine components, ensuring peak performance,
                    reliability, and longevity. Elevate your motorcycle maintenance with quality parts tailored for excellence.
                </p>
                </div>
            </div>
        </section>

        {{-- Categories --}}
        <section class="pb-12 md:pb-16 lg:pb-20">
            <div class="site-container">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
                    @foreach($categories as $category)
                        <article class="bg-[#00105B] rounded-xl px-6 py-10 md:py-12 flex flex-col items-center justify-center text-center min-h-[180px] md:min-h-[200px] transition-transform duration-300 hover:-translate-y-1">
                            <div class="mb-4 text-white">
                                @include('components.parts.partials.category-icon', ['icon' => $category['icon']])
                            </div>
                            <h3 class="text-white font-bold text-base sm:text-lg tracking-wide">{{ $category['name'] }}</h3>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Inquiry Form --}}
        <section class="py-12 md:py-16 lg:py-20 bg-[#f6f7fb]">
            <div class="site-container">
                <div class="text-center mb-8 md:mb-10">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-[#00105B] mb-3">Motorcycle Parts Inquiry Form</h2>
                    <p class="text-gray-600 text-sm sm:text-base max-w-2xl mx-auto">
                        Fill out the form below to provide us with information about your specific requirements.
                    </p>
                </div>

                <div class="relative bg-white rounded-2xl overflow-hidden shadow-[0_12px_40px_rgba(15,23,42,0.1)]">
                    <div class="grid lg:grid-cols-[minmax(0,340px)_1fr]">
                        <div class="relative hidden lg:block min-h-[640px]">
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

                            <form action="{{ route('parts.store') }}" method="POST" class="space-y-5">
                                @csrf

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="brand" class="sr-only">Motorcycle Brand</label>
                                        <select id="brand" name="brand" required class="parts-input w-full">
                                            <option value="" disabled selected>Motorcycle Brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand }}" @selected(old('brand') === $brand)>{{ $brand }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="year" class="sr-only">Year of Made</label>
                                        <select id="year" name="year" required class="parts-input w-full">
                                            <option value="" disabled selected>Year of Made</option>
                                            @foreach($years as $year)
                                                <option value="{{ $year }}" @selected(old('year') == $year)>{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="model" class="sr-only">Model Name</label>
                                    <input type="text" id="model" name="model" value="{{ old('model') }}" required placeholder="Enter Model Name" class="parts-input w-full">
                                </div>

                                <fieldset>
                                    <legend class="text-white text-sm font-semibold mb-3">Select a Category</legend>
                                    <div class="space-y-2.5">
                                        @foreach($formCategories as $formCategory)
                                            <label class="parts-radio flex items-center gap-3 cursor-pointer">
                                                <input type="radio" name="category" value="{{ $formCategory }}" @checked(old('category') === $formCategory) required class="parts-radio-input">
                                                <span>{{ $formCategory }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </fieldset>

                                <div>
                                    <label for="parts_needed" class="sr-only">Parts you Need</label>
                                    <textarea id="parts_needed" name="parts_needed" rows="4" required placeholder="Parts you Need" class="parts-input w-full resize-none">{{ old('parts_needed') }}</textarea>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="sr-only">Your Name</label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter Your Name" class="parts-input w-full">
                                    </div>
                                    <div>
                                        <label for="phone" class="sr-only">Contact Number</label>
                                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="Your Contact Number" class="parts-input w-full">
                                    </div>
                                </div>

                                @if($errors->any())
                                    <div class="rounded-lg border border-red-300 bg-red-50/10 px-4 py-3 text-sm text-red-200">
                                        Please check the form and try again.
                                    </div>
                                @endif

                                <button type="submit" class="parts-submit-btn">
                                    <span>Send</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
