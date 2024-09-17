<?php

namespace Database\Seeders;

use App\Models\Modular\Card;
use App\Models\Modular\Frame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurAdvantagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'sub_page_id' => 7,
                'label' => 'Frame 1',
                'frame_type' => 1,
                'title' => '<p>Experience <strong>unique advantages</strong> when you work with Reliasourcing</p>',
                'content' => '
                    <p>Hiring the right person at the right time is frequently essential to business innovation and growth. Discover the industries we focus on to see how our services can help your venture succeed.</p>
                '
            ],
            [
                'sub_page_id' => 7,
                'label' => 'Frame 2',
                'frame_type' => 2,
                'card_type' => 2,
            ],
            [
                'sub_page_id' => 7,
                'label' => 'Frame 3',
                'frame_type' => 1,
                'image_first' => 0,
                'title' => '<p>Our <strong>Approach</strong></p>',
                'content' => '
                    <p>At Reliasourcing, our approach is your roadmap to success. We believe in a dynamic and adaptable strategy that evolves with your organization’s needs. Here’s a closer look at each step:</p>
                '
            ],
            [
                'sub_page_id' => 7,
                'label' => 'Frame 2',
                'frame_type' => 2,
                'card_type' => 3,
            ],
        ];

        $cards = [
            [ 
                'frame_id' => 22,
                'title' => 'Tailor-Made Solutions', 
                'content' => '<p>With a focus on developing the best strategies, we collaborate with our clients to understand their specific needs and deliver the best outcomes. Our specialized teams offer timely performance analysis based on the results, allowing for any adjustments to your current strategies. On top of that, we provide tailor-made service bundles to ensure you only pay for what you require.</p>',
            ],
            [ 
                'frame_id' => 22,
                'title' => 'Fast Scaling', 
                'content' => '<p>Time is of the essence in business. Reliasourcing ensures that we don’t waste your time–that’s why we mastered the ability to accommodate your rapidly changing needs in terms of sizing and operation models. We are the partner to count on should you need a quicking up or downscaling. Thanks to our experience and expertise, we have the capabilities to make these changes as fast, painless, and efficiently as possible. After all, we take care of these things so you don’t have to.</p>',
            ],
            [ 
                'frame_id' => 22,
                'title' => 'Cost Saving', 
                'content' => '<p>Reliasourcing ensures that we put in the best fits for your company, minimizing any risks and disputes for your business. With us as your partner, you can save up on additional costs and direct your money towards the growth of your company.</p>',
            ],
            [ 
                'frame_id' => 22,
                'title' => 'True Partnership', 
                'content' => '<p>Reliasourcing isn’t just an outsourcing company–we’re your partners! That’s why we build trust and commitment with you. Our management team will help you grow and achieve your business goals. We focus on your success and we do what needs to be done to help you get it.</p>',
            ],
            [ 
                'frame_id' => 22,
                'title' => 'Quality Assurance', 
                'content' => '<p>Reliasourcing provides high-quality services…and we back that up with our quality assurance team as well! With a pool of the best talents onboard, we take pride in our ability to deliver the best results.</p>',
            ],
            [ 
                'frame_id' => 22,
                'title' => 'Innovation and Insight', 
                'content' => '<p>We don’t just get you to the top, we make sure that you get ahead. With our team of experts, we provide ongoing consultations for your company. We let you know the latest developments and insights on customer care and ensure that your team is always equipped with the latest knowledge on how to give the highest quality of customer service.</p>',
            ],
            [ 
                'frame_id' => 22,
                'title' => 'State of the Art Reporting System', 
                'content' => '<p>Data is the life and blood of most businesses, which is why we ensure that we have the numbers to show when you talk to us. Our systems give you a comprehensive view of your team’s performance, whether it be sales or customer service. With our state-of-the-art reporting systems, we can accurately provide you with the most pressing information and analyze the data to give you better insights and recommendations.</p>',
            ],
            [ 
                'frame_id' => 22,
                'title' => 'New Opportunities', 
                'content' => '<p>Reliasourcing is on the constant lookout for the latest ideas and strategies for your business. We help you increase your KPIs, scale-up, and find additional support models that ensure your growth and development. Our team will connect you with and make these recommendations based on your goals and objectives. </p>',
            ],
            [ 
                'frame_id' => 22,
                'title' => 'Delivery Center for All BPO Needs', 
                'content' => '<p>Who better to ensure smooth and speedy operations for call centers than experts on the field? Reliasourcing has hands-on experience and a deep understanding of call center operations, enabling us to execute fast and flawless operations in the Philippines.</p>',
            ],

            [
                'frame_id' => 24,
                'title' => 'Strategize',
                'content' => '<p>We work closely with you to formulate a strategy that aligns seamlessly with your organizational objectives. Through comprehensive analysis and industry expertise, we develop a tailored plan designed to drive success and growth.</p>',
            ],
            [
                'frame_id' => 24,
                'title' => 'Execute',
                'content' => '<p>Execution is where the rubber meets the road. We put our strategies into action, meticulously implementing operations according to the established plan. Our commitment to excellence ensures that each task is carried out with precision and dedication.</p>',
                'accent' => 1
            ],
            [
                'frame_id' => 24,
                'title' => 'Update',
                'content' => '<p>Adaptability is essential in today’s dynamic business environment. We pride ourselves on our ability to swiftly adapt strategy, allocate resources, and optimize procedures based on tangible results and emerging trends. Your success remains our top priority.</p>',
                'accent' => 1
            ],
            [
                'frame_id' => 24,
                'title' => 'Measure',
                'content' => '<p>We believe in data-driven decision-making. Our real-time measurement and analysis tools provide valuable insights into performance and key performance indicators (KPIs). This enables us to make informed adjustments and continually refine our strategies for maximum efficiency and effectiveness.</p>',
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
