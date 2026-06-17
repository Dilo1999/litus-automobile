<?php

namespace App\Http\Controllers;

class OwnershipHubController extends Controller
{
    public function index()
    {
        return view('pages.ownership-hub', [
            'testimonials' => $this->testimonials(),
            'latestUpdatePosts' => $this->latestUpdatePosts(),
            'ownershipGuidePosts' => $this->ownershipGuidePosts(),
            'ridingMaintenancePosts' => $this->ridingMaintenancePosts(),
        ]);
    }

    public function show(string $category, string $slug)
    {
        $articles = $this->articles();

        $key = $category . '/' . $slug;
        if (! isset($articles[$key])) {
            abort(404);
        }

        $article = $articles[$key];
        $testimonials = ($category === 'customer-stories' && $slug === 'testimonials')
            ? $this->testimonials()
            : [];

        return view('pages.ownership-hub-article', compact('article', 'category', 'slug', 'testimonials'));
    }

    /**
     * @return array<int, array{quote: string, name: string, role: string, plan: string, image: ?string, rating: int}>
     */
    public function testimonials(): array
    {
        return [
            [
                'quote' => 'Best motor cycle seller in maldives.',
                'name' => 'Eyan Richalhey',
                'role' => 'Google Review · 4 photos',
                'plan' => '5 months ago',
                'image' => null,
                'rating' => 5,
            ],
            [
                'quote' => 'Very professional employees. Very focused. From the reception that guided and helped me to the helpful personnel on the 5th floor, the garage supervisor and hardworking mechanics deserve a big salary raise.',
                'name' => 'Mohamed Afsal',
                'role' => 'Google Review',
                'plan' => '2 years ago',
                'image' => null,
                'rating' => 5,
            ],
            [
                'quote' => 'Good selection of Bikes. Helpful staff. Service would be faster if there were more payment counters.',
                'name' => 'Ahmed Siyah',
                'role' => 'Google Review · Local Guide',
                'plan' => '2 years ago',
                'image' => null,
                'rating' => 4,
            ],
            [
                'quote' => 'They claim that they have motorbikes and they give a timing of 10 days to deliver, but when I paid for my bike, they said they have issue in arriving shipment and they keep customers hanging. Every week they give a new date, but when it comes nothing happens.',
                'name' => 'Ibbe Heema',
                'role' => 'Google Review',
                'plan' => '6 months ago',
                'image' => null,
                'rating' => 4,
            ],
            [
                'quote' => 'Promised to give my bike after 20-25 days after custom clearance. After 25 days I went to check an update and they said they have the bike here and they received it, and on April 7th they will deliver it to me. On that day when I went, they delayed again.',
                'name' => 'RidRo',
                'role' => 'Google Review · 14 photos',
                'plan' => '1 year ago',
                'image' => null,
                'rating' => 3,
            ],
            [
                'quote' => 'Worst customer service ever, buy and dont even expect to receive the cyk, absolute trash.',
                'name' => 'Moosa Jaushan Hussain',
                'role' => 'Google Review',
                'plan' => '1 month ago',
                'image' => null,
                'rating' => 4,
            ],
            [
                'quote' => 'Made full payment and bought on 29th August 2025. They said it\'ll be available in Malé for pick up within 7 days, and it\'ll be available a little bit late in Addu depending on when they find a boat. It\'s almost been a month and I have absolutely no clue where it is.',
                'name' => 'Hayyan Rasheed',
                'role' => 'Google Review · 6 reviews',
                'plan' => '8 months ago',
                'image' => null,
                'rating' => 3.5,
            ],
            [
                'quote' => 'My experience with this company has been beyond frustrating. I purchased a bike in early July, expecting it within the promised 20 working days. Now, after repeated delays and misleading information, it\'s late August, and I\'m still without my motorcycle.',
                'name' => 'Saahil Anees',
                'role' => 'Google Review',
                'plan' => '1 year ago',
                'image' => null,
                'rating' => 2,
            ],
            [
                'quote' => 'Worst customer service in the country. Says to call during work hours and when we call they cut the line until work hours are over and then happily re-calls the customer and says sorry can\'t help now call during work hours.',
                'name' => 'Dynamite Rocké',
                'role' => 'Google Review',
                'plan' => '4 years ago',
                'image' => null,
                'rating' => 5,
            ],
            [
                'quote' => 'Monthly payment delay v ma customer joorimana vaahen, Cycle release kuran bunefa ihna date ah release nukurevenyaa Litus in customer ah joorima Pay kuran jeheyne.',
                'name' => 'Ibrahim Maniu',
                'role' => 'Google Review',
                'plan' => '7 years ago',
                'image' => null,
                'rating' => 4,
            ],
        ];
    }

