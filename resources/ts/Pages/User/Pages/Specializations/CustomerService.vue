<template>
    <user-layout>

        <!-- General Banner -->
        <general-banner 
            :item="{
                image: '/temp/sale1.png',
                title: '<h1>Efficient Customer<br>Service Solutions</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Handle Customer Service Without<br>Hassle Through Outsourced Solutions</h4>',
                description: '<p>Embrace the future of customer service with outsourced customer service solutions. With this dynamic partnership, businesses leverage external experts to handle customer support with finesse. This empowers companies to focus on their core strengths while entrusting top-tier customer service to a dedicated ally.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Take <b>Customer</b> <b>Satisfaction</b> to the Next Level with our<br>Services',
                description: '<p>Discover comprehensive customer service solutions, from live chat support to social media services. Elevate customer satisfaction and build loyalty today!</p>',
                image: '/temp/sale2.png',
                imageFirst: true
            }"
        />

        <offer-block 
            :items="[
                {
                    title: 'Email and Phone Support',
                    description: '<p>Step into the realm of traditional yet effective customer service. We offer phone support, where customers can engage with live representatives to tackle their queries, and email support for those who prefer written communication or need to provide detailed information.</p>',
                    image: '/temp/spec5.png',
                },
                {
                    title: 'Live Chat Support',
                    description: '<p>Experience real-time assistance through our live chat support feature right on your website. Reduce wait times and bypass phone queues as customers engage with our support representatives, ensuring fast and efficient support.</p>',
                    image: '/temp/spec6.png',
                    accent: true
                },
                {
                    title: 'Self Service',
                    description: '<p>Empower your customers with the knowledge and tools they need. Our self-service options, including knowledge bases and FAQs, allow your clients to find answers independently. Ideal for those who prefer a DIY approach to problem-solving.</p>',
                    image: '/temp/spec7.png',
                    accent: true
                },
                {
                    title: 'Social Media Services',
                    description: '<p>Meet your customers where they are—on social media. Our social media support on platforms like Twitter, Facebook, and Instagram is designed for those who prefer this communication mode or want to share their feedback and concerns publicly.</p>',
                    image: '/temp/spec8.png',
                },
            ]"
        />


        <generic-block 
            class="pt-20 pb-10 bg-primary-50"
            :item="{
                title: 'Benefits of Outsourced<br>Customer Service',
                description: '<p>There are many reasons why businesses should consider outsourcing their customer service departments. Here are some of them:</p>',
                image: '/temp/sale3.png',
            }"
        />

        <specialty-block 
            class="pb-20 z-[2] relative bg-primary-50"
            :items="[
                { 
                    title: 'Focus on Core Business Functions', 
                    description: '<p>By entrusting customer service to dedicated experts, companies can direct their energies towards core business functions like product development, marketing, and sales. This newfound focus fosters efficiency and productivity, ultimately fueling growth and profitability.</p>',
                    image: '/temp/laptop.png',
                },
                { 
                    title: 'Scalability', 
                    description: '<p>Outsourced customer service services are incredibly adaptable. They can swiftly expand or contract to match your ever-changing business needs. This agility is especially advantageous for companies facing demand fluctuations or running seasonal operations.</p>',
                    image: '/temp/iso12.png',
                },
                { 
                    title: 'Cost Savings', 
                    description: '<p>Reliasourcing uses scale economies and specialized knowledge to provide better customer service at lower costs. That means less money spent on things like salaries, benefits, training, and equipment, among other things.</p>',
                    image: '/temp/iso13.png',
                },
                { 
                    title: 'Improved Customer Service Quality', 
                    description: '<p>When you choose ReliaSourcing as your outsourcing partner, you gain access to a reputable provider. Our outsourcing experts offer a wide range of customized customer service services to meet your company’s exact needs. This meticulous attention to detail ensures that top-tier customer support is delivered, elevating your brand’s reputation and increasing customer satisfaction.</p>',
                    image: '/temp/iso14.png',
                },
            ]"
        />
    </user-layout>
</template>
<script lang="ts" setup>
</script>