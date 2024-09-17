<template>
    <user-layout>

        <!-- General Banner -->
        <general-banner 
            :item="{
                image: '/temp/cs1.png',
                title: '<h1>Leverage Outstanding Sales and Customer Support Solutions</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Seamless customer engagement services where expertise meets excellence</h4>',
                description: '<p>Take your customer engagement operations to the next level. With Reliasourcing, you’ll experience top-notch sales and customer support solutions from a dedicated team emphasizing 24/7 availability, personalized solutions, data-driven strategies, and more.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Why Outsource <b>Sales</b> and <b>Customer Support</b> Services to Reliasourcing?',
                description: '<p>Sales and customer service are two areas where outsourcing has become a strategic necessity for companies of all sizes and in all sectors. In today’s competitive market, focusing on core competencies while delegating specialized functions to experts has proven to be an unbeatable recipe for success. Reliasourcing emerges as the ideal partner in this endeavor, offering a compelling case for why businesses should outsource these essential services.</p>',
                image: '/temp/cs2.png',
                imageFirst: true
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Cost-Efficient',
                    description: '<p>Gain access to low-cost services without having to invest in full-time employees or costly training programs, resulting in significant savings on labor, infrastructure, and operational costs.</p>',
                    icon: '/temp/icon2.png',
                },
                {
                    title: 'Priority on Core Business Functions',
                    description: '<p>By outsourcing operational functions like sales and customer support, businesses can concentrate on what they do best—developing new products and entering new markets—and thereby accelerate their growth.</p>',
                    icon: '/temp/icon13.png',
                },
                {
                    title: 'Elevated Standard of Customer Service',
                    description: '<p>Reliasourcing focuses solely on sales and customer service, delivering high-quality support to customers that leads to improved customer satisfaction and loyalty.</p>',
                    icon: '/temp/icon13.png',
                },
                {
                    title: 'Scalability',
                    description: '<p>Reliasourcing offers scalable solutions as business needs evolve, ensuring efficient resource allocation, even during peak seasons.</p>',
                    icon: '/temp/icon1.png',
                },
                {
                    title: 'Access to Dedicated Teams',
                    description: '<p>Reliasourcing’s team is more than just a service provider; they are an extension of your company. We guarantee a seamless and exceptional service experience with our unwavering commitment and unrivaled expertise.</p>',
                    icon: '/temp/icon4.png',
                },
                {
                    title: 'Around-the-Clock Availability',
                    description: '<p>Customers expect 24-hour support, and with Reliasourcing’s help, you can gain access to a global talent pool that can handle customer inquiries at any time, resulting in increased customer retention and loyalty.</p>',
                    icon: '/temp/icon14.png',
                },
            ]"
        />

        <image-text-frame 
            :item="{
                image: '/temp/solution2.png',
                title: 'Access Top Talent and Streamline Your Workforce with Reliasourcing',
                description: '<p>Broaden your reach, increase productivity, and focus more on your core responsibilities when you outsource your staff leasing operations to us. <br><br>Reliasourcing is dedicated to developing a tailor-made plan that meets your requirements so that you only pay for the services you use. Get in touch with us right away to get things going.</p>',
                buttonText: 'Outsource with Us',
                buttonLink: '/#contact-us'
            }"
        />

        <generic-block 
            class="pt-20 pb-10"
            :item="{
                title: '<b>Sales</b> and <b>Customer Support</b> Specializations',
                description: '<p>Use the power of outsourcing services to your advantage. Take a closer look at what we can offer under our ICT and Creative Services and see what solutions best meet your needs.</p>',
                image: '/temp/cs3.png',
            }"
        />

        <specialty-block 
            class="pb-20 z-[2] relative"
            :items="[
                { 
                    title: 'Sales Development Representative Services', 
                    description: '<p>Help your business thrive. Use Reliasourcing’s sales development representative (SDR) services to reach your full expansion potential. Expert salespeople who seek out and cultivate new business opportunities for their company are the focus of these services. In the early stages of the sales funnel, SDRs qualify and nurture leads before passing them on to account executives or other sales team members.</p>',
                    image: '/temp/laptop.png',
                },
                { 
                    title: 'Social Media Management', 
                    description: '<p>Harness the power of social media with Reliasourcing’s comprehensive social media management services. Whether you need assistance with developing a strategy to expand your business or creating eye-catching visuals, we are here to help. We create engaging content, foster brand loyalty, and drive customer engagement. With our solutions, companies can enhance their online presence, build brand credibility, and tap into a vast digital audience to boost sales and customer loyalty.</p>',
                    image: '/temp/iso7.png',
                },
                { 
                    title: 'Sales Team Services', 
                    description: '<p>Propel sales and hit target numbers.Reliasourcing provides a full suite of sales team services, from lead generation, sales development, market research and strategy, to revenue optimization. We equip your sales force with the tools, training, and support needed for success. With this, businesses benefit from increased productivity, higher sales performance, and a streamlined sales process that maximizes revenue. Besides that, outsourcing sales functions frees up resources for other crucial areas, allowing businesses to concentrate on their core competencies and strategic initiatives.</p>',
                    image: '/temp/iso8.png',
                },
                { 
                    title: 'Customer Service', 
                    description: '<p>Businesses that want to ensure the quality of their customer service must employ an outsourcing provider with a good reputation. That’s why, at Reliasourcing, we offer 24/7 support, resolving issues promptly and ensuring exceptional customer experiences. Our world-class operations let companies see increased revenue and profits as a result of satisfied customers, lower churn rates, and positive brand perceptions.</p>',
                    image: '/temp/iso9.png',
                },
            ]"
        />

        <contact-frame class="pb-10" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>