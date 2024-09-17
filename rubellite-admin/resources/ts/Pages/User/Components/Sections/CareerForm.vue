<template>
    <div class="flex lg:flex-row flex-col items-center justify-between max-w-[1280px] m-auto lg:p-10 pb-0 z-[10] relative">
        <img
            class="w-[483px]" 
            src="/icons/contact-img.svg" 
            alt="contact"
            loading="lazy"
            decoding="async"
        >
        <div class="max-w-[656px] p-6 lg:p-8 bg-primary-900 w-full rounded-2xl">
            <div class="text-white mb-6">
                <p class="font-semibold text-3xl mb-3">{{ title }}</p>
                <p>{{ description }}</p>
            </div>
            <form @submit.prevent="submit" class="hm-contact grid grid-cols-1 lg:grid-cols-2 gap-x-5 gap-y-4">
                <div>
                    <v-text-input
                        label="Name"
                        placeholder="Your name"
                        id="full_name"
                        name="full_name"
                        v-model="form.full_name"
                        :error="form.errors.full_name"
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
                <div class="col-span-full">
                    <v-text-input
                        label="Contact Number"
                        placeholder="Enter contact number here"
                        type="number"
                        id="phone"
                        name="phone"
                        :add_on_left="true"
                        add_on_text="+63"
                        v-model="form.phone"
                        :error="form.errors.phone"
                    />
                </div>
                <div class="col-span-full">
                    <v-text-input
                        label="Position"
                        placeholder="Enter position here"
                        id="position"
                        name="position"
                        v-model="form.position"
                        :error="form.errors.position"
                    />
                </div>
                <div class="col-span-full">
                    <v-file-input
                        id="cv"
                        label="Your Resume"
                        description="Only .PDF or .DOCX file will be accepted."
                        v-model:path="form.cv"
                        v-model:file="form.cv"
                        :error="form.errors.cv"
                    />
                </div>
                <div class="col-span-full">
                    <v-text-input
                        label="Cover Letter"
                        placeholder="Enter Cover Letter"
                        id="cover"
                        name="cover"
                        v-model="form.message"
                        :error="form.errors.message"
                        :textAreaRows="7"
                        textarea
                    />
                </div>
               
                <div class="col-span-full">
                    <vue-recaptcha
                        :sitekey="sitekey"
                        @verify="verifySubmission"
                        @expired="expiredRecaptcha"
                        ref="grecaptcha"
                    ></vue-recaptcha>
                </div>
                    
                <div class="col-span-full">
                    <v-button 
                        size="md"
                        @click="submit"
                        :disabled="!form.recaptcha_response"
                    >
                        Submit Application
                    </v-button>
                </div>
            </form>
        </div>
    </div>

    <v-success-modal
        :show="showSuccessModal"
        @close="showSuccessModal = false"
        title="Application Submitted!"
        description="Application has been successfully submitted"
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
import { useForm, } from "@inertiajs/vue3";
import { onMounted, ref, reactive, watch, defineAsyncComponent } from "vue";
const VueRecaptcha = defineAsyncComponent({
  loader: () => import('vue-recaptcha').then(module => module.VueRecaptcha),
  loadingComponent: () => '<div>Loading...</div>',
  delay: 200,
});

const props = defineProps({
    position: {
        type: String,
        default: null
    },
    title: {
        type: String,
        default: 'Submit Application',
    },
    description: {
        type: String,
        default: 'Please submit your comprehensive resumé via online form.',
    }
})

watch(
    () => props.position,
    (newPosition) => {
        form.position = newPosition;
    }
);

const form = useForm({
    full_name: null,
    email: null,
    phone: null,
    position: reactive(props.position),
    cv: null,
    message: null,
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

const submitUrl = route("web.application.submit");
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