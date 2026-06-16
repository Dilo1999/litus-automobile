<x-layouts.app title="About Us - LITUS Automobiles">
    <div class="min-h-screen bg-white">
        <x-shared.page-hero
            title="About LITUS Automobiles"
            subtitle="A leading automotive company in the Maldives, specializing in the sale and service of high-quality motorcycles."
            background-image="images/background/dubai-1-1536x1024.webp"
        />

        {{-- Introduction --}}
        <section class="py-12 md:py-16">
            <div class="site-container">
                <h2 class="about-section-title about-section-title--intro">About LITUS Automobiles</h2>
                <p class="about-intro-text about-intro-text--no-title">
                    LITUS Automobiles is a leading automotive company in the Maldives, specializing in the sale and service
                    of high-quality motorcycles. With a commitment to excellence and customer satisfaction, we strive to
                    provide our clients with the best products and services in the industry.
                </p>

                <div class="about-mv-grid">
                    <article class="about-mv-card">
                        <h2 class="about-mv-card__title">Our Mission</h2>
                        <p class="about-mv-card__text">
                            To provide high-quality motorcycles and exceptional service to our customers, while maintaining
                            a commitment to excellence and customer satisfaction.
                        </p>
                    </article>
                    <article class="about-mv-card">
                        <h2 class="about-mv-card__title">Our Vision</h2>
                        <p class="about-mv-card__text">
                            To be the leading provider of motorcycles and automotive services in the Maldives.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        {{-- Key Members --}}
        <section class="py-12 md:py-16" style="background: var(--color-bg);">
            <div class="site-container">
                <h2 class="about-section-title">Our Key Members</h2>

                @php
                    $keyMembersRow1 = [
                        ['name' => 'Mohamed Zahir', 'role' => 'Managing Director'],
                        ['name' => 'Ahmed Zahir', 'role' => 'Chief Operating Officer'],
                        ['name' => 'Ali Thaufeeq', 'role' => 'Chief Financial Officer'],
                    ];
                    $keyMembersRow2 = [
                        ['name' => 'Mohamed Naseer', 'role' => 'Project Manager'],
                        ['name' => 'Aishath', 'role' => 'Sales Manager'],
                        ['name' => 'Ahmed Ali', 'role' => 'Service Manager'],
                        ['name' => 'Mohamed Shiyam', 'role' => 'Marketing Manager'],
                    ];
                @endphp

                <div class="about-members-grid about-members-grid--3">
                    @foreach($keyMembersRow1 as $member)
                        <article class="member-card">
                            <div class="member-card__photo-wrap">
                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($member['name']) }}&size=400&background=00105B&color=fff&bold=true"
                                    alt="{{ $member['name'] }}"
                                    class="member-card__photo"
                                    loading="lazy"
                                >
                            </div>
                            <h3 class="member-card__name">{{ $member['name'] }}</h3>
                            <p class="member-card__role">{{ $member['role'] }}</p>
                        </article>
                    @endforeach
                </div>

                <div class="about-members-grid about-members-grid--4">
                    @foreach($keyMembersRow2 as $member)
                        <article class="member-card">
                            <div class="member-card__photo-wrap">
                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($member['name']) }}&size=400&background=00105B&color=fff&bold=true"
                                    alt="{{ $member['name'] }}"
                                    class="member-card__photo"
                                    loading="lazy"
                                >
                            </div>
                            <h3 class="member-card__name">{{ $member['name'] }}</h3>
                            <p class="member-card__role">{{ $member['role'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Operation Team --}}
        <section class="py-12 md:py-16 bg-white">
            <div class="site-container">
                <h2 class="about-section-title">Our Operation Team</h2>
                <div class="about-team-photo-wrap">
                    <img
                        src="{{ asset('images/background/dubai-1-1536x1024.webp') }}"
                        alt="LITUS Automobiles operation team"
                        class="about-team-photo"
                        loading="lazy"
                        onerror="this.src='{{ asset('images/background/6b38bb0353.jpeg') }}'"
                    >
                </div>
                <p class="about-team-text">
                    Our operation team is composed of dedicated and experienced professionals who work tirelessly to ensure
                    the smooth operation of our business. From sales and marketing to service and maintenance, our team is
                    committed to providing our customers with the best possible experience.
                </p>
            </div>
        </section>

        {{-- Showrooms & Service Centers --}}
        <section class="py-12 md:py-16 pb-20" style="background: var(--color-bg);">
            <div class="site-container">
                <h2 class="about-section-title">Our Showrooms &amp; Service Centers</h2>

                @php
                    $showrooms = [
                        ['name' => "Male' Showroom", 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/6b38bb0353.jpeg', 'span' => 2],
                        ['name' => "Hulhumale' Showroom", 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/about-1-ezgif.com-png-to-webp-converter.webp', 'span' => 2],
                        ['name' => 'Fuvahmulah Showroom', 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/Build.png', 'span' => 1],
                        ['name' => 'Addu Showroom', 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/dubai-1-1536x1024.webp', 'span' => 1],
                        ['name' => 'Kulhudhuffushi Showroom', 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/6b38bb0353.jpeg', 'span' => 1],
                        ['name' => 'Thinadhoo Showroom', 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/Build.png', 'span' => 1],
                        ['name' => 'Naifaru Showroom', 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/about-1-ezgif.com-png-to-webp-converter.webp', 'span' => 1],
                        ['name' => 'Head Office', 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/dubai-1-1536x1024.webp', 'span' => 1],
                        ['name' => 'Dhidhdhoo Showroom', 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/6b38bb0353.jpeg', 'span' => 1],
                        ['name' => 'Villingili Showroom', 'address' => 'Visit our showroom for the latest models and expert service.', 'image' => 'images/background/Build.png', 'span' => 1],
                    ];
                @endphp

                <div class="showrooms-grid">
                    @foreach($showrooms as $showroom)
                        <article class="showroom-card showroom-card--span-{{ $showroom['span'] }}">
                            <div class="showroom-card__img-wrap">
                                <img
                                    src="{{ asset($showroom['image']) }}"
                                    alt="{{ $showroom['name'] }}"
                                    class="showroom-card__img"
                                    loading="lazy"
                                >
                            </div>
                            <div class="showroom-card__body">
                                <h3 class="showroom-card__title">{{ $showroom['name'] }}</h3>
                                <p class="showroom-card__address">{{ $showroom['address'] }}</p>
                                <a href="{{ route('contact') }}" class="litus-btn showroom-card__btn">Learn More</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
