<x-layout title="About Us - LITUS Automobiles">
    <div class="min-h-screen bg-white">
        <x-page-hero
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

    <style>
        .about-intro-text {
            max-width: 52rem;
            margin: 0 auto 2.5rem;
            text-align: center;
            font-size: 0.9375rem;
            line-height: 1.75;
            color: var(--color-muted);
        }
        .about-intro-text--no-title {
            margin-top: 0;
        }
        .about-section-title--intro {
            margin-bottom: 1.25rem;
        }
        .about-section-title {
            font-family: var(--font-serif);
            font-size: clamp(1.5rem, 3vw, 2rem);
            font-weight: 600;
            color: var(--color-navy);
            text-align: center;
            margin-bottom: 2rem;
        }
        .about-mv-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }
        @media (min-width: 768px) {
            .about-mv-grid { grid-template-columns: repeat(2, 1fr); }
        }
        .about-mv-card {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            padding: 2rem 1.75rem;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }
        .about-mv-card__title {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--color-navy);
            margin-bottom: 1rem;
        }
        .about-mv-card__text {
            font-size: 0.875rem;
            line-height: 1.7;
            color: var(--color-muted);
            margin: 0;
        }
        .about-members-grid {
            display: grid;
            gap: 1.25rem;
            margin-bottom: 1.25rem;
        }
        .about-members-grid--3 {
            grid-template-columns: 1fr;
        }
        .about-members-grid--4 {
            grid-template-columns: 1fr;
            margin-bottom: 0;
        }
        @media (min-width: 640px) {
            .about-members-grid--3 { grid-template-columns: repeat(2, 1fr); }
            .about-members-grid--4 { grid-template-columns: repeat(2, 1fr); }
        }
        @media (min-width: 1024px) {
            .about-members-grid--3 { grid-template-columns: repeat(3, 1fr); }
            .about-members-grid--4 { grid-template-columns: repeat(4, 1fr); }
        }
        .member-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
            padding-bottom: 1.25rem;
        }
        .member-card__photo-wrap {
            aspect-ratio: 3/4;
            overflow: hidden;
            background: var(--color-card);
        }
        .member-card__photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .member-card__name {
            font-size: 1rem;
            font-weight: 700;
            color: var(--color-navy);
            margin: 1rem 1rem 0.25rem;
        }
        .member-card__role {
            font-size: 0.8125rem;
            color: var(--color-muted);
            margin: 0 1rem;
        }
        .about-team-photo-wrap {
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .about-team-photo {
            width: 100%;
            max-height: 420px;
            object-fit: cover;
            display: block;
        }
        .about-team-text {
            max-width: 52rem;
            margin: 0 auto;
            text-align: center;
            font-size: 0.9375rem;
            line-height: 1.75;
            color: var(--color-muted);
        }
        .showrooms-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }
        @media (min-width: 640px) {
            .showrooms-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (min-width: 1024px) {
            .showrooms-grid { grid-template-columns: repeat(6, 1fr); }
            .showroom-card--span-2 { grid-column: span 3; }
            .showroom-card--span-1 { grid-column: span 2; }
        }
        .showroom-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
        }
        .showroom-card__img-wrap {
            aspect-ratio: 16/10;
            overflow: hidden;
            background: var(--color-card);
        }
        .showroom-card__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .showroom-card:hover .showroom-card__img { transform: scale(1.05); }
        .showroom-card__body {
            padding: 1.25rem 1.25rem 1.5rem;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .showroom-card__title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--color-navy);
            margin-bottom: 0.5rem;
        }
        .showroom-card__address {
            font-size: 0.8125rem;
            line-height: 1.5;
            color: var(--color-muted);
            margin-bottom: 1rem;
            flex: 1;
        }
        .showroom-card__btn {
            font-size: 0.6875rem;
            padding: 0.5rem 1.25rem;
        }
    </style>
</x-layout>
