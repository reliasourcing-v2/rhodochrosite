<template>
    <div class="col-span-2">
        <div class="space-y-20">
            <div>
                <p class="font-bold mb-4">Service Card</p>
                <div class="max-w-[405px]">
                    <service-card
                        :item="{ 
                            title: 'Staff Leasing', 
                            description: 'Scale your team without diverting attention from your primary goals with Reliasourcing’s staff leasing solutions.',
                            image: '/temp/service2.png',
                            link: '/'
                        }"
                    />
                </div>
            </div>

            <div>
                <p class="font-bold mb-4">Values Card</p>
                <div class="max-w-[300px] bg-primary-900 p-5 text-white">
                    <values-card
                        :item="{ 
                            title: 'Bespoke Solutions', 
                            description: 'Each project is tailored made to ensure resources optimization',
                            image: '/temp/tower.png',
                        }"
                    />
                </div>
            </div>

            <div>
                <p class="font-bold mb-4">Benefit Card</p>
                <div class="max-w-[624px] bg-primary-50 p-5">
                    <benefit-card 
                        :item="{
                            title: 'Cost-Efficient',
                            description: '<p>Staff leasing is attractive to businesses because it can help them reduce costs. By outsourcing to an external provider, companies eliminate the expenses associated with recruitment, onboarding, training, and maintaining a full-time workforce. Reliasourcing can take on these responsibilities, reducing overhead costs such as employee benefits, office space, and equipment. This allows you to allocate resources more efficiently and invest in strategic growth areas.</p>',
                            icon: '/temp/dollarbag.svg'
                        }"
                    />
                </div>
            </div>

            <div>
                <p class="font-bold mb-4">Specialty Card</p>
                <div class="max-w-[412px]">
                    <specialty-card
                        :item="{ 
                            title: 'Web Design', 
                            description: '<p>With our web design services, your venture gets access to experts in different specialties. And as a cost-effective solution, you get ongoing support and maintenance operations to ensure your website is always up and running.</p>',
                            image: '/temp/laptop.png',
                        }"
                    />
                </div>
            </div>

            <div>
                <p class="font-bold mb-4">Image with Text</p>
                <div>
                    <image-text 
                        :item="{
                            title: 'Performance-driven <b>Customer Service</b> Teams',
                            description: '<p>You’re busy. We get it. Your customers are important to you, but you can’t do everything yourself.<br><br>That’s where we come in. Performance Customer Service Teams provides the perfect solution for businesses who want to focus on their core competencies and leave customer service to the experts.</p>',
                            image: '/temp/image1.png',
                            imageFirst: true
                        }"
                    />
                    <image-text 
                        :item="{
                            title: 'Performance-driven <b>Customer Service</b> Teams',
                            description: '<p>You’re busy. We get it. Your customers are important to you, but you can’t do everything yourself.<br><br>That’s where we come in. Performance Customer Service Teams provides the perfect solution for businesses who want to focus on their core competencies and leave customer service to the experts.</p>',
                            image: '/temp/image1.png',
                        }"
                    />
                </div>
            </div>
           
        </div>

        <div class="w-full border-t border-gray-200 my-20"></div>

        <h4 class="mb-4 text-gray-600 font-medium">Modals</h4>
        <div class="flex flex-col space-y-3">
            <v-button
                @click="showConfirmModal = true">
                Show Confirmation
            </v-button>
            <v-button
                @click="showDeleteModal = true">
                Show Delete
            </v-button>
            <v-button
                @click="showDialogModal = true">
                Show Dialog
            </v-button>
            <v-button
                @click="showSuccessModal = true">
                Show Success
            </v-button>
        </div>
        <v-confirmation-modal 
            :show="showConfirmModal"
            @cancel="showConfirmModal = false"
            title="Submit Inquiry"
            description="Are you sure you wish to submit this inquiry?" 
        >
            <template #button>
                <div class="flex items-center justify-end">
                    <v-button @click="showConfirmModal = false" :fill='false' fillColor="gray-outline" class="mr-2">Cancel</v-button>
                    <v-button @click="openSuccessModal()">Proceed</v-button>
                </div>
            </template>

        </v-confirmation-modal>
        <v-delete-modal 
            :show="showDeleteModal"
            @cancel="showDeleteModal = false"
            title="Delete Inquiry"
            description="Are you sure you wish to delete this inquiry?" 
        >
            <template #button>
                <div class="flex items-center justify-end">
                    <v-button @click="showDeleteModal = false" :fill='false' fillColor="gray-outline" class="mr-2">Cancel</v-button>
                    <v-button @click="openSuccessModal()" fillColor="red">Proceed</v-button>
                </div>
            </template>

        </v-delete-modal>
        <v-dialog-modal 
            :show="showDialogModal"
            @cancel="showDialogModal = false"
        >
            <template #title>
                <h4 class="mb-4 text-gray-600 font-medium">Sample Dialog</h4>
            </template>
            <template #content>
                <p class="mb-4">Sample content here</p>
            </template>
            <template #footer>
                <div class="flex items-center justify-end">
                    <v-button @click="closeSuccessModal()">Confirm</v-button>
                </div>
            </template>
        </v-dialog-modal>
        <v-success-modal 
            :show="showSuccessModal"
            @cancel="showSuccessModal = false"
            title="Inquiry Submitted!"
            description="Inquiry has been successfully submitted"
        >
            <template #button>
                <div class="flex items-center justify-end">
                    <v-button @click="closeSuccessModal()">Confirm</v-button>
                </div>
            </template>
        </v-success-modal>
    </div>
</template>
<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { ArrowUpRightIcon } from "@heroicons/vue/24/solid"

const showSuccessModal = ref(false);
const showDeleteModal = ref(false);
const showDialogModal = ref(false);
const showConfirmModal = ref(false);

const openSuccessModal = () => {
    showConfirmModal.value = false;
    showDeleteModal.value = false;
    showDialogModal.value = false;
    showSuccessModal.value = true;
}

const closeSuccessModal = () => {
    showSuccessModal.value = false;
    window.location.reload()
}
</script>