<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/workforce1.png',
                title: '<h1>Unlock Efficiency<br>with Workforce</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Boost productivity and efficiency<br>through workforce management<br>outsourcing solutions.</h4>',
                description: '<p>Unlock the perfect workspace, increase productivity, and reach your full potential with Reliasourcing’s flexible seat leasing service. From fully equipped workstations to flexible terms and comprehensive support, we have everything you need to optimize your business operations.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Why Outsource Workforce<br>Management to<br>Reliasourcing?',
                description: '<p>Businesses need effective workforce management to succeed in today’s hectic and cutthroat marketplace. It entails maximizing human resource allocation, raising output, and ensuring seamless operations.<br><br>Here’s how Reliasourcing can help you with reliable workforce management solutions:</p>',
                image: '/temp/workforce2.png',
                imageFirst: true
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Management of Work Authorization Documents',
                    description: '<p>Many problems will arise if your hired contractors don’t arrive with the proper work permits and visas. They might not get into the country assigned to them or be deported because of incomplete documentation. In some industries, workers will not be allowed on the premises if they don’t have the proper identification. A workforce management partner’s insight into the procedure and familiarity with the various visa and work permit options will prove invaluable. Reliasourcing has specialists available to assist your company in shouldering this load. As a result, you can put more of your mental energy into growing your company.</p>',
                    icon: '/temp/icon11.png',
                },
                {
                    title: 'Ensuring Compliance',
                    description: '<p>Compliance issues arise when tracking certifications, training, missed breaks, labor standards, family and sick leave, and union agreements. Keeping tabs on whether or not an organization is following employment laws is also one of the trickiest and most potentially expensive aspects of managing a workforce. A workforce management outsourcing service like Reliasourcing can ensure workers are legally employed and paid. We also offer flexible plans, so you only pay for what you need.</p>',
                    icon: '/temp/icon14.png',
                },
                {
                    title: 'Mitigating Employment Liability',
                    description: '<p>Given the constantly changing business environment, situations arise where it becomes necessary to part ways with employees unexpectedly. By collaborating with a workforce management partner to engage independent contractors, businesses can mitigate the potential risks associated with employment practices and simplify the hiring process. This allows people to be quickly onboarded, even before administrative tasks like setting up social security, tax, and visa accounts are finished.</p>',
                    icon: '/temp/icon4.png',
                },
                {
                    title: 'Taking Care of Tax Obligations',
                    description: '<p>Correctly paying your employees is also critical to workforce management. Tax liabilities are always different and can change depending on where you live. How do you calculate their taxes if you pay your employees daily or hourly? A workforce management partner like Reliasourcing will relieve you of this burden by ensuring that all tax obligations are met.  </p>',
                    icon: '/temp/icon2.png',
                },
                {
                    title: 'Credit Term Expansion',
                    description: '<p>Wouldn’t it be great to have improved cash flow? Partnering with a workforce management company can offer you the advantage of extended credit terms. At Reliasourcing, we ensure timely payments to your contractors, freeing you to focus on other aspects of your business. With only one invoice to track, you can devote more time to prompting customers to pay you instead of juggling multiple payment schedules.</p>',
                    icon: '/temp/icon5.png',
                },
                {
                    title: 'Assistance in Mobilization',
                    description: '<p>Nowadays, your workforce will likely be distributed globally. Organizing the logistics of bringing people into a country can be monumental. A workforce management partner, however, can take care of all of this for you and often uses their connections with travel providers to reduce costs.</p>',
                    icon: '/temp/icon8.png',
                },
                {
                    title: 'Lightened Administrative Load',
                    description: '<p>Reliasourcing can free you from mountains of administrative tasks and complications. We will take care of any paperwork and daily operations for your workforce. Without worrying about the nitty-gritty of day-to-day operations and paperwork, you can focus on other aspects of growing your business. </p>',
                    icon: '/temp/icon15.png',
                },
            ]"
        />

        <image-text-frame 
            :item="{
                image: '/temp/solution2.png',
                title: 'Maximize Workforce Management with Reliasourcing',
                description: '<p>Increase operational effectiveness, streamline administrative tasks, and make the most of your workforce by utilizing Reliasourcing’s services to achieve your company’s goals.<br><br>Reliasourcing is dedicated to designing a plan specifically for you, ensuring you only pay for your requirements. Get in touch with us today to get started.</p>',
                buttonText: 'Outsource with Us',
                buttonLink: '/#contact-us'
            }"
        />

        <contact-frame class="py-10" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>