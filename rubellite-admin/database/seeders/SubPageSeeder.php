<?php

namespace Database\Seeders;

use App\Models\Modular\SubPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // 1 - Solutions
            [
                'parent_page_id' => 1,
                'slug' => Str::slug('Contact Center'),
                'title' => 'Contact Center',
                'header' => 'Contact Center Solutions That Work',
                'subtitle' => 'Streamlined customer service, outsourced for success.',
                'description' => 'Elevate your customer experience with Reliasourcing’s call center outsourcing solutions. We handle call center operations such as customer service, sales, lead generation, and technical support so you can put your attention where it belongs: achieving company growth.',
            ],
            [
                'parent_page_id' => 1,
                'slug' => Str::slug('Managed Services'),
                'title' => 'Managed Services',
                'header' => 'High-Quality Managed Services',
                'subtitle' => 'Cut down costs, increase profit, and grow your business without hassle.',
                'description' => 'Prioritize your company’s core competencies while simultaneously reducing costs, maximizing revenue, and dedicating your efforts to business growth by leveraging Reliasourcing’s managed services.'
            ],
            [
                'parent_page_id' => 1,
                'slug' => Str::slug('Staff Leasing'),
                'title' => 'Staff Leasing',
                'header' => 'Seamless Staff Leasing Solutions',
                'subtitle' => 'Flexible solutions for scalable staffing needs.',
                'description' => 'Scale your team without diverting attention from your primary goals with Reliasourcing’s staff leasing solutions. We take care of all the administrative details, including hiring, payroll, and benefits, so you can focus on running your business.',
            ],
            [
                'parent_page_id' => 1,
                'slug' => Str::slug('Workforce Management'),
                'title' => 'Workforce Management',
                'header' => 'Unlock Efficiency with Workforce',
                'subtitle' => 'Boost productivity and efficiency through workforce management outsourcing solutions.',
                'description' => 'Unlock the perfect workspace, increase productivity, and reach your full potential with Reliasourcing’s flexible seat leasing service. From fully equipped workstations to flexible terms and comprehensive support, we have everything you need to optimize your business operations.',
            ],

            // 2 - Specialization
            [
                'parent_page_id' => 2,
                'slug' => Str::slug('Creative Services'),
                'title' => 'Creative Services',
                'header' => '',
                'subtitle' => '',
                'description' => '',
            ],
            [
                'parent_page_id' => 2,
                'slug' => Str::slug('Sales and Customer Support'),
                'title' => 'Sales and Customer Support',
                'header' => 'Top-Notch Creative Services',
                'subtitle' => 'Innovative ICT and creative outsourcing services for next-level excellence.',
                'description' => 'Leverage the power of technology to optimize your business functions and make your venture more profitable with Reliasourcing’s ICT and creative outsourcing solutions.',
            ],

            // About Us
            [
                'parent_page_id' => 4,
                'slug' => Str::slug('Our Advantages'),
                'title' => 'Our Advantages',
                'header' => 'Our Unique Advantages',
                'subtitle' => 'Experience unique advantages when you work with Reliasourcing',
                'description' => 'Reliasourcing strives to provide our clients with industry-specific expertise through performance and value. When working with clients, we tailor our approach to their needs based on their niche to ensure we deliver quality solutions.',
            ],
            [
                'parent_page_id' => 4,
                'slug' => Str::slug('Our Team'),
                'title' => 'Our Team',
                'header' => 'About Our Team',
                'subtitle' => 'Who Are We?',
                'description' => 'With Reliasourcing, you get the benefits of a reliable onsite team that fits your company’s culture and understands your business goals. We free your mind from the stresses of the hiring process and find the perfect fit for your company. Reliasourcing handles everything from hiring, training, and developing your sales agents so you can focus on the core of your business.',
            ],
        ];

        SubPage::truncate();

        foreach($items as $item){
            $item = SubPage::create($item);
        }
    }
}