    /**
     * @return array<int, array{title: string, excerpt: string, image: string, date: string, filter: string, filter_label: string, url: string}>
     */
    public function latestUpdatePosts(): array
    {
        return [
            [
                'title' => 'PCX 160 ABS Now Available in Malé',
                'excerpt' => 'Fresh stock of Honda PCX 160 ABS has arrived with updated color options and immediate availability for Malé customers.',
                'image' => 'https://images.unsplash.com/photo-1609630875171-b1321377ee65?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 12, 2025',
                'filter' => 'new-arrivals',
                'filter_label' => 'New Arrivals',
                'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'new-arrivals']),
            ],
            [
                'title' => 'Yamaha NMAX 155 Added to Showroom Stock',
                'excerpt' => 'A new batch of Yamaha NMAX 155 scooters is now available with ownership plan support and ready-to-ride units.',
                'image' => 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 8, 2025',
                'filter' => 'new-arrivals',
                'filter_label' => 'New Arrivals',
                'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'new-arrivals']),
            ],
            [
                'title' => 'Kawasaki Ninja 400 Restock Update',
                'excerpt' => 'Limited Ninja 400 units are back in stock. Contact the LITUS team to reserve your preferred color before they sell out.',
                'image' => 'https://images.unsplash.com/photo-1599819811279-d5ad9cccf838?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 29, 2025',
                'filter' => 'new-arrivals',
                'filter_label' => 'New Arrivals',
                'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'new-arrivals']),
            ],
            [
                'title' => 'Limited-Time Ownership Plan Offer',
                'excerpt' => 'Selected LITUS ownership plans now include reduced down payment options for a limited campaign period.',
                'image' => 'https://images.unsplash.com/photo-1558981852-426c6c22a060?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 10, 2025',
                'filter' => 'promotions',
                'filter_label' => 'Promotions',
                'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'promotions']),
            ],
            [
                'title' => 'Seasonal Service Package Discount',
                'excerpt' => 'Book a full service package this month and receive special pricing on labour and selected genuine parts.',
                'image' => 'https://images.unsplash.com/photo-1591637333184-19aa84b3e01f?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 3, 2025',
                'filter' => 'promotions',
                'filter_label' => 'Promotions',
                'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'promotions']),
            ],
            [
                'title' => 'Accessory Bundle Promotion for New Buyers',
                'excerpt' => 'Customers purchasing selected motorcycles can now add helmet and riding gear bundles at promotional rates.',
                'image' => 'https://images.unsplash.com/photo-1619771914272-e3c1ba17ba4d?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 24, 2025',
                'filter' => 'promotions',
                'filter_label' => 'Promotions',
                'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'promotions']),
            ],
            [
                'title' => 'Updated Service Center Holiday Hours',
                'excerpt' => 'LITUS service centers will operate on revised hours during the upcoming public holiday period.',
                'image' => 'https://images.unsplash.com/photo-1486006920555-c77dcf18193c?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 6, 2025',
                'filter' => 'company-announcements',
                'filter_label' => 'Company Announcements',
                'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'company-announcements']),
            ],
            [
                'title' => 'New Customer Support Hotline for Atolls',
                'excerpt' => 'LITUS has launched a dedicated support line to help atoll customers with delivery updates and ownership queries.',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 31, 2025',
                'filter' => 'company-announcements',
                'filter_label' => 'Company Announcements',
                'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'company-announcements']),
            ],
            [
                'title' => 'Partnership Announcement with Leading Insurers',
                'excerpt' => 'LITUS customers can now access streamlined insurance support through a new partner network.',
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 18, 2025',
                'filter' => 'company-announcements',
                'filter_label' => 'Company Announcements',
                'url' => route('ownership-hub.show', ['category' => 'latest-updates', 'slug' => 'company-announcements']),
            ],
        ];
    }

