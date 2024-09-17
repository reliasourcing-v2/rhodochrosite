<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/advantage1.png',
                title: '<h1>Our Unique Advantages</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Experience unique advantages when<br>you work with Reliasourcing</h4>',
                description: '<p>Reliasourcing strives to provide our clients with industry-specific expertise through performance and value. When working with clients, we tailor our approach to their needs based on their niche to ensure we deliver quality solutions.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Experience <b>unique</b> <b>advantages</b> when you work with Reliasourcing',
                description: '<p>Hiring the right person at the right time is frequently essential to business innovation and growth. Discover the industries we focus on to see how our services can help your venture succeed.</p>',
                image: '/temp/advantage2.png',
                imageFirst: true
            }"
        />

        <specialty-block 
            class="pb-20 z-[2] relative bg-primary-50"
            :items="[
                { 
                    title: 'Tailor-Made Solutions', 
                    description: '<p>With a focus on developing the best strategies, we collaborate with our clients to understand their specific needs and deliver the best outcomes. Our specialized teams offer timely performance analysis based on the results, allowing for any adjustments to your current strategies. On top of that, we provide tailor-made service bundles to ensure you only pay for what you require.</p>',
                    image: '/temp/iso11.png',
                },
                { 
                    title: 'Fast Scaling', 
                    description: '<p>Time is of the essence in business. Reliasourcing ensures that we don’t waste your time–that’s why we mastered the ability to accommodate your rapidly changing needs in terms of sizing and operation models. We are the partner to count on should you need a quicking up or downscaling. Thanks to our experience and expertise, we have the capabilities to make these changes as fast, painless, and efficiently as possible. After all, we take care of these things so you don’t have to.</p>',
                    image: '/temp/iso15.png',
                },
                { 
                    title: 'Cost Saving', 
                    description: '<p>Reliasourcing ensures that we put in the best fits for your company, minimizing any risks and disputes for your business. With us as your partner, you can save up on additional costs and direct your money towards the growth of your company.</p>',
                    image: '/temp/iso13.png',
                },
                { 
                    title: 'True Partnership', 
                    description: '<p>Reliasourcing isn’t just an outsourcing company–we’re your partners! That’s why we build trust and commitment with you. Our management team will help you grow and achieve your business goals. We focus on your success and we do what needs to be done to help you get it.</p>',
                    image: '/temp/iso9.png',
                },
                { 
                    title: 'Quality Assurance', 
                    description: '<p>Reliasourcing provides high-quality services…and we back that up with our quality assurance team as well! With a pool of the best talents onboard, we take pride in our ability to deliver the best results.</p>',
                    image: '/temp/iso16.png',
                },
                { 
                    title: 'Innovation and Insight', 
                    description: '<p>We don’t just get you to the top, we make sure that you get ahead. With our team of experts, we provide ongoing consultations for your company. We let you know the latest developments and insights on customer care and ensure that your team is always equipped with the latest knowledge on how to give the highest quality of customer service.</p>',
                    image: '/temp/iso17.png',
                },
                { 
                    title: 'State of the Art Reporting System', 
                    description: '<p>Data is the life and blood of most businesses, which is why we ensure that we have the numbers to show when you talk to us. Our systems give you a comprehensive view of your team’s performance, whether it be sales or customer service. With our state-of-the-art reporting systems, we can accurately provide you with the most pressing information and analyze the data to give you better insights and recommendations.</p>',
                    image: '/temp/iso18.png',
                },
                { 
                    title: 'New Opportunities', 
                    description: '<p>Reliasourcing is on the constant lookout for the latest ideas and strategies for your business. We help you increase your KPIs, scale-up, and find additional support models that ensure your growth and development. Our team will connect you with and make these recommendations based on your goals and objectives. </p>',
                    image: '/temp/iso19.png',
                },
                { 
                    title: 'Delivery Center for All BPO Needs', 
                    description: '<p>Who better to ensure smooth and speedy operations for call centers than experts on the field? Reliasourcing has hands-on experience and a deep understanding of call center operations, enabling us to execute fast and flawless operations in the Philippines.</p>',
                    image: '/temp/iso10.png',
                },
                
            ]"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Our <b>Approach</b>',
                description: '<p>At Reliasourcing, our approach is your roadmap to success. We believe in a dynamic and adaptable strategy that evolves with your organization’s needs. Here’s a closer look at each step:</p>',
                image: '/temp/advantage3.png',
            }"
        />

        <offer-block 
            :items="[
                {
                    title: 'Strategize',
                    description: '<p>We work closely with you to formulate a strategy that aligns seamlessly with your organizational objectives. Through comprehensive analysis and industry expertise, we develop a tailored plan designed to drive success and growth.</p>',
                    image: '/temp/specialization2.png',
                },
                {
                    title: 'Execute',
                    description: '<p>Execution is where the rubber meets the road. We put our strategies into action, meticulously implementing operations according to the established plan. Our commitment to excellence ensures that each task is carried out with precision and dedication.</p>',
                    image: '/temp/specialization3.png',
                    accent: true
                },
                {
                    title: 'Update',
                    description: '<p>Adaptability is essential in today’s dynamic business environment. We pride ourselves on our ability to swiftly adapt strategy, allocate resources, and optimize procedures based on tangible results and emerging trends. Your success remains our top priority.</p>',
                    image: '/temp/specialization4.png',
                    accent: true
                },
                {
                    title: 'Measure',
                    description: '<p>We believe in data-driven decision-making. Our real-time measurement and analysis tools provide valuable insights into performance and key performance indicators (KPIs). This enables us to make informed adjustments and continually refine our strategies for maximum efficiency and effectiveness.</p>',
                    image: '/temp/specialization5.png',
                },
            ]"
        />

        <contact-frame class="py-10 bg-primary-50" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>