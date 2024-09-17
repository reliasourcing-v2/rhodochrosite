<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/solution1.png',
                title: '<h1>High-Quality<br>Managed Services</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Cut down costs, increase profit, and<br>grow your business without hassle.</h4>',
                description: '<p>Prioritize your company’s core competencies while simultaneously reducing costs, maximizing revenue, and dedicating your efforts to business growth by leveraging Reliasourcing’s managed services.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Why Should You Get <b>Managed</b> <b>Services</b> from Reliasourcing?',
                description: '<p>Outsourcing managed services can provide companies access to specialized knowledge they may lack internally. At Reliasourcing, we spare our customers the expense of hiring new employees to complete their projects. Our outsourced managed services free up our client’s internal resources to concentrate on strategic priorities.<br><br>Let’s take a closer look at why outsourcing managed services is a good idea:</p>',
                image: '/temp/image1.png',
                imageFirst: true
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Reduced Expenses',
                    description: '<p>It’s more cost-effective to outsource IT to a managed services provider than to build an in-house team, especially in scarce skill sets like cybersecurity. Compared to hiring an IT expert to work in-house, the cost savings managed services outsourcing providers offer are substantial. Replacing your on-premises hardware with cloud services from a managed service provider will help you cut costs.</p>',
                    icon: '/temp/icon2.png',
                },
                {
                    title: 'Ability to Tap Into Unique Resources',
                    description: '<p>Managed service outsourcing provides access to resources and knowledge that would otherwise be unavailable. The fact that most businesses struggle to find qualified talent makes these tools all the more crucial. If, for instance, you’re having trouble hiring IT professionals for your company, managed services are the way to go. Data backups, network management, and even networking security and administration are tasks the best outsourcing solutions can handle for your business.</p>',
                    icon: '/temp/icon1.png',
                },
                {
                    title: 'Flexible and Scalable Tools',
                    description: '<p>Managed service providers typically offer cybersecurity and product-specific support to their clientele. However, most of these service providers also recognize the value of adaptability when designing options to meet your requirements and the ever-evolving demands of your business. Reliasourcing provides adaptable and scalable resources to help your business keep up with the demands of today’s ever-changing markets and strategic objectives. Companies undergoing a rapid digital transformation or those scaling up in response to cybersecurity threats, can especially benefit from this service.</p>',
                    icon: '/temp/icon3.png',
                },
                {
                    title: 'Relieved Pressure',
                    description: '<p>By outsourcing managed services, your team can devote more time and energy to higher-priority tasks and strategic endeavors. Outsourced managed services allow technical teams to focus on innovation and business growth without worrying about essential operations. Furthermore, outsourcing intricate processes, such as cybersecurity, enhances competitiveness, streamlines operations, and boosts overall productivity.</p>',
                    icon: '/temp/icon4.png',
                },
                {
                    title: 'Continuous Service and Upkeep',
                    description: '<p>Support and upkeep for the delegated tasks are typically available around the clock from managed service providers like Reliasourcing. This guarantees that companies can always reach out for technical support, reducing the likelihood of downtime and other disruptions. Outsourced managed services’ ongoing support can also significantly increase the dependability and accessibility of crucial systems and services.</p>',
                    icon: '/temp/icon5.png',
                },
                {
                    title: 'Lessened Risk',
                    description: '<p>Outsourcing management functions reduce vulnerability. To deal with ever-evolving compliance regulations and security threats, Reliasourcing offers tailored risk mitigation and management services. We take care of the intricacies of regulatory compliance by performing routine audits of your systems and processes.</p>',
                    icon: '/temp/icon6.png',
                },
            ]"
        />

        <image-text-frame 
            :item="{
                image: '/temp/solution2.png',
                title: 'Handle Daily Operations Effortlessly with Reliasourcing',
                description: '<p>Discover the impact of outsourced managed services today. Allow your team to concentrate on your company’s core competencies while we handle day-to-day operations.<br><br>At Reliasourcing, we recognize that every industry is unique. Because of this, we are dedicated to crafting a managed services approach tailor-made only for you. Get in touch with us today to get started.</p>',
                buttonText: 'Outsource with Us',
                buttonLink: '/#contact-us'
            }"
        />

        <contact-frame class="py-10" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>