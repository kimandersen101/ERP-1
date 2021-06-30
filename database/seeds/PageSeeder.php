<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 2,
            'slug' => 'history-of-water',
            'title' => 'Why we are different (Chronological timeline)',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 3,
            'slug' => 'types-of-water-systems',
            'title' => 'How software-demand.com compares to other water treatment systems',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 4,
            'slug' => 'drinkingsystem',
            'title' => 'software-demand.com Product Specifications',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 5,
            'slug' => '13-hydrogen-benefits',
            'title' => '13 Health Benefits of Drinking Hydrogen Water',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 7,
            'slug' => 'our-story',
            'title' => 'Company Story',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 8,
            'slug' => 'water-quality',
            'title' => 'Check water quality by Zip Code',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 9,
            'slug' => 'test-report-2018',
            'title' => 'Filter Certification by SGS',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 11,
            'slug' => 'purchase-and-financing-options',
            'title' => 'Purchase and Financing Options',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 12,
            'slug' => 'filter-maintenance-details',
            'title' => 'Filter Maintenance',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 13,
            'slug' => 'recommended-daily-consumption-of-water-and-cost-per-gallon',
            'title' => 'Water Cost per Gallon',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 14,
            'slug' => 'return-policy',
            'title' => 'Return Policy and Warranty',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 16,
            'slug' => 'average-delivery-time',
            'title' => 'What is the average delivery time?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 17,
            'slug' => 'receiving-boxes',
            'title' => 'How many boxes will I be receiving?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 18,
            'slug' => 'box-dimensions',
            'title' => 'What are the box dimensions including weight?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 19,
            'slug' => 'shipment-to-local-fedex-store',
            'title' => 'Can I request shipment to the local FedEx store for pick up?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 21,
            'slug' => 'installation-options',
            'title' => 'What are my installation options?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 22,
            'slug' => 'types-of-countertops',
            'title' => 'How safe is it to drill holes through granite, marble, quartz, and or other types of countertops?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 23,
            'slug' => 'fit-in-kitchen',
            'title' => 'How do I know it will fit in my kitchen?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 24,
            'slug' => 'rent-a-property',
            'title' => 'If I rent a property, can I still get this unit installed?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 25,
            'slug' => 'easy-to-move',
            'title' => 'If I\'m moving, is this easy to move?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 27,
            'slug' => 'renew-filters',
            'title' => 'How do I renew my filters?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 28,
            'slug' => 'warranty-on-filter-renewals',
            'title' => 'What is the warranty on filter renewals?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 29,
            'slug' => 'return-policy-on-filter-renewals',
            'title' => 'What is the return policy on filter renewals?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 30,
            'slug' => 'springaqua-loyalty-program',
            'title' => 'What is the software-demand.com Loyalty Program?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 31,
            'slug' => 'switch-out-filters',
            'title' => 'Can someone help switch out my filters?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 32,
            'slug' => 'diy-filter-change',
            'title' => 'Can I DIY my filter change?',
        ]);

        Page::create([
            'type' => 'ARTICLE',
            'type_id' => 34,
            'slug' => 'contact-customer-support',
            'title' => 'How to contact customer support',
        ]);

        Page::create([
            'type' => 'BOOKLET',
            'type_id' => 1,
            'slug' => 'booklet',
            'title' => 'software-demand.com Booklet',
        ]);

        Page::create([
            'slug' => 'drinking-water',
            'title' => 'Drinking Water',
        ]);

        Page::create([
            'slug' => 'cart',
            'title' => 'Cart',
        ]);

        Page::create([
            'slug' => 'checkout',
            'title' => 'Checkout',
        ]);

        Page::create([
            'slug' => 'thank-you',
            'title' => 'Thank you',
        ]);

        Page::create([
            'slug' => 'affiliate',
            'title' => 'Affiliate',
        ]);

        Page::create([
            'slug' => 'faq',
            'title' => 'Frequently asked questions',
        ]);

        Page::create([
            'slug' => 'hydrogen',
            'title' => 'Hydrogen',
        ]);

        Page::create([
            'slug' => 'balance-ph',
            'title' => 'Balance Ph',
        ]);

        Page::create([
            'slug' => 'micro-clustering',
            'title' => 'Micro Clustering',
        ]);

        Page::create([
            'slug' => 'minerals',
            'title' => 'Minerals',
        ]);

        Page::create([
            'slug' => 'co-applicant',
            'title' => 'Co Applicant',
        ]);

        Page::create([
            'slug' => 'home',
            'title' => 'Home',
        ]);

        Page::create([
            'slug' => 'overview',
            'title' => 'Overview',
        ]);

        Page::create([
            'slug' => 'pure',
            'title' => 'Pure',
        ]);

        Page::create([
            'slug' => 'clean',
            'title' => 'Clean',
        ]);

        Page::create([
            'slug' => 'safe',
            'title' => 'Safe',
        ]);

        Page::create([
            'slug' => 'life',
            'title' => 'Life',
        ]);

        Page::create([
            'slug' => 'hydrogen-mitochondria',
            'title' => 'Hydrogen Mitochondria',
        ]);

        Page::create([
            'slug' => 'ph-importance',
            'title' => 'Importance of pH balance',
        ]);

        Page::create([
            'slug' => 'technology-value',
            'title' => 'The Value Of Technology',
        ]);

        Page::create([
            'slug' => 'why-different',
            'title' => 'Why we are different',
        ]);

        Page::create([
            'slug' => 'purchase',
            'title' => 'Purchase Options',
        ]);

        Page::create([
            'slug' => 'filter-maintenance',
            'title' => 'Filter Maintenance',
        ]);

        Page::create([
            'slug' => 'dr-tracy',
            'title' => 'Dr. Tracy Cook',
        ]);

        Page::create([
            'slug' => 'business-opportunity',
            'title' => 'Business Opportunity',
        ]);

        Page::create([
            'slug' => 'compensation',
            'title' => 'Compensation',
        ]);

        Page::create([
            'slug' => 'baram',
            'title' => 'Baram',
        ]);

        Page::create([
            'slug' => 'steve-woodward',
            'title' => 'Steve Woodward',
        ]);

        Page::create([
            'slug' => 'dave-and-virginia',
            'title' => 'Dave and Virginia Van Pelt',
        ]);

        Page::create([
            'slug' => 'getting-started',
            'title' => 'Getting Started',
        ]);

        Page::create([
            'slug' => 'pictures',
            'title' => 'Pictures',
        ]);

        Page::create([
            'slug' => 'affiliate-thank-you',
            'title' => 'Affiliate thank you',
        ]);

        Page::create([
            'slug' => 'business',
            'title' => 'Business Opportunity',
        ]);

        Page::create([
            'slug' => 'our-technology',
            'title' => 'Our Technology',
        ]);

        Page::create([
            'slug' => 'video',
            'title' => 'Video',
        ]);

        Page::create([
            'slug' => 'installation-instructions',
            'title' => 'Installation Instructions',
        ]);

        Page::create([
            'slug' => 'filters-maintenance',
            'title' => 'Filters Maintenance',
        ]);

        Page::create([
            'slug' => 'well-water',
            'title' => 'Well Water with Tub Installation',
        ]);

        Page::create([
            'slug' => 'wet6-installation',
            'title' => 'WET 6 Installation Manual',
        ]);

        Page::create([
            'slug' => 'wet7-installation',
            'title' => 'Installation Instructions - WET 7 Tech',
        ]);

        Page::create([
            'slug' => 'certification',
            'title' => 'Certification',
        ]);

        Page::create([
            'slug' => 'test-report-2016',
            'title' => 'Test Report 2016',
        ]);

        Page::create([
            'slug' => 'contact-us',
            'title' => 'Contact Us',
        ]);

        Page::create([
            'slug' => 'our-mission',
            'title' => 'Our Mission',
        ]);
        
        Page::create([
            'slug' => 'post-installation-instructions',
            'title' => 'Post installation instructions',
        ]);
    }
}
