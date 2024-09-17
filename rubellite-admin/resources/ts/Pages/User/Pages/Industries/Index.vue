<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/industry1.png',
                title: '<h1>Industries</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Industries We Focus On</h4>',
                description: '<p>With Reliasourcing, you get the benefits of a reliable onsite team that fits your company’s culture and understands your business goals. We free your mind from the stresses of the hiring process and find the perfect fit for your company. Reliasourcing handles everything from hiring, training, and developing your sales agents so you can focus on the core of your business.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Industries We <b>Focus</b> On',
                description: '<p>Hiring the right person at the right time is frequently essential to business innovation and growth. Discover the industries we focus on to see how our services can help your venture succeed.</p>',
                image: '/temp/industry2.png',
                imageFirst: true
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Information Technology',
                    description: '<p>Acquire a broader range of technical skills and expertise when you partner with Reliasourcing. We offer various services, including software development, upkeep, and testing. Aside from that, we provide omnichannel and tier 1-3 technical support. By outsourcing these services, you can cut costs, make your business more efficient, and focus on what you do best.</p>',
                    icon: '/temp/icon7.png',
                },
                {
                    title: 'E-commerce',
                    description: '<p>Maintain your composure in the face of high customer expectations, global distribution, and fulfillment costs for your expanding e-commerce business. With Reliasourcing, you can focus on the core processes while we handle the e-commerce details. Our company provides website development, online marketing, sales optimization, customer service, order processing, and fulfillment services. Working with an outsourcing solution to take care of these duties will free you up to concentrate more on product development and expanding market reach.</p>',
                    icon: '/temp/icon8.png',
                },
                {
                    title: 'Financial Technology',
                    description: '<p>Boost productivity, increase sales, and focus on core competencies with our fintech services. Reliasourcing offers fintech services, including software development, data management, and compliance management.  By outsourcing fintech services, businesses can reduce costs, improve efficiency, access specialized expertise, and keep up with fintech’s rapidly changing regulatory and technological landscape.</p>',
                    icon: '/temp/icon2.png',
                },
                {
                    title: 'Accounting',
                    description: '<p>Lighten your load and acquire a strategic resource to help you stay ahead of the competition with our accounting services. At Reliasourcing, we can provide back-office services such as general accounting, invoicing, accounts payable, accounts receivable, and financial reporting. Outsourcing these services to us will let you concentrate on more important duties to expand your business.</p>',
                    icon: '/temp/icon9.png',
                },
                {
                    title: 'Hospitality',
                    description: '<p>Stay ahead of the hospitality industry with our excellent hotel management, food and beverage services, event planning, marketing and sales services, and customer service. Outsourcing these responsibilities to us reduces costs and improves operational efficiency, allowing you to focus on giving guests the best experience.</p>',
                    icon: '/temp/icon6.png',
                },
                {
                    title: 'Telecommunications',
                    description: '<p>Experience a high-quality and performance-driven service with our telecommunications outsourcing services. Reliasourcing can provide top-notch teams of telemarketers, telecom researchers, network designers and managers, and technical support specialists. Outsourcing telecommunications roles allows your onshore team to do more value-added work, growing your business.</p>',
                    icon: '/temp/icon5.png',
                },
                {
                    title: 'Healthcare',
                    description: '<p>Streamline operations efficiently with the help of Reliasourcing’s healthcare outsourcing services. We improve our partners’ operations by providing medical billing and coding, patient scheduling, and transcription services. Outsourcing these services allows healthcare providers to improve operational efficiency, reduce costs, and focus on providing high-quality patient care.</p>',
                    icon: '/temp/icon10.png',
                },
                {
                    title: 'Media',
                    description: '<p>Produce cutting-edge media content and help your business thrive in a competitive industry. Our media outsourcing services cover various tasks, including content creation, video production, social media management, marketing, and advertising. By outsourcing these functions, media businesses like yours can reduce expenses, streamline their operations, and concentrate on producing excellent content.</p>',
                    icon: '/temp/icon20.png',
                },
                {
                    title: 'Utilities',
                    description: '<p>Get access to specialized services and stay ahead of the competition with our utility outsourcing services. At Realiasourcing, we can offer tailor-made solutions that work best for your business. We can assemble a group of specialists to oversee crucial facets of your business, like network administration, customer service, tech support, and software creation and upkeep. This way, you’ll be more devoted to moving your company forward.</p>',
                    icon: '/temp/icon12.png',
                },
            ]"
        />

        <image-text-frame 
            :item="{
                image: '/temp/solution2.png',
                title: 'Why Choose Reliasourcing?',
                description: '<p>Reliasourcing goes above and beyond merely catering to your unique requirements. With our stellar specializations, we will help you move your business forward strategically and efficiently.</p><br><p>Outsourcing specialized services can offer many benefits to businesses, including:</p><ul><li>Tailor-made solutions</li><li>Cost-efficient operations</li><li>Access to specialized experts</li><li>Greater flexibility and scalability</li><li>Better customer experience</li></ul>',
                buttonText: 'Outsource with Us',
                buttonLink: '/#contact-us'
            }"
        />

        <contact-frame class="py-10" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>