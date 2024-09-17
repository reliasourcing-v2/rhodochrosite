<?php

namespace Database\Seeders;

use App\Models\Modular\ChildPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChildPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // Specialization - Sales and Customer Support
            [
                'sub_page_id' => 6,
                'slug' => Str::slug('Sales Development Services'),
                'title' => 'Sales Development Services',
                'header' => 'Leading-Edge Sales Development Representative Solutions',
                'subtitle' => 'Generate New Business Leads with our SDR Services',
                'description' => 'Our sales development representative (SDR) services are the fuel pumps for your sales engine. SDRs are your frontline troops, diving into the trenches of lead generation. We employ a dynamic arsenal of strategies, from laser-focused emails to magnetic cold calls, captivating social media outreach, and beyond.',
            ],
            [
                'sub_page_id' => 6,
                'slug' => Str::slug('Customer Success Services'),
                'title' => 'Customer Success Services',
                'header' => 'Efficient Customer Service Solutions',
                'subtitle' => 'Handle Customer Service Without Hassle Through Outsourced Solutions',
                'description' => 'Embrace the future of customer service with outsourced customer service solutions. With this dynamic partnership, businesses leverage external experts to handle customer support with finesse. This empowers companies to focus on their core strengths while entrusting top-tier customer service to a dedicated ally.',
            ],
        ];

        ChildPage::truncate();

        foreach($items as $item){
            $item = ChildPage::create($item);
        }
    }
}
