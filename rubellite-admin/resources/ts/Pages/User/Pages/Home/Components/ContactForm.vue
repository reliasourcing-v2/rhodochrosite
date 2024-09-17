<template>
    <div id="contact-us" class="-translate-y-24"></div>
    <div class="flex lg:flex-row flex-col items-center justify-between max-w-[1280px] m-auto lg:p-10 pb-0">
        <img
            class="w-[483px]" 
            src="/icons/contact-img.svg" 
            alt="contact"
            loading="lazy"
            decoding="async"
        >
        <div class="max-w-[656px] p-6 lg:p-8 bg-primary-900 w-full rounded-2xl">
            <div class="text-white mb-6">
                <p class="font-semibold text-3xl mb-3">Let's Chat!</p>
                <p>Drop us a line and access reliable solutions.</p>
            </div>
            <form @submit.prevent="submit" class="hm-contact grid grid-cols-1 lg:grid-cols-2 gap-x-5 gap-y-4">
                <div>
                    <v-text-input
                        label="Full Name"
                        placeholder="Enter full name here"
                        id="full_name"
                        name="full_name"
                        v-model="form.full_name"
                        :error="form.errors.full_name"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Phone"
                        placeholder="Enter phone number here"
                        type="number"
                        id="phone"
                        name="phone"
                        :add_on_left="true"
                        add_on_text="+63"
                        v-model="form.phone"
                        :error="form.errors.phone"
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
                    <v-text-input
                        label="Company"
                        placeholder="Enter company here"
                        id="company"
                        name="company"
                        v-model="form.company"
                        :error="form.errors.company"
                    />
                </div>
                <div class="col-span-full">
                    <v-text-input
                        textarea
                        label="Message"
                        placeholder="Enter message (optional)"
                        id="message"
                        name="message"
                        text-area-rows="5"
                        v-model="form.message"
                        :error="form.errors.message"
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
import { ref, onMounted, defineAsyncComponent } from "vue";
import { useForm } from "@inertiajs/vue3";
const VueRecaptcha = defineAsyncComponent({
  loader: () => import('vue-recaptcha').then(module => module.VueRecaptcha),
  loadingComponent: () => '<div>Loading...</div>',
  delay: 200,
});



const form = useForm({
    full_name: null,
    phone: null,
    email: null,
    company: null,
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

const submitUrl = route("web.inquiry.submit");
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