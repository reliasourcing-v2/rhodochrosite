<?php

namespace Database\Seeders;

use App\Models\Modular\Card;
use App\Models\Modular\Frame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'sub_page_id' => 8,
                'label' => 'Frame 1',
                'frame_type' => 1,
                'title' => '<p>Our <strong>Goals</strong></p>',
                'content' => '
                    <p>Let Reliasourcing unburden your mind, allowing you to concentrate on your core business while we take care of everything else. Here’s how we can do it for you:</p>
                '
            ],
            [
                'sub_page_id' => 8,
                'label' => 'Frame 2',
                'frame_type' => 2,
                'card_type' => 3,
            ],
            [
                'sub_page_id' => 8,
                'label' => 'Frame 3',
                'frame_type' => 1,
                'card_type' => 3,
                'title' => '<p>Why the <strong>Philippines?</strong></p>',
                'content' => '
                    <p>With a skilled workforce and thriving infrastructure, the Philippines sits at the center of BPO success. Reliasourcing is located in the heart of Manila, giving it a unique vantage point to keep up with the latest trends and developments in the business world.</p>
                '
            ],
            [
                'sub_page_id' => 8,
                'label' => 'Frame 4',
                'frame_type' => 2,
                'card_type' => 1,
            ],
            [
                'sub_page_id' => 8,
                'label' => 'Frame 5',
                'frame_type' => 2,
                'card_type' => 4,
            ],
            [
                'sub_page_id' => 8,
                'label' => 'Frame 6',
                'frame_type' => 1,
                'card_type' => 4,
                'button_link' => 'https://www.youtube.com/watch?v=P2kofMKMLnE',
            ],
        ];

        $cards = [
            [
                'frame_id' => 26,
                'title' => 'Service Oriented',
                'content' => '<p>Our team is dedicated to delivering exceptional services tailored to your company’s needs. With specialized training, we ensure that your requirements are thoroughly understood and met with the utmost precision.</p>',
            ],
            [
                'frame_id' => 26,
                'title' => 'Bespoke Solutions',
                'content' => '<p>Whether you’re aiming to enhance a specific facet of your operations or require a comprehensive business transformation, our team will closely collaborate with you to craft a bespoke solution that aligns precisely with your distinct needs and objectives.</p>',
                'accent' => 1
            ],
            [
                'frame_id' => 26,
                'title' => 'Expert Access',
                'content' => '<p>Our team of experienced professionals leverages cutting-edge analytics and state-of-the-art data visualization tools to meticulously collect, process, and analyze vast volumes of data. We transform this wealth of information into actionable insights that empower our clients to enhance their operations, optimize performance, and make informed decisions of the highest priority.</p>',
                'accent' => 1
            ],
            [
                'frame_id' => 26,
                'title' => 'Responsive',
                'content' => '<p>We are dedicated to upholding the best industry standards for service level agreements (SLAs). Our team of experts carefully establishes measurable and transparent SLAs, diligently monitoring and addressing any emerging issues to ensure exceptional service delivery.</p>',
            ],

            [
                'frame_id' => 28,
                'title' => 'Language',
                'content' => '<p>The Philippines is one of the most English proficient countries in Asia second only to Singapore, with a proficiency matching the Netherlands. In terms of size, they are the third largest English speaking country in the world.<br><br>The BPO industry contributes significantly to the economy and enjoys special benefits from the government.</p>',
            ],
            [
                'frame_id' => 28,
                'title' => 'Talent',
                'content' => '<p>There are 450,000 college graduates in the Philippines annually. Compared to other countries, the pool of ready, skilled, and willing talent is much larger compared to other countries.<br><br>The BPO industry contributes significantly to the economy and enjoys special benefits from the government.</p>',
            ],
            [
                'frame_id' => 28,
                'title' => 'Demographics',
                'content' => '<p>The Philippines has a fairly young population with a mean age of 23. That makes the workforce fairly young, and extremely comfortable with technology. It is also a famously empathic and hospitable culture making them ideal for support and customer service roles.</p>',
            ],
            [
                'frame_id' => 28,
                'title' => 'Culture',
                'content' => '<p>Being both a former American Colony, the Philippine culture is very westernized. The familiarity with American general information and pop culture is very high creating very few cultural differences specifically between the US and Canada. Australians have also found the country a ripe opportunity recently with several Australian businesses setting up shop in the country.</p>',
            ],
            [
                'frame_id' => 28,
                'title' => 'Cost',
                'content' => '<p>The cost of operating in the Philippines can be anywhere from 40% to 60% lower than having captive talent. This is due to the relatively low cost of living and cost of labor.</p>',
            ],

            [
                'frame_id' => 29,
                'title' => 'Yorak Ofek',
                'content' => 'Managing Partner',
                'linkedin_link' => 'https://www.linkedin.com/in/yoray-ofek-/'
            ],
            [
                'frame_id' => 29,
                'title' => 'Amir  Borsok',
                'content' => 'Head of Business Development',
                'linkedin_link' => 'https://www.linkedin.com/in/amirborsok/'
            ],
            [
                'frame_id' => 29,
                'title' => 'Lendy Rivera',
                'content' => 'Director of HR',
                'linkedin_link' => 'https://www.linkedin.com/in/lendy-rivera-32bb2511b/'
            ],
            [
                'frame_id' => 29,
                'title' => 'Jerome Calla',
                'content' => 'Head of IT',
                'linkedin_link' => 'https://www.linkedin.com/in/henie-langbayan-49573411b/'
            ],
            [
                'frame_id' => 29,
                'title' => 'Eugenia Langbayan',
                'content' => 'Head of Operations',
                'linkedin_link' => 'https://www.linkedin.com/in/jerome-calla-678475150/'
            ],
        ];

        foreach($items as $item){
            $item = Frame::create($item);
        }

        foreach($cards as $item){
            $item = Card::create($item);
        }
    }
}