    /**
     * @return array<int, array{title: string, excerpt: string, image: string, date: string, filter: string, filter_label: string, url: string}>
     */
    public function ownershipGuidePosts(): array
    {
        return [
            [
                'title' => 'Understanding Prime, Family, and Secure Plans',
                'excerpt' => 'A simple breakdown of LITUS ownership plans, eligibility requirements, and which option suits different customer profiles.',
                'image' => 'https://images.unsplash.com/photo-1622185135505-2d795003994a?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 11, 2025',
                'filter' => 'plan-explanations',
                'filter_label' => 'Plan Explanations',
                'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'plan-explanations']),
            ],
            [
                'title' => 'Flexi vs Freedom: Which Plan Fits You?',
                'excerpt' => 'Compare payment flexibility, guarantor needs, and document requirements between Flexi and Freedom ownership plans.',
                'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 4, 2025',
                'filter' => 'plan-explanations',
                'filter_label' => 'Plan Explanations',
                'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'plan-explanations']),
            ],
            [
                'title' => 'Documents Checklist Before You Apply',
                'excerpt' => 'Prepare your ID, income proof, and guarantor documents ahead of time to speed up ownership plan approval.',
                'image' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 27, 2025',
                'filter' => 'plan-explanations',
                'filter_label' => 'Plan Explanations',
                'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'plan-explanations']),
            ],
            [
                'title' => 'Ijara Explained in Simple Terms',
                'excerpt' => 'Learn how the Islamic-compliant Ijara structure works and what customers should expect during the application process.',
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 9, 2025',
                'filter' => 'ijara-tips',
                'filter_label' => 'Ijara Tips',
                'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'ijara-tips']),
            ],
            [
                'title' => '5 Tips to Prepare Your Ijara Application',
                'excerpt' => 'Practical steps to organize documents, confirm guarantor details, and avoid common delays during approval.',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 1, 2025',
                'filter' => 'ijara-tips',
                'filter_label' => 'Ijara Tips',
                'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'ijara-tips']),
            ],
            [
                'title' => 'What Happens After Ijara Approval?',
                'excerpt' => 'A step-by-step guide to payment schedules, motorcycle release, and ongoing ownership support after approval.',
                'image' => 'https://images.unsplash.com/photo-1599819811279-d5ad9cccf838?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 22, 2025',
                'filter' => 'ijara-tips',
                'filter_label' => 'Ijara Tips',
                'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'ijara-tips']),
            ],
            [
                'title' => 'Early Settlement Basics for LITUS Owners',
                'excerpt' => 'Understand when early settlement applies, how balances are calculated, and what to confirm before paying off early.',
                'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 7, 2025',
                'filter' => 'early-settlement-guides',
                'filter_label' => 'Early Settlement Guides',
                'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'early-settlement-guides']),
            ],
            [
                'title' => 'Plan-Specific Early Settlement Rules',
                'excerpt' => 'How settlement terms differ across Prime, Family, Secure, and other LITUS ownership plans.',
                'image' => 'https://images.unsplash.com/photo-1622185135505-2d795003994a?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 30, 2025',
                'filter' => 'early-settlement-guides',
                'filter_label' => 'Early Settlement Guides',
                'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'early-settlement-guides']),
            ],
            [
                'title' => 'How to Request Settlement Support',
                'excerpt' => 'Contact the LITUS team, request a settlement quote, and complete early payoff with clear guidance.',
                'image' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 19, 2025',
                'filter' => 'early-settlement-guides',
                'filter_label' => 'Early Settlement Guides',
                'url' => route('ownership-hub.show', ['category' => 'ownership-guides', 'slug' => 'early-settlement-guides']),
            ],
        ];
    }

