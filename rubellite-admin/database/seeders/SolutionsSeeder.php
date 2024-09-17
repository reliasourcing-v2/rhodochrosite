<?php

namespace Database\Seeders;

use App\Models\Modular\Card;
use App\Models\Modular\Frame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // Contact Center
            [
                'sub_page_id' => 1,
                'label' => 'Frame 1',
                'frame_type' => 1,
                'title' => '<p>Why <strong>Outsource</strong> Your <br>Call Center Operations to <br>Reliasourcing?</p>',
                'content' => '
                    <p>Providing outstanding customer service is a powerful differentiator in today’s ever-changing and fast-paced business environment. However, managing an in-house call center can be time-consuming and labor-intensive, diverting resources from other business areas and limiting growth potential.</p><br>
                    <p>This is where call center outsourcing comes into play. Outsourcing your call center operations can unlock many benefits that elevate your business and propel it toward success. Here are some of them:</p>
                '
            ],
            [
                'sub_page_id' => 1,
                'label' => 'Frame 2',
                'frame_type' => 2,
            ],
            [
                'sub_page_id' => 1,
                'label' => 'Frame 3',
                'frame_type' => 1,
                'card_type' => 2,
                'title' => 'Deliver Excellent Customer Support with Reliasourcing',
                'content' => '
                    <p>Prepare to deliver exceptional customer service, accomplish your business objectives, and soar to new heights of success with our assistance.</p><br>
                    <p>Reliasourcing is committed to maintaining flexibility in our service offerings. We’re committed to creating a bespoke plan that meets your specific needs, so you only pay for what you require. Reach out to us today to begin the process.</p>
                ',
                'button_text' => 'Outsource with Us',
                'button_link' => '/#contact-us'
            ],

            // Managed Services
            [
                'sub_page_id' => 2,
                'label' => 'Frame 1',
                'frame_type' => 1,
                'title' => '<p>Why Should You Get <strong>Managed Services</strong> from Reliasourcing?</p>',
                'content' => '
                    <p>Outsourcing managed services can provide companies access to specialized knowledge they may lack internally. At Reliasourcing, we spare our customers the expense of hiring new employees to complete their projects. Our outsourced managed services free up our client’s internal resources to concentrate on strategic priorities.</p><br>
                    <p>Let’s take a closer look at why outsourcing managed services is a good idea:</p>
                '
            ],
            [
                'sub_page_id' => 2,
                'label' => 'Frame 2',
                'frame_type' => 2,
            ],
            [
                'sub_page_id' => 2,
                'label' => 'Frame 3',
                'frame_type' => 1,
                'card_type' => 2,
                'title' => 'Handle Daily Operations Effortlessly with Reliasourcing',
                'content' => '
                    <p>Discover the impact of outsourced managed services today. Allow your team to concentrate on your company’s core competencies while we handle day-to-day operations.</p><br>
                    <p>At Reliasourcing, we recognize that every industry is unique. Because of this, we are dedicated to crafting a managed services approach tailor-made only for you. Get in touch with us today to get started.</p>
                ',
                'button_text' => 'Outsource with Us',
                'button_link' => '/#contact-us'
            ],

            // Staff leasing
            [
                'sub_page_id' => 3,
                'label' => 'Frame 1',
                'frame_type' => 1,
                'title' => '<p>Why Choose Reliasourcing <br>for Staff Leasing Solutions?</p>',
                'content' => '
                    <p>Companies in today’s highly competitive market always look for new ways to improve their processes and cut expenses without sacrificing quality. Leasing employees from outsourcing companies is one strategy that has gained traction recently. Tapping into external talent and resources through staff leasing allows businesses to concentrate on what they do best. Prepare to explore the key benefits of staff leasing and why companies like yours should consider outsourcing a viable option:</p>
                '
            ],
            [
                'sub_page_id' => 3,
                'label' => 'Frame 2',
                'frame_type' => 2,
            ],
            [
                'sub_page_id' => 3,
                'label' => 'Frame 3',
                'frame_type' => 1,
                'card_type' => 2,
                'title' => 'Access Top Talent and Streamline Your Workforce with Reliasourcing',
                'content' => '
                    <p>Broaden your reach, increase productivity, and focus more on your core responsibilities when you outsource your staff leasing operations to us.</p><br>
                    <p>Reliasourcing is dedicated to developing a tailor-made plan that meets your requirements so that you only pay for the services you use. Get in touch with us right away to get things going.</p>
                ',
                'button_text' => 'Outsource with Us',
                'button_link' => '/#contact-us'
            ],

            // Workforce Management
            [
                'sub_page_id' => 4,
                'label' => 'Frame 1',
                'frame_type' => 1,
                'title' => '<p>Why Outsource Workforce <br> Management to <br> Reliasourcing?</p>',
                'content' => '
                    <p>Businesses need effective workforce management to succeed in today’s hectic and cutthroat marketplace. It entails maximizing human resource allocation, raising output, and ensuring seamless operations.</p><br>
                    <p>Here’s how Reliasourcing can help you with reliable workforce management solutions:</p>
                '
            ],
            [
                'sub_page_id' => 4,
                'label' => 'Frame 2',
                'frame_type' => 2,
            ],
            [
                'sub_page_id' => 4,
                'label' => 'Frame 3',
                'frame_type' => 1,
                'card_type' => 2,
                'title' => 'Maximize Workforce Management with Reliasourcing',
                'content' => '
                    <p>Increase operational effectiveness, streamline administrative tasks, and make the most of your workforce by utilizing Reliasourcing’s services to achieve your company’s goals.</p><br>
                    <p>Reliasourcing is dedicated to designing a plan specifically for you, ensuring you only pay for your requirements. Get in touch with us today to get started.</p>
                ',
                'button_text' => 'Outsource with Us',
                'button_link' => '/#contact-us'
            ],
        ];

        $cards = [
            [

                'frame_id' => 2,
                'title' => 'Market Expansion and Increased Customer Reach',
                'content' => 'Outsourcing call center operations offers the advantage of a larger workforce and presents a unique opportunity for market expansion. With multilingual operations, for instance, your business can effectively cater to diverse clients, expanding its customer reach and operating round-the-clock to accommodate different time zones.',
            ],
            [

                'frame_id' => 2,
                'title' => 'Cost-reduction',
                'content' => 'It takes a great deal of investment to set up and run an in-house call center, from the initial construction to the computers and phones to the employees and their salaries and benefits. With Reliasourcing, you can avoid these expenses while gaining access to a more affordable solution from your service provider. This enables you to optimize your budget, strategically allocate resources, and achieve greater financial efficiency.',
            ],
            [

                'frame_id' => 2,
                'title' => 'Scalability and Flexibility',
                'content' => 'Companies often experience spikes and drops in call volume due to seasonality, marketing, and product launches. Managing these fluctuations in-house can be difficult, leading to longer wait times, more frustrated customers, and lower customer satisfaction. Call centers can benefit from the scalability and adaptability offered by outsourcing companies. Reliasourcing allows you to easily adjust your staffing levels in response to fluctuations in call volume, ensuring that your customers’ inquiries are always handled promptly and thoroughly.',
            ],
            [

                'frame_id' => 2,
                'title' => 'Better Customer Experience',
                'content' => 'Outsourcing partners are committed to delivering exceptional customer experiences. With a dedicated team of trained agents, advanced technologies, and streamlined processes, Reliasourcing handles customer inquiries efficiently and effectively. This leads to higher customer satisfaction, increased loyalty, positive word-of-mouth, and an improved brand reputation.',
            ],
            [

                'frame_id' => 2,
                'title' => '24/7 Availability',
                'content' => 'Besides multiple channel availability, customer support should be available whenever your customers need it. Outsourcing your call center operations allows you to offer round-the-clock availability, including weekends and holidays. With Reliasourcing’s shift and schedule management capabilities, customers will always get prompt service. This level of accessibility boosts customer trust, loyalty, and satisfaction.',
            ],
            [

                'frame_id' => 2,
                'title' => 'Omnichannel Support',
                'content' => 'Customers anticipate consistent service across all channels in today’s highly connected world. Whether via phone, email, live chat, or social media, Reliasourcing is prepared to handle customer inquiries. This ensures that customers communicate with your company conveniently, improving the quality of their experience.',
            ],
            [

                'frame_id' => 2,
                'title' => 'Increased Employee Satisfaction',
                'content' => 'Within a call center setting, employees collaborate towards shared objectives, maintain open lines of communication, and have manageable workloads. The presence of additional staff through call center outsourcing often leads to more productive and efficient workdays for in-house employees. With the support of call center outsourcing, employees gain confidence in their roles and recognize the overall value they bring to the business. This creates opportunities for employees to apply their skills beyond the office environment, fostering personal growth, boosting morale, and enhancing job satisfaction.',
            ],

            [

                'frame_id' => 5,
                'title' => 'Reduced Expenses',
                'content' => 'It’s more cost-effective to outsource IT to a managed services provider than to build an in-house team, especially in scarce skill sets like cybersecurity. Compared to hiring an IT expert to work in-house, the cost savings managed services outsourcing providers offer are substantial. Replacing your on-premises hardware with cloud services from a managed service provider will help you cut costs.',
            ],
            [

                'frame_id' => 5,
                'title' => 'Ability to Tap Into Unique Resources',
                'content' => 'Managed service outsourcing provides access to resources and knowledge that would otherwise be unavailable. The fact that most businesses struggle to find qualified talent makes these tools all the more crucial. If, for instance, you’re having trouble hiring IT professionals for your company, managed services are the way to go. Data backups, network management, and even networking security and administration are tasks the best outsourcing solutions can handle for your business.',
            ],
            [

                'frame_id' => 5,
                'title' => 'Flexible and Scalable Tools',
                'content' => 'Managed service providers typically offer cybersecurity and product-specific support to their clientele. However, most of these service providers also recognize the value of adaptability when designing options to meet your requirements and the ever-evolving demands of your business. Reliasourcing provides adaptable and scalable resources to help your business keep up with the demands of today’s ever-changing markets and strategic objectives. Companies undergoing a rapid digital transformation or those scaling up in response to cybersecurity threats, can especially benefit from this service.',
            ],
            [

                'frame_id' => 5,
                'title' => 'Relieved Pressure',
                'content' => 'By outsourcing managed services, your team can devote more time and energy to higher-priority tasks and strategic endeavors. Outsourced managed services allow technical teams to focus on innovation and business growth without worrying about essential operations. Furthermore, outsourcing intricate processes, such as cybersecurity, enhances competitiveness, streamlines operations, and boosts overall productivity.',
            ],
            [

                'frame_id' => 5,
                'title' => 'Continuous Service and Upkeep',
                'content' => 'Support and upkeep for the delegated tasks are typically available around the clock from managed service providers like Reliasourcing. This guarantees that companies can always reach out for technical support, reducing the likelihood of downtime and other disruptions. Outsourced managed services’ ongoing support can also significantly increase the dependability and accessibility of crucial systems and services.',
            ],
            [

                'frame_id' => 5,
                'title' => 'Lessened Risk',
                'content' => 'Outsourcing management functions reduce vulnerability. To deal with ever-evolving compliance regulations and security threats, Reliasourcing offers tailored risk mitigation and management services. We take care of the intricacies of regulatory compliance by performing routine audits of your systems and processes.',
            ],

            [

                'frame_id' => 8,
                'title' => 'Operational Flexibility',
                'content' => 'Staff leasing provides the adaptability and scalability businesses require as workloads and needs evolve. With the help of staff leasing, businesses can easily adjust their workforce size to meet fluctuating demand. Companies can quickly adapt to changes in the market, seasonal requests, or project-specific requirements without going through the time-consuming and costly processes of hiring and letting go of employees. Leasing personnel also allows businesses to maintain flexibility, efficiency, and sensitivity to customer needs.',
            ],
            [

                'frame_id' => 8,
                'title' => 'Cost-Efficient',
                'content' => 'Staff leasing is attractive to businesses because it can help them reduce costs. By outsourcing to an external provider, companies eliminate the expenses associated with recruitment, onboarding, training, and maintaining a full-time workforce. Reliasourcing can take on these responsibilities, reducing overhead costs such as employee benefits, office space, and equipment. This allows you to allocate resources more efficiently and invest in strategic growth areas.',
            ],
            [

                'frame_id' => 8,
                'title' => 'Advanced Technology Availability',
                'content' => 'To stay competitive, outsourcing firms frequently upgrade to newer technologies and equipment. Staff leasing allows businesses to use cutting-edge tools without significant financial commitments. Access to advanced technology helps companies to improve operations, streamline procedures, anticipate market shifts, and fuel innovation and expansion.',
            ],
            [

                'frame_id' => 8,
                'title' => 'Expert Access',
                'content' => 'Today’s business world is complex and constantly changing, making specialized skills increasingly crucial for success. Leasing employees gives businesses access to skilled workers with varied backgrounds and areas of expertise. Whether IT, marketing, customer service, or finance, Reliasourcing can connect businesses with professionals with the necessary skills and knowledge to deliver exceptional results. This access to specialized talent significantly enhances the organization’s productivity, quality, and innovation.',
            ],
            [

                'frame_id' => 8,
                'title' => 'Better Employee Work-Life Balance',
                'content' => 'Besides multiple channel availability, customer support should be available whenever your customers need it. Outsourcing your call center operations allows you to offer round-the-clock availability, including weekends and holidays. With Reliasourcing’s shift and schedule management capabilities, customers will always get prompt service. This level of accessibility boosts customer trust, loyalty, and satisfaction.',
            ],
            [

                'frame_id' => 8,
                'title' => 'Core Function Focus',
                'content' => 'Outsourcing non-core functions allows companies to focus on what they do best and improve their competitive edge. Leasing staff enables businesses to outsource administrative tasks to industry professionals, freeing up internal resources for more important endeavors. This strategic focus enables enterprises to innovate, improve their products or services, and gain a competitive advantage in their industry.',
            ],
            [

                'frame_id' => 8,
                'title' => 'Global Talent Reach',
                'content' => 'Leasing employees is an excellent way for companies to access international talent as they grow or enter new markets. Since many outsourcing firms operate globally, their clients can draw talent from around the world. With this reach, you don’t have to establish shops in different countries, deal with other legal systems, or handle international employment regulations.',
            ],

            [

                'frame_id' => 11,
                'title' => 'Management of Work Authorization Documents',
                'content' => 'Many problems will arise if your hired contractors don’t arrive with the proper work permits and visas. They might not get into the country assigned to them or be deported because of incomplete documentation. In some industries, workers will not be allowed on the premises if they don’t have the proper identification. A workforce management partner’s insight into the procedure and familiarity with the various visa and work permit options will prove invaluable. Reliasourcing has specialists available to assist your company in shouldering this load. As a result, you can put more of your mental energy into growing your company.',
            ],
            [

                'frame_id' => 11,
                'title' => 'Ensuring Compliance',
                'content' => 'Compliance issues arise when tracking certifications, training, missed breaks, labor standards, family and sick leave, and union agreements. Keeping tabs on whether or not an organization is following employment laws is also one of the trickiest and most potentially expensive aspects of managing a workforce. A workforce management outsourcing service like Reliasourcing can ensure workers are legally employed and paid. We also offer flexible plans, so you only pay for what you need.',
            ],
            [

                'frame_id' => 11,
                'title' => 'Mitigating Employment Liability',
                'content' => 'Given the constantly changing business environment, situations arise where it becomes necessary to part ways with employees unexpectedly. By collaborating with a workforce management partner to engage independent contractors, businesses can mitigate the potential risks associated with employment practices and simplify the hiring process. This allows people to be quickly onboarded, even before administrative tasks like setting up social security, tax, and visa accounts are finished.',
            ],
            [

                'frame_id' => 11,
                'title' => 'Taking Care of Tax Obligations',
                'content' => 'Correctly paying your employees is also critical to workforce management. Tax liabilities are always different and can change depending on where you live. How do you calculate their taxes if you pay your employees daily or hourly? A workforce management partner like Reliasourcing will relieve you of this burden by ensuring that all tax obligations are met.  ',
            ],
            [

                'frame_id' => 11,
                'title' => 'Credit Term Expansion',
                'content' => 'Wouldn’t it be great to have improved cash flow? Partnering with a workforce management company can offer you the advantage of extended credit terms. At Reliasourcing, we ensure timely payments to your contractors, freeing you to focus on other aspects of your business. With only one invoice to track, you can devote more time to prompting customers to pay you instead of juggling multiple payment schedules.',
            ],
            [

                'frame_id' => 11,
                'title' => 'Assistance in Mobilization',
                'content' => 'Nowadays, your workforce will likely be distributed globally. Organizing the logistics of bringing people into a country can be monumental. A workforce management partner, however, can take care of all of this for you and often uses their connections with travel providers to reduce costs.',
            ],
            [

                'frame_id' => 11,
                'title' => 'Lightened Administrative Load',
                'content' => 'Reliasourcing can free you from mountains of administrative tasks and complications. We will take care of any paperwork and daily operations for your workforce. Without worrying about the nitty-gritty of day-to-day operations and paperwork, you can focus on other aspects of growing your business.',
            ],
        ];

        Frame::truncate();
        Card::truncate();

        foreach($items as $item){
            $item = Frame::create($item);
        }

        foreach($cards as $item){
            $item = Card::create($item);
        }
    }
}
