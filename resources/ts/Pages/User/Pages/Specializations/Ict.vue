<template>
    <user-layout>

        <!-- General Banner -->
        <general-banner 
            :item="{
                image: '/temp/creative1.png',
                title: '<h1>Top-Notch Creative<br>Services</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Innovative ICT and creative<br>outsourcing services for next-level<br>excellence.</h4>',
                description: '<p>Leverage the power of technology to optimize your business functions and make your venture more profitable with Reliasourcing’s ICT and creative outsourcing solutions.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Why <b>Outsource ICT</b><br>and <b>Creative Services</b><br>to Reliasourcing?',
                description: '<p>Information and communication technology (ICT) and creative services are two key areas where outsourcing is advantageous. These departments greatly influence a company’s identity, digital footprint, and innovation. This is also why companies should consider working with a company and industry expert like Reliasourcing.</p>',
                image: '/temp/creative2.png',
                imageFirst: true
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Core Function Focus',
                    description: '<p>Businesses can free up resources for more strategic pursuits by outsourcing non-essential tasks. This improves effectiveness and allows them to focus resources where they will have the most impact.</p>',
                    icon: '/temp/icon1.png',
                },
                {
                    title: 'Cost-Efficient',
                    description: '<p>Outsourcing ICT and creative services can help you save money on operations. Businesses can avoid large investments in technology, software, and skilled professionals by leveraging external expertise and infrastructure.</p>',
                    icon: '/temp/icon2.png',
                },
                {
                    title: 'Scalable Operations',
                    description: '<p>As businesses grow, their ICT and Creative needs may change. Outsourcing offers the flexibility to scale services up or down as required, ensuring that companies always have the right resources at the right time.</p>',
                    icon: '/temp/icon3.png',
                },
                {
                    title: 'Domain Expertise',
                    description: '<p>Experts in outsourcing, like Reliasourcing, can connect you with talented individuals offering various information technology and creative service options. The availability of such elite talent can potentially boost product and service development.</p>',
                    icon: '/temp/icon4.png',
                },
                {
                    title: 'Faster Market-Entry',
                    description: '<p>With outsourcing, you can finish your projects faster. By streamlining procedures and capitalizing on best practices, seasoned service providers help businesses speed up the time it takes to launch new products and services.</p>',
                    icon: '/temp/icon5.png',
                },
            ]"
        />

        <image-text-frame 
            :item="{
                image: '/temp/solution2.png',
                title: 'Leverage ICT and Creative Services with Reliasourcing',
                description: '<p>Take advantage of Reliasourcing’s ICT and creative service offerings to streamline operations, eliminate unnecessary steps, and maximize overall productivity.<br><br>Reliasourcing is committed to tailoring a solution to your needs so you only pay for what you use. Contact us right away to get things going.</p>',
                buttonText: 'Outsource with Us',
                buttonLink: '/#contact-us'
            }"
        />

        <generic-block 
            class="pt-20 pb-10"
            :item="{
                title: 'Our <b>Specialties</b>',
                description: '<p>Use the power of outsourcing services to your advantage. Take a closer look at what we can offer under our ICT and Creative Services and see what solutions best meet your needs.</p>',
                image: '/temp/creative3.png',
            }"
        />

        <specialty-block 
            class="pb-20 z-[2] relative"
            :items="[
                { 
                    title: 'Web Design', 
                    description: '<p>With our web design services, your venture gets access to experts in different specialties. And as a cost-effective solution, you get ongoing support and maintenance operations to ensure your website is always up and running.</p>',
                    image: '/temp/laptop.png',
                },
                { 
                    title: 'Web Development', 
                    description: '<p>With expert web development, you can embark on a digital journey of innovation and functionality. Streamline procedures, improve user experiences, and ensure your website works perfectly on any device. Our expertise in web development allows us to create engaging and intuitive websites for a variety of purposes, from e-commerce to informational portals.</p>',
                    image: '/temp/iso2.png',
                },
                { 
                    title: 'Software Development', 
                    description: '<p>Get the most out of your company with custom software developed to meet your specific demands. Creating an application is time-consuming and intricate, requiring careful thought, preparation, expertise, and self-discipline. Another factor is selecting a development partner, as most businesses need more in-house development expertise and resources. </p>',
                    image: '/temp/iso3.png',
                },
                { 
                    title: 'Graphic Design', 
                    description: '<p>Utilize captivating graphic design to tell stories visually to the highest degree. Engage your audience, convey your message, and create a recognizable brand that will take your business to new horizons. </p>',
                    image: '/temp/iso4.png',
                },
                { 
                    title: 'Animation', 
                    description: '<p>Use engaging animation to take your communication to the next level. Simplify complicated ideas, stimulate discussion, and give your brand a new lease on life with the help of our expert teams. Whether an explainer video or an interactive feature, Reliasourcing’s animation services breathe new life into your content, making it more engaging and likely to be shared.</p>',
                    image: '/temp/iso5.png',
                },
                { 
                    title: 'Content Creation', 
                    description: '<p>Fill your digital presence with engaging, resonant content. Our content creators produce captivating stories, detailed articles, and exciting multimedia to keep your audience interested. These strategies will raise your online profile, encourage interaction, and introduce your company as a pioneer in your field. </p>',
                    image: '/temp/iso6.png',
                },
            ]"
        />

        <contact-frame class="pb-10" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>