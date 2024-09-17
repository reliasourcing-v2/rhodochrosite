<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/team1.png',
                title: '<h1>About Our Team</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Who Are We?</h4>',
                description: '<p>With Reliasourcing, you get the benefits of a reliable onsite team that fits your company’s culture and understands your business goals. We free your mind from the stresses of the hiring process and find the perfect fit for your company. Reliasourcing handles everything from hiring, training, and developing your sales agents so you can focus on the core of your business.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Our <b>Goals</b>',
                description: '<p>Let Reliasourcing unburden your mind, allowing you to concentrate on your core business while we take care of everything else. Here’s how we can do it for you:</p>',
                image: '/temp/team2.png',
                imageFirst: true
            }"
        />

        <offer-block 
            :items="[
                {
                    title: 'Service Oriented',
                    description: '<p>Our team is dedicated to delivering exceptional services tailored to your company’s needs. With specialized training, we ensure that your requirements are thoroughly understood and met with the utmost precision.</p>',
                    image: '/temp/specialization2.png',
                },
                {
                    title: 'Bespoke Solutions',
                    description: '<p>Whether you’re aiming to enhance a specific facet of your operations or require a comprehensive business transformation, our team will closely collaborate with you to craft a bespoke solution that aligns precisely with your distinct needs and objectives.</p>',
                    image: '/temp/specialization3.png',
                    accent: true
                },
                {
                    title: 'Expert Access',
                    description: '<p>Our team of experienced professionals leverages cutting-edge analytics and state-of-the-art data visualization tools to meticulously collect, process, and analyze vast volumes of data. We transform this wealth of information into actionable insights that empower our clients to enhance their operations, optimize performance, and make informed decisions of the highest priority.</p>',
                    image: '/temp/spec9.png',
                    accent: true
                },
                {
                    title: 'Responsive',
                    description: '<p>We are dedicated to upholding the best industry standards for service level agreements (SLAs). Our team of experts carefully establishes measurable and transparent SLAs, diligently monitoring and addressing any emerging issues to ensure exceptional service delivery.</p>',
                    image: '/temp/specialization5.png',
                },
            ]"
        />

        <text-with-map 
            :item="{
                title: 'Why the <b>Philippines?</b>',
                description: '<p>With a skilled workforce and thriving infrastructure, the Philippines sits at the center of BPO success. Reliasourcing is located in the heart of Manila, giving it a unique vantage point to keep up with the latest trends and developments in the business world.</p>',
                image: '/temp/ph-map.png',
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Language',
                    description: '<p>The Philippines is one of the most English proficient countries in Asia second only to Singapore, with a proficiency matching the Netherlands. In terms of size, they are the third largest English speaking country in the world.<br><br>The BPO industry contributes significantly to the economy and enjoys special benefits from the government.</p>',
                    icon: '/temp/icon21.png',
                },
                {
                    title: 'Talent',
                    description: '<p>There are 450,000 college graduates in the Philippines annually. Compared to other countries, the pool of ready, skilled, and willing talent is much larger compared to other countries.<br><br>The BPO industry contributes significantly to the economy and enjoys special benefits from the government.</p>',
                    icon: '/temp/icon22.png',
                },
                {
                    title: 'Demographics',
                    description: '<p>The Philippines has a fairly young population with a mean age of 23. That makes the workforce fairly young, and extremely comfortable with technology. It is also a famously empathic and hospitable culture making them ideal for support and customer service roles.</p>',
                    icon: '/temp/icon24.png',
                },
                {
                    title: 'Culture',
                    description: '<p>Being both a former American Colony, the Philippine culture is very westernized. The familiarity with American general information and pop culture is very high creating very few cultural differences specifically between the US and Canada. Australians have also found the country a ripe opportunity recently with several Australian businesses setting up shop in the country.</p>',
                    icon: '/temp/icon23.png',
                },
                {
                    title: 'Cost',
                    description: '<p>The cost of operating in the Philippines can be anywhere from 40% to 60% lower than having captive talent. This is due to the relatively low cost of living and cost of labor.</p>',
                    icon: '/temp/icon25.png',
                },
                
            ]"
        />

        <team-frame 
            title1="Our Leaders"
            title2="Our Team"
            :items="[
                {
                    name: 'Yorak Ofek',
                    position: 'Managing Partner',
                    bg: '/temp/teamiso1.png',
                    image: '/temp/member1.png',
                    linkedin: 'https://www.linkedin.com/in/yoray-ofek-/'
                },
                {
                    name: 'Amir  Borsok',
                    position: 'Head of Business Development',
                    bg: '/temp/teamiso2.png',
                    image: '/temp/member2.png',
                    linkedin: 'https://www.linkedin.com/in/amirborsok/'
                },
                {
                    name: 'Lendy Rivera',
                    position: 'Director of HR',
                    bg: '/temp/teamiso3.png',
                    image: '/temp/member3.png',
                    linkedin: 'https://www.linkedin.com/in/lendy-rivera-32bb2511b/'
                },
                {
                    name: 'Jerome Calla',
                    position: 'Head of IT',
                    bg: '/temp/teamiso4.png',
                    image: '/temp/member4.png',
                    linkedin: 'https://www.linkedin.com/in/henie-langbayan-49573411b/'
                },
                {
                    name: 'Eugenia Langbayan',
                    position: 'Head of Operations',
                    bg: '/temp/teamiso5.png',
                    image: '/temp/member5.png',
                    linkedin: 'https://www.linkedin.com/in/jerome-calla-678475150/'
                },
            ]"
        />


        <contact-frame class="py-10 bg-primary-50" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>