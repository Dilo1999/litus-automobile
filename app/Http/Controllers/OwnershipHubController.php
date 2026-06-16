<?php

namespace App\Http\Controllers;

class OwnershipHubController extends Controller
{
    public function index()
    {
        return view('pages.ownership-hub', [
            'testimonials' => $this->testimonials(),
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
