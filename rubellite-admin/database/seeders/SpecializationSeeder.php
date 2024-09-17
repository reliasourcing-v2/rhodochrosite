<?php

namespace Database\Seeders;

use App\Models\Modular\Card;
use App\Models\Modular\Frame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // Creative Services
            [
                'sub_page_id' => 5,
                'label' => 'Frame 1',
                'frame_type' => 1,
                'title' => '<p>Why <strong>Outsource ICT</strong><br>and <strong>Creative Services</strong><br>to Reliasourcing?</p>',
                'content' => '
                    <p>Information and communication technology (ICT) and creative services are two key areas where outsourcing is advantageous. These departments greatly influence a company’s identity, digital footprint, and innovation. This is also why companies should consider working with a company and industry expert like Reliasourcing.</p>
                '
            ],
            [
                'sub_page_id' => 5,
                'label' => 'Frame 2',
                'frame_type' => 2,
            ],
            [
                'sub_page_id' => 5,
                'label' => 'Frame 3',
                'frame_type' => 1,
                'card_type' => 2,
                'title' => 'Leverage ICT and Creative Services with Reliasourcing',
                'content' => '
                    <p>Take advantage of Reliasourcing’s ICT and creative service offerings to streamline operations, eliminate unnecessary steps, and maximize overall productivity.</p><br>
                    <p>Reliasourcing is committed to tailoring a solution to your needs so you only pay for what you use. Contact us right away to get things going.</p>
                ',
                'button_text' => 'Outsource with Us',
                'button_link' => '/#contact-us'
            ],
            [
                'sub_page_id' => 5,
                'label' => 'Frame 4',
                'frame_type' => 1,
                'title' => '<p>Our <strong>Specialties</strong></p>',
                'content' => '
                    <p>Use the power of outsourcing services to your advantage. Take a closer look at what we can offer under our ICT and Creative Services and see what solutions best meet your needs.</p>
                ',
                'image_first' => 0
            ],
            [
                'sub_page_id' => 5,
                'label' => 'Frame 5',
                'frame_type' => 2,
                'card_type' => 2
            ],
        ];

        $cards = [
            [

                'frame_id' => 14,
                'title' => 'Core Function Focus',
                'content' => 'Businesses can free up resources for more strategic pursuits by outsourcing non-essential tasks. This improves effectiveness and allows them to focus resources where they will have the most impact.',
            ],
            [

                'frame_id' => 14,
                'title' => 'Cost-Efficient',
                'content' => 'Outsourcing ICT and creative services can help you save money on operations. Businesses can avoid large investments in technology, software, and skilled professionals by leveraging external expertise and infrastructure.',
            ],
            [

                'frame_id' => 14,
                'title' => 'Scalable Operations',
                'content' => 'As businesses grow, their ICT and Creative needs may change. Outsourcing offers the flexibility to scale services up or down as required, ensuring that companies always have the right resources at the right time.',
            ],
            [

                'frame_id' => 14,
                'title' => 'Domain Expertise',
                'content' => 'Experts in outsourcing, like Reliasourcing, can connect you with talented individuals offering various information technology and creative service options. The availability of such elite talent can potentially boost product and service development.',
            ],
            [

                'frame_id' => 14,
                'title' => 'Faster Market-Entry',
                'content' => 'With outsourcing, you can finish your projects faster. By streamlining procedures and capitalizing on best practices, seasoned service providers help businesses speed up the time it takes to launch new products and services.',
            ],

            [

                'frame_id' => 17,
                'title' => 'Web Design',
                'content' => 'With our web design services, your venture gets access to experts in different specialties. And as a cost-effective solution, you get ongoing support and maintenance operations to ensure your website is always up and running.',
            ],
            [

                'frame_id' => 17,
                'title' => 'Web Development',
                'content' => 'With expert web development, you can embark on a digital journey of innovation and functionality. Streamline procedures, improve user experiences, and ensure your website works perfectly on any device. Our expertise in web development allows us to create engaging and intuitive websites for a variety of purposes, from e-commerce to informational portals.',
            ],
            [

                'frame_id' => 17,
                'title' => 'Software Development',
                'content' => 'Get the most out of your company with custom software developed to meet your specific demands. Creating an application is time-consuming and intricate, requiring careful thought, preparation, expertise, and self-discipline. Another factor is selecting a development partner, as most businesses need more in-house development expertise and resources. ',
            ],
            [

                'frame_id' => 17,
                'title' => 'Graphic Design',
                'content' => 'Utilize captivating graphic design to tell stories visually to the highest degree. Engage your audience, convey your message, and create a recognizable brand that will take your business to new horizons.',
            ],
            [

                'frame_id' => 17,
                'title' => 'Animation',
                'content' => 'Use engaging animation to take your communication to the next level. Simplify complicated ideas, stimulate discussion, and give your brand a new lease on life with the help of our expert teams. Whether an explainer video or an interactive feature, Reliasourcing’s animation services breathe new life into your content, making it more engaging and likely to be shared.',
            ],
            [

                'frame_id' => 17,
                'title' => 'Content Creation',
                'content' => 'Fill your digital presence with engaging, resonant content. Our content creators produce captivating stories, detailed articles, and exciting multimedia to keep your audience interested. These strategies will raise your online profile, encourage interaction, and introduce your company as a pioneer in your field.',
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