    /**
     * @return array<int, array{title: string, excerpt: string, image: string, date: string, filter: string, filter_label: string, url: string}>
     */
    public function ridingMaintenancePosts(): array
    {
        return [
            [
                'title' => 'Monthly Motorcycle Service Checklist',
                'excerpt' => 'A practical checklist covering oil levels, brakes, tyres, lights, and chain care for everyday riders.',
                'image' => 'https://images.unsplash.com/photo-1591637333184-19aa84b3e01f?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 10, 2025',
                'filter' => 'service-tips',
                'filter_label' => 'Service Tips',
                'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'service-tips']),
            ],
            [
                'title' => 'When to Replace Brake Pads and Tyres',
                'excerpt' => 'Know the warning signs of worn brakes and tyres before they affect safety on Malé roads.',
                'image' => 'https://images.unsplash.com/photo-1619771914272-e3c1ba17ba4d?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 2, 2025',
                'filter' => 'service-tips',
                'filter_label' => 'Service Tips',
                'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'service-tips']),
            ],
            [
                'title' => 'Battery Care in Humid Weather',
                'excerpt' => 'Keep your motorcycle battery healthy with simple storage and maintenance habits for island conditions.',
                'image' => 'https://images.unsplash.com/photo-1486006920555-c77dcf18193c?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 26, 2025',
                'filter' => 'service-tips',
                'filter_label' => 'Service Tips',
                'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'service-tips']),
            ],
            [
                'title' => 'Safe Riding Habits for Daily Commutes',
                'excerpt' => 'Essential tips for navigating traffic, maintaining visibility, and riding defensively every day.',
                'image' => 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 8, 2025',
                'filter' => 'riding-advice',
                'filter_label' => 'Riding Advice',
                'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'riding-advice']),
            ],
            [
                'title' => 'Riding in Rain: What Every Owner Should Know',
                'excerpt' => 'Adjust speed, braking distance, and gear choices when riding during wet weather in the Maldives.',
                'image' => 'https://images.unsplash.com/photo-1558981852-426c6c22a060?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 28, 2025',
                'filter' => 'riding-advice',
                'filter_label' => 'Riding Advice',
                'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'riding-advice']),
            ],
            [
                'title' => 'First-Time Owner Riding Guide',
                'excerpt' => 'New to motorcycling? Start with these basics for confidence, control, and safer first rides.',
                'image' => 'https://images.unsplash.com/photo-1609630875171-b1321377ee65?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 20, 2025',
                'filter' => 'riding-advice',
                'filter_label' => 'Riding Advice',
                'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'riding-advice']),
            ],
            [
                'title' => 'How to Clean and Protect Your Motorcycle',
                'excerpt' => 'Simple washing, drying, and protection steps to keep paint, plastics, and chrome looking new.',
                'image' => 'https://images.unsplash.com/photo-1619771914272-e3c1ba17ba4d?auto=format&fit=crop&w=900&q=80',
                'date' => 'Jun 5, 2025',
                'filter' => 'product-care',
                'filter_label' => 'Product Care',
                'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'product-care']),
            ],
            [
                'title' => 'Long-Term Storage Tips for Island Owners',
                'excerpt' => 'Store your motorcycle safely during travel or off-season periods without damaging tyres or battery life.',
                'image' => 'https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 25, 2025',
                'filter' => 'product-care',
                'filter_label' => 'Product Care',
                'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'product-care']),
            ],
            [
                'title' => 'Helmet and Gear Care Essentials',
                'excerpt' => 'Extend the life of your riding gear with proper cleaning, drying, and storage after daily use.',
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=900&q=80',
                'date' => 'May 17, 2025',
                'filter' => 'product-care',
                'filter_label' => 'Product Care',
                'url' => route('ownership-hub.show', ['category' => 'riding-maintenance', 'slug' => 'product-care']),
            ],
        ];
    }

