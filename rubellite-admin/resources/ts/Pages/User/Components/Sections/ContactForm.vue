<template>
    <div class="flex lg:flex-row flex-col items-center justify-between max-w-[1280px] m-auto lg:p-10 pb-0">
        <img
            class="w-[483px]" 
            src="/icons/contact-img.svg" 
            alt="contact"
            loading="lazy"
            decoding="async"
        >
        <div class="max-w-[656px] p-6 lg:p-8 bg-primary-900 w-full rounded-2xl" :class="customClass">
            <div class="text-white mb-6">
                <p class="font-semibold text-3xl mb-3">{{title}}</p>
                <p>{{ description }}</p>
            </div>
            <form @submit.prevent="submit" class="hm-contact grid grid-cols-1 lg:grid-cols-2 gap-x-5 gap-y-4">
                <div>
                    <v-selector
                        :options="solutions"
                        label="Interested Solutions"
                        placeholder="Select solutions here"
                        id="solution"
                        name="solution"
                        v-model="form.solution"
                        :error="form.errors.solution"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Roles to Outsource"
                        placeholder="Input Roles to Outsource here"
                        id="roles"
                        name="roles"
                        v-model="form.role"
                        :error="form.errors.role"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Full Name"
                        placeholder="Enter full name here"
                        id="fullname"
                        name="fullname"
                        v-model="form.full_name"
                        :error="form.errors.full_name"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Company"
                        placeholder="Enter company here"
                        id="company"
                        name="company"
                        v-model="form.company"
                        :error="form.errors.company"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Position"
                        placeholder="Enter position here"
                        id="position"
                        name="position"
                        v-model="form.position"
                        :error="form.errors.position"
                    />
                </div>
                <div>
                    <v-selector
                        :options="industries"
                        label="Industry"
                        placeholder="Select industry here"
                        id="industry"
                        name="industry"
                        v-model="form.industry"
                        :error="form.errors.industry"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Email"
                        placeholder="Enter email here"
                        type="email"
                        id="email"
                        name="email"
                        v-model="form.email"
                        :error="form.errors.email"
                    />
                </div>
                <div>
                    <v-mobile-number
                        label="Phone"
                        placeholder="Enter phone number here"
                        id="phone"
                        name="phone"
                        v-model="form.phone"
                        :error="form.errors.phone"
                    />
                </div>
                <div class="col-span-full flex lg:flex-row flex-col lg:space-y-0 space-y-4 justify-between pt-2">
                    <div>
                        <vue-recaptcha
                            :sitekey="sitekey"
                            @verify="verifySubmission"
                            @expired="expiredRecaptcha"
                            ref="grecaptcha"
                        ></vue-recaptcha>
                    </div>
                    <div>
                        <v-button 
                            custom-class="h-12 px-6 !text-base" 
                            @click="submit"
                            :designColor="designColor"
                            :disabled="!form.recaptcha_response"
                        >
                            Submit
                        </v-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <v-success-modal
        :show="showSuccessModal"
        @close="showSuccessModal = false"
        title="Inquiry Submitted!"
        description="Inquiry has been successfully submitted"
    >
        <template #button>
            <div class="flex items-center justify-end">
                <v-button 
                    @click="reload"
                    design-color="text-white"
                >
                    Confirm
                </v-button>
            </div>
        </template>
    </v-success-modal>
</template>
<script lang="ts" setup>
import { useForm } from "@inertiajs/vue3";
import { onMounted, ref, defineAsyncComponent } from "vue";
const VueRecaptcha = defineAsyncComponent({
  loader: () => import('vue-recaptcha').then(module => module.VueRecaptcha),
  loadingComponent: () => '<div>Loading...</div>',
  delay: 200,
});

defineProps({
    customClass: {
        type: String
    },
    title: {
        type: String,
        default: 'Contact Us',
    },
    description: {
        type: String,
        default: 'Let’s discuss your project, together we will find a solution to the most difficult task',
    },
    designColor: {
        type: String,
        default: 'text-primary-900'
    }
})

const solutions = [
    { id: 'Creative Services', value: 'Creative Services'},
    { id: 'Web Design', value: 'Web Design'},
    { id: 'Web Development', value: 'Web Development'},
    { id: 'Software Development', value: 'Software Development'},
    { id: 'Sales Development Services', value: 'Sales Development Services'},
    { id: 'Email and Phone Support', value: 'Email and Phone Support'},
    { id: 'Live Chat Support', value: 'Live Chat Support'},
    { id: 'Social Media Services', value: 'Social Media Services'},
    { id: 'Revenue Optimization Services', value: 'Revenue Optimization Services'},
]

const industries = [
    { id: 'Product & Saas', value: 'Product & Saas'},
    { id: 'Retail', value: 'Retail'},
    { id: 'E-commerce', value: 'E-commerce'},
    { id: 'Gaming & Entertainment', value: 'Gaming & Entertainment'},
    { id: 'Financial Services / FinTech', value: 'Financial Services / FinTech'},
    { id: 'Healthcare', value: 'Healthcare'},
    { id: 'Insurance', value: 'Insurance'},
    { id: 'Logistics', value: 'Logistics'},
    { id: 'Travel/Hospitality', value: 'Travel/Hospitality'},
    { id: 'Cybersecurity', value: 'Cybersecurity'},
    { id: 'Others', value: 'Others'},
]

const form = useForm({
    solution: null,
    role: null,
    full_name: null,
    company: null,
    position: null,
    industry: null,
    email: null,
    phone: null,
    recaptcha_response: null,
});

const emit = defineEmits(['close', 'showSuccess'])

const verifySubmission = () => {
    form.recaptcha_response = true;
};

const expiredRecaptcha = () => {
    form.recaptcha_response = null;
};

const showSuccessModal = ref(false);

const reload = () => {
    showSuccessModal.value = false;
    location.reload();
}

const submitUrl = route("web.subscription.submit");
const submit = () => {
    form.post(submitUrl, {
        preserveScroll: true,
        onSuccess: () => {
        emit('showSuccess')
        showSuccessModal.value = true;
        form.reset();
        },
    });
};

const sitekey = "6Leg04gpAAAAAJvzhxc0KaQU-KvKrnWFWx3u9Gi7";

onMounted(() => {

});
</script>