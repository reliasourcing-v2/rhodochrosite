<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/solution1.png',
                title: '<h1>Out-Of-The-Box<br>Crowdsourcing </h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Experience agile, cost-effective,<br>crowd-driven solutions with<br>Reliasourcing’s outsourced<br>crowdsourcing services.</h4>',
                description: '<p>outsourced crowdsourcing services.<br>Accomplish your goals and expand your business with our outsourced crowdsourcing solutions. Using our service will help your company save time and money while taking advantage of the diverse ideas and abilities of people from all over the world. </p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Why Get Crowdsourcing from<br>Reliasourcing?',
                description: '<p>Crowdsourcing has emerged as a powerful tool businesses can use to solve problems, generate new ideas, and boost growth. Through crowdsourcing, many minds can contribute their ideas to solve complex issues. Due to the importance of constant innovation and flexibility in today’s business climate, crowdsourcing has become increasingly popular. With this system, Reliasourcing can provide a one-of-a-kind service that uses the expertise of many people.<br><br>Here are other reasons you should consider crowdsourcing from Reliasourcing:</p>',
                image: '/temp/image1.png',
                imageFirst: true
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Ready-to-Use Infrastructure',
                    description: '<p>Outsourcing companies offer fully equipped workspaces with modern infrastructure and amenities. At Reliasourcing, we set up and maintain these workspaces, ensuring you have a hassle-free experience. We provide workspaces with high-speed internet connectivity, tech support, and other necessary facilities. This allows businesses like yours to get up and running quickly, with little to no time spent on setup and installation.</p>',
                    icon: '/temp/icon1.png',
                },
                {
                    title: 'Economical',
                    description: '<p>Seat leasing from outsourcing companies can result in significant cost savings for businesses. Companies can use the outsourcing partner’s infrastructure rather than spending money on new office space, furniture, equipment, and utilities. This reduces initial capital expenditures and ongoing maintenance costs, allowing businesses to allocate resources strategically. By choosing seat leasing instead of purchasing office space outright, companies can reallocate funds to more strategically essential uses.</p>',
                    icon: '/temp/icon2.png',
                },
                {
                    title: 'Specialized Expertise Access',
                    description: '<p>Reliasourcing has a vast pool of professionals with diverse skills and expertise. Your business gains access to this talent pool by partnering with us for seat leasing. This is particularly useful for companies entering new markets or using specialized knowledge. We can provide access to professionals with the necessary skills and experience, enabling businesses to enhance their capabilities and deliver high-quality results.</p>',
                    icon: '/temp/icon3.png',
                },
                {
                    title: 'Scalable Operations',
                    description: '<p>Seat leasing from outsourcing providers allows businesses to expand their operations quickly. Companies don’t have to make any long-term commitments and can easily adjust the number of leased seats to meet their fluctuating demands. Because of this adaptability, businesses can meet the needs of individual projects, customers, and seasonal fluctuations. Seat leasing also gives companies the flexibility and scalability to meet market demands.</p>',
                    icon: '/temp/icon4.png',
                },
                {
                    title: 'Geographic Flexibility',
                    description: '<p>Outsourcing companies often have multiple locations and flexible seat leasing options. This decentralization of operations eliminates the need for physically located branch offices, enabling companies to expand into new markets. It’s an excellent way for businesses to tap into new talent pools and grow without sacrificing efficiency or their ability to scale.</p>',
                    icon: '/temp/icon5.png',
                },
                {
                    title: 'Streamlined Operations',
                    description: '<p>Seat leasing from outsourcing companies simplifies business operations. At Reliasourcing, we take care of the behind-the-scenes work, so you don’t have to. By offloading these non-core functions, your business can focus on core activities and strategic initiatives. We make sure that everything runs smoothly in your day-to-day operations, allowing you to maximize efficiency and productivity.</p>',
                    icon: '/temp/icon6.png',
                },
                {
                    title: 'Enhanced Business Focus',
                    description: '<p>Seat leasing frees up resources so companies can focus on what they do best and where they will see the most growth. Working with Reliasourcing, businesses can outsource specialized tasks like facility management, IT support, and administrative work to qualified professionals. This shift in focus lets firms focus on revenue generation, innovation, and customer satisfaction. In the long run, this improves business results and gives you an edge in the market.</p>',
                    icon: '/temp/icon7.png',
                },
            ]"
        />

        <image-text-frame 
            :item="{
                image: '/temp/solution2.png',
                title: 'Access Top Talent and Streamline Your Workforce with Reliasourcing',
                description: '<p>Broaden your reach, increase productivity, and focus more on your core responsibilities when you outsource your staff leasing operations to us.<br><br>Reliasourcing is dedicated to developing a tailor-made plan that meets your requirements so that you only pay for the services you use. Get in touch with us right away to get things going.</p>',
                buttonText: 'Outsource with Us',
                buttonLink: '/#contact-us'
            }"
        />

        <contact-frame class="py-10" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>