    /**
     * @return array<string, array{title: string, category: string, category_label: string, excerpt: string, image: string}>
     */
    private function articles(): array
    {
        return [
            'ownership-guides/choose-the-right-ownership-plan' => [
                'title' => 'How to Choose the Right LITUS Ownership Plan',
                'category' => 'ownership-guides',
                'category_label' => 'Ownership Guides',
                'excerpt' => 'Help customers understand ownership plan options, required documents, guarantor requirements, and payment expectations before they apply.',
                'image' => 'https://images.unsplash.com/photo-1599819811279-d5ad9cccf838?auto=format&fit=crop&w=1400&q=80',
            ],
            'latest-updates/new-arrivals' => [
                'title' => 'New Arrivals',
                'category' => 'latest-updates',
                'category_label' => 'Latest Updates',
                'excerpt' => 'Feature newly available motorcycles, fresh stock, new colors, model updates, and product highlights.',
                'image' => 'https://images.unsplash.com/photo-1609630875171-b1321377ee65?auto=format&fit=crop&w=900&q=80',
            ],
            'latest-updates/promotions' => [
                'title' => 'Promotions',
                'category' => 'latest-updates',
                'category_label' => 'Latest Updates',
                'excerpt' => 'Publish current campaigns, special ownership offers, seasonal promotions, and limited-time customer benefits.',
                'image' => 'https://images.unsplash.com/photo-1558981852-426c6c22a060?auto=format&fit=crop&w=900&q=80',
            ],
            'latest-updates/company-announcements' => [
                'title' => 'Company Announcements',
                'category' => 'latest-updates',
                'category_label' => 'Latest Updates',
                'excerpt' => 'Official LITUS notices, service changes, branch updates, partnerships, and customer announcements.',
                'image' => 'https://images.unsplash.com/photo-1486006920555-c77dcf18193c?auto=format&fit=crop&w=900&q=80',
            ],
            'ownership-guides/plan-explanations' => [
                'title' => 'Plan Explanations',
                'category' => 'ownership-guides',
                'category_label' => 'Ownership Guides',
                'excerpt' => 'Help customers understand each ownership plan and choose the option that suits their documents, guarantor situation, and budget.',
                'image' => 'https://images.unsplash.com/photo-1622185135505-2d795003994a?auto=format&fit=crop&w=900&q=80',
            ],
            'ownership-guides/ijara-tips' => [
                'title' => 'Ijara Tips',
                'category' => 'ownership-guides',
                'category_label' => 'Ownership Guides',
                'excerpt' => 'Simple tips about the Islamic-compliant Ijara structure, application preparation, payment expectations, and approval process.',
                'image' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=900&q=80',
            ],
            'ownership-guides/early-settlement-guides' => [
                'title' => 'Early Settlement Guides',
                'category' => 'ownership-guides',
                'category_label' => 'Ownership Guides',
                'excerpt' => 'Explain how early settlement works, when it applies, and how customers can request support from the LITUS team.',
                'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=900&q=80',
            ],
            'riding-maintenance/service-tips' => [
                'title' => 'Service Tips',
                'category' => 'riding-maintenance',
                'category_label' => 'Riding & Maintenance',
                'excerpt' => 'Maintenance reminders that help customers keep their motorcycles reliable, safe, and ready for daily use.',
                'image' => 'https://images.unsplash.com/photo-1591637333184-19aa84b3e01f?auto=format&fit=crop&w=900&q=80',
            ],
            'riding-maintenance/riding-advice' => [
                'title' => 'Riding Advice',
                'category' => 'riding-maintenance',
                'category_label' => 'Riding & Maintenance',
                'excerpt' => 'Helpful riding guidance for new and experienced riders, including safe habits and daily commute advice.',
                'image' => 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=900&q=80',
            ],
            'riding-maintenance/product-care' => [
                'title' => 'Product Care',
                'category' => 'riding-maintenance',
                'category_label' => 'Riding & Maintenance',
                'excerpt' => 'Help customers protect their motorcycle and accessories with simple cleaning, storage, and long-term care recommendations.',
                'image' => 'https://images.unsplash.com/photo-1619771914272-e3c1ba17ba4d?auto=format&fit=crop&w=900&q=80',
            ],
            'customer-stories/testimonials' => [
                'title' => 'Customer Testimonials',
                'category' => 'customer-stories',
                'category_label' => 'Customer Stories',
                'excerpt' => 'Real Google reviews from LITUS customers about purchases, delivery timelines, customer service, and ownership experiences.',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1400&q=80',
            ],
            'customer-stories/delivery-stories' => [
                'title' => 'Delivery Stories',
                'category' => 'customer-stories',
                'category_label' => 'Customer Stories',
                'excerpt' => 'Stories from LITUS customers about order confirmation, shipment updates, island delivery, and motorcycle handover.',
                'image' => 'https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?auto=format&fit=crop&w=1400&q=80',
            ],
            'customer-stories/ownership-journeys' => [
                'title' => 'Ownership Journeys',
                'category' => 'customer-stories',
                'category_label' => 'Customer Stories',
                'excerpt' => 'Follow how customers choose a plan, complete payments, service their motorcycles, and enjoy long-term ownership with LITUS.',
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=1400&q=80',
            ],
        ];
    }
}
