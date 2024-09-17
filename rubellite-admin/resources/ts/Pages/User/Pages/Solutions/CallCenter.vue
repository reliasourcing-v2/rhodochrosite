<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/contact-center1.png',
                title: '<h1>Contact Center<br>Solutions That Work</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Streamlined customer service, outsourced for success.</h4>',
                description: '<p>Elevate your customer experience with Reliasourcing’s call center outsourcing solutions. We handle call center operations such as customer service, sales, lead generation, and technical support so you can put your attention where it belongs: achieving company growth.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Why <b>Outsource</b> Your<br>Call Center Operations to<br>Reliasourcing?',
                description: '<p>Providing outstanding customer service is a powerful differentiator in today’s ever-changing and fast-paced business environment. However, managing an in-house call center can be time-consuming and labor-intensive, diverting resources from other business areas and limiting growth potential.<br><br>This is where call center outsourcing comes into play. Outsourcing your call center operations can unlock many benefits that elevate your business and propel it toward success. Here are some of them:</p>',
                image: '/temp/contact-center2.png',
                imageFirst: true
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Market Expansion and Increased Customer Reach',
                    description: '<p>Outsourcing call center operations offers the advantage of a larger workforce and presents a unique opportunity for market expansion. With multilingual operations, for instance, your business can effectively cater to diverse clients, expanding its customer reach and operating round-the-clock to accommodate different time zones.</p>',
                    icon: '/temp/icon1.png',
                },
                {
                    title: 'Cost-reduction',
                    description: '<p>It takes a great deal of investment to set up and run an in-house call center, from the initial construction to the computers and phones to the employees and their salaries and benefits. With Reliasourcing, you can avoid these expenses while gaining access to a more affordable solution from your service provider. This enables you to optimize your budget, strategically allocate resources, and achieve greater financial efficiency.</p>',
                    icon: '/temp/icon2.png',
                },
                {
                    title: 'Scalability and Flexibility',
                    description: '<p>Companies often experience spikes and drops in call volume due to seasonality, marketing, and product launches. Managing these fluctuations in-house can be difficult, leading to longer wait times, more frustrated customers, and lower customer satisfaction. Call centers can benefit from the scalability and adaptability offered by outsourcing companies. Reliasourcing allows you to easily adjust your staffing levels in response to fluctuations in call volume, ensuring that your customers’ inquiries are always handled promptly and thoroughly.</p>',
                    icon: '/temp/icon3.png',
                },
                {
                    title: 'Better Customer Experience',
                    description: '<p>Outsourcing partners are committed to delivering exceptional customer experiences. With a dedicated team of trained agents, advanced technologies, and streamlined processes, Reliasourcing handles customer inquiries efficiently and effectively. This leads to higher customer satisfaction, increased loyalty, positive word-of-mouth, and an improved brand reputation.</p>',
                    icon: '/temp/icon4.png',
                },
                {
                    title: '24/7 Availability',
                    description: '<p>Besides multiple channel availability, customer support should be available whenever your customers need it. Outsourcing your call center operations allows you to offer round-the-clock availability, including weekends and holidays. With Reliasourcing’s shift and schedule management capabilities, customers will always get prompt service. This level of accessibility boosts customer trust, loyalty, and satisfaction.</p>',
                    icon: '/temp/icon5.png',
                },
                {
                    title: 'Omnichannel Support',
                    description: '<p>Customers anticipate consistent service across all channels in today’s highly connected world. Whether via phone, email, live chat, or social media, Reliasourcing is prepared to handle customer inquiries. This ensures that customers communicate with your company conveniently, improving the quality of their experience.</p>',
                    icon: '/temp/icon6.png',
                },
                {
                    title: 'Increased Employee Satisfaction',
                    description: '<p>Within a call center setting, employees collaborate towards shared objectives, maintain open lines of communication, and have manageable workloads. The presence of additional staff through call center outsourcing often leads to more productive and efficient workdays for in-house employees. With the support of call center outsourcing, employees gain confidence in their roles and recognize the overall value they bring to the business. This creates opportunities for employees to apply their skills beyond the office environment, fostering personal growth, boosting morale, and enhancing job satisfaction.</p>',
                    icon: '/temp/icon7.png',
                },
            ]"
        />

        <image-text-frame 
            :item="{
                image: '/temp/solution2.png',
                title: 'Deliver Excellent Customer Support with Reliasourcing',
                description: '<p>Prepare to deliver exceptional customer service, accomplish your business objectives, and soar to new heights of success with our assistance.<br><br>Reliasourcing is committed to maintaining flexibility in our service offerings. We’re committed to creating a bespoke plan that meets your specific needs, so you only pay for what you require. Reach out to us today to begin the process.</p>',
                buttonText: 'Outsource with Us',
                buttonLink: '/#contact-us'
            }"
        />

        <contact-frame class="py-10" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>