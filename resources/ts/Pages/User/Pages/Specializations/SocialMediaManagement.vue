<template>
    <user-layout>

        <!-- General Banner -->
        <general-banner 
            :item="{
                image: '/temp/specialization1.png',
                title: '<h1>Social Media<br>Management<br>Outsourcing Solutions</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Strengthen Your Presence with our<br>Social Media Management Services</h4>',
                description: '<p>At Reliasourcing, we place a premium on developing streamlined processes that allow your business to better concentrate on its goals and expand in the most effective ways.<br><br>Creating content for use on social media can be instrumental in increasing your business’ reach. That is why we offer social media management services. We possess the expertise to assist you in devising an impactful strategy that will propel your business to new heights. With the help of our specialists, we will manage every facet of your business’s social media presence and strategy. These services are designed to help companies take charge of their social media profiles and improve the effectiveness of their campaigns. Content and campaigns on social media sites like Facebook, Instagram, Twitter, LinkedIn, and more will be planned, developed, scheduled, monitored, and analyzed as part of these services.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: '<b>SDR Services</b> We Offer',
                description: '<p>Explore various sales development representative services, from lead generation to appointment setting, and discover how they can supercharge your sales efforts.</p>',
                image: '/temp/image1.png',
                imageFirst: true
            }"
        />

        <offer-block 
            :items="[
                {
                    title: 'Lead Generation',
                    description: '<p>Lead generation is a common area of expertise for outsourced sales teams, with various approaches used to find and qualify potential buyers for a company’s wares. With their knowledge, they can create a steady stream of sales-ready prospects.</p>',
                    image: '/temp/specialization2.png',
                },
                {
                    title: 'Sales Team Development',
                    description: '<p>SThe sales development team manages both inbound and outbound leads and sales by following up with prospects and nurturing them through the sales funnel. They engage potential customers, build relationships, and qualify leads before passing them on to closers.</p>',
                    image: '/temp/specialization3.png',
                    accent: true
                },
                {
                    title: 'Market Research and Strategy',
                    description: '<p>Our sales team services can provide in-depth market research and insights. We can help you analyze the market, competitors, and customers to find new sales opportunities and create winning sales strategies.</p>',
                    image: '/temp/specialization4.png',
                    accent: true
                },
                {
                    title: 'Revenue Optimization',
                    description: '<p>We can help you concentrate on running your company by handling all aspects of sales for you, from lead generation to closing deals and bringing in new clients. Successfully converting leads into customers is a top priority, and our teams have the experience, negotiation skills, and relationship-building tools to make it happen.</p>',
                    image: '/temp/specialization5.png',
                },
                {
                    title: 'Revenue Optimization',
                    description: '<p>We can help you concentrate on running your company by handling all aspects of sales for you, from lead generation to closing deals and bringing in new clients. Successfully converting leads into customers is a top priority, and our teams have the experience, negotiation skills, and relationship-building tools to make it happen.</p>',
                    image: '/temp/specialization5.png',
                },
                {
                    title: 'Market Research and Strategy',
                    description: '<p>Our sales team services can provide in-depth market research and insights. We can help you analyze the market, competitors, and customers to find new sales opportunities and create winning sales strategies.</p>',
                    image: '/temp/specialization4.png',
                    accent: true
                },
            ]"
        />


        <generic-block 
            class="pt-20 pb-10"
            :item="{
                title: 'Benefits of Sales Teams Services',
                description: '<p>Outsourcing your sales teams brings a multitude of advantages your way. Let’s dive into some of them:</p>',
                image: '/temp/image1.png',
            }"
        />

        <specialty-block 
            class="pb-20 z-[2] relative"
            :items="[
                { 
                    title: 'Increased Sales', 
                    description: '<p>SDRs work to increase the company’s revenue and sales by finding new prospects for the sales team to pursue.</p>',
                    image: '/temp/laptop.png',
                },
                { 
                    title: 'Efficient Sales Process', 
                    description: '<p>Lead qualification involves assessing prospects to identify the ones with the highest likelihood of converting into paying customers. This strategic process streamlines sales operations, enabling account executives to dedicate their valuable time and effort to the most promising leads, optimizing overall efficiency and effectiveness.</p>',
                    image: '/temp/iso2.png',
                },
                { 
                    title: 'Better Customer Experience', 
                    description: '<p>Discovering the pain points and needs of potential customers lays the groundwork for delivering personalized and relevant information. This not only enhances the customer experience but also boosts the chances of sealing the deal.</p>',
                    image: '/temp/iso3.png',
                },
                { 
                    title: 'Cost-Effective', 
                    description: '<p>Sales development representatives are generally more cost-effective than account executives, enabling organizations to optimize resource allocation.</p>',
                    image: '/temp/iso4.png',
                },
                { 
                    title: 'Scalable', 
                    description: '<p>Organizations can effortlessly tailor their sales efforts to align with shifting market conditions or demand fluctuations by utilizing scalable SDR services. This remarkable flexibility empowers businesses to optimize their sales strategies per their unique requirements, ensuring adaptability and continued success.</p>',
                    image: '/temp/iso5.png',
                },
            ]"
        />
    </user-layout>
</template>
<script lang="ts" setup>
</script>