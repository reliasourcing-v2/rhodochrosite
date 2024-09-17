<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/solution1.png',
                title: '<h1>Call Center<br>Solutions That Work</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Seat leasing services tailored for<br>every business.</h4>',
                description: '<p>Unlock the perfect workspace, increase productivity, and reach your full potential with Reliasourcing’s flexible seat leasing service. From fully equipped workstations to flexible terms and comprehensive support, we have everything you need to optimize your business operations.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Why Should You Seat Lease from Reliasourcing?',
                description: '<p>Businesses are always looking for new ways to improve efficiency and effectiveness. Seat leasing through outsourcing companies is one way to achieve these. This method provides businesses with a versatile and inexpensive means of protecting their physical space and supporting infrastructure, freeing them to concentrate on their core competencies and fueling their expansion.<br><br>In addition, seat leasing can benefit your company in the following ways:</p>',
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
                title: 'Secure Your Ideal Workspace with Reliasourcing',
                description: '<p>Discover the power of seat leasing today. Let us handle the workspace and infrastructure while you focus on your core businesses.<br>At Reliasourcing, we understand that every business is unique. For this reason, we are committed to developing a personalized seat leasing strategy that answers your needs. Say goodbye to unnecessary costs and hello to unparalleled flexibility. Get in touch with us today, and together we’ll design a seat leasing solution tailored just for you.</p>',
                buttonText: 'Outsource with Us',
                buttonLink: '/#contact-us'
            }"
        />

        <contact-frame class="py-10" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>