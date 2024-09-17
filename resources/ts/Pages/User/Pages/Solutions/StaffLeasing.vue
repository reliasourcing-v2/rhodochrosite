<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/staff1.png',
                title: '<h1>Seamless Staff<br>Leasing Solutions</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Flexible solutions for scalable staffing<br>needs.</h4>',
                description: '<p>Scale your team without diverting attention from your primary goals with Reliasourcing’s staff leasing solutions. We take care of all the administrative details, including hiring, payroll, and benefits, so you can focus on running your business.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Why Choose Reliasourcing<br>for Staff Leasing Solutions?',
                description: '<p>Companies in today’s highly competitive market always look for new ways to improve their processes and cut expenses without sacrificing quality. Leasing employees from outsourcing companies is one strategy that has gained traction recently. Tapping into external talent and resources through staff leasing allows businesses to concentrate on what they do best. Prepare to explore the key benefits of staff leasing and why companies like yours should consider outsourcing a viable option:</p>',
                image: '/temp/staff2.png',
                imageFirst: true
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Operational Flexibility',
                    description: '<p>Staff leasing provides the adaptability and scalability businesses require as workloads and needs evolve. With the help of staff leasing, businesses can easily adjust their workforce size to meet fluctuating demand. Companies can quickly adapt to changes in the market, seasonal requests, or project-specific requirements without going through the time-consuming and costly processes of hiring and letting go of employees. Leasing personnel also allows businesses to maintain flexibility, efficiency, and sensitivity to customer needs.</p>',
                    icon: '/temp/icon1.png',
                },
                {
                    title: 'Cost-Efficient',
                    description: '<p>Staff leasing is attractive to businesses because it can help them reduce costs. By outsourcing to an external provider, companies eliminate the expenses associated with recruitment, onboarding, training, and maintaining a full-time workforce. Reliasourcing can take on these responsibilities, reducing overhead costs such as employee benefits, office space, and equipment. This allows you to allocate resources more efficiently and invest in strategic growth areas.</p>',
                    icon: '/temp/icon1.png',
                },
                {
                    title: 'Advanced Technology Availability',
                    description: '<p>To stay competitive, outsourcing firms frequently upgrade to newer technologies and equipment. Staff leasing allows businesses to use cutting-edge tools without significant financial commitments. Access to advanced technology helps companies to improve operations, streamline procedures, anticipate market shifts, and fuel innovation and expansion.</p>',
                    icon: '/temp/icon3.png',
                },
                {
                    title: 'Expert Access',
                    description: '<p>Today’s business world is complex and constantly changing, making specialized skills increasingly crucial for success. Leasing employees gives businesses access to skilled workers with varied backgrounds and areas of expertise. Whether IT, marketing, customer service, or finance, Reliasourcing can connect businesses with professionals with the necessary skills and knowledge to deliver exceptional results. This access to specialized talent significantly enhances the organization’s productivity, quality, and innovation.</p>',
                    icon: '/temp/icon4.png',
                },
                {
                    title: 'Better Employee Work-Life Balance',
                    description: '<p>Besides multiple channel availability, customer support should be available whenever your customers need it. Outsourcing your call center operations allows you to offer round-the-clock availability, including weekends and holidays. With Reliasourcing’s shift and schedule management capabilities, customers will always get prompt service. This level of accessibility boosts customer trust, loyalty, and satisfaction.</p>',
                    icon: '/temp/icon5.png',
                },
                {
                    title: 'Core Function Focus',
                    description: '<p>Outsourcing non-core functions allows companies to focus on what they do best and improve their competitive edge. Leasing staff enables businesses to outsource administrative tasks to industry professionals, freeing up internal resources for more important endeavors. This strategic focus enables enterprises to innovate, improve their products or services, and gain a competitive advantage in their industry.</p>',
                    icon: '/temp/icon6.png',
                },
                {
                    title: 'Global Talent Reach',
                    description: '<p>Leasing employees is an excellent way for companies to access international talent as they grow or enter new markets. Since many outsourcing firms operate globally, their clients can draw talent from around the world. With this reach, you don’t have to establish shops in different countries, deal with other legal systems, or handle international employment regulations.</p>',
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