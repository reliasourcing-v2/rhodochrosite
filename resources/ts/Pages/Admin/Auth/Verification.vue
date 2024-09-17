<template>
    <Head title="Reset Password" />
    <div class="flex flex-col justify-center items-center h-screen">
        <div class="w-[392px] max-w-[392px] rounded-lg border border-gray-100 p-8">
            <jet-authentication-card
            title="Reset Password"
            description="6-digit code has been sent to sample@email.com">
            
                <jet-validation-errors class="mb-4" />

                <form @submit.prevent="submit">
                    <div class="flex space-x-3">
                        <div>
                            <text-input
                                id="otp1"
                                type="text"
                                class="block w-full text-center"
                                required
                                autofocus
                            />
                        </div>
                        <div>
                            <text-input
                                id="otp2"
                                type="text"
                                class="block w-full text-center"
                                required
                                autofocus
                            />
                        </div>
                        <div>
                            <text-input
                                id="otp3"
                                type="text"
                                class="block w-full text-center"
                                required
                                autofocus
                            />
                        </div>
                        <div>
                            <text-input
                                id="otp4"
                                type="text"
                                class="block w-full text-center"
                                required
                                autofocus
                            />
                        </div>
                        <div>
                            <text-input
                                id="otp5"
                                type="text"
                                class="block w-full text-center"
                                required
                                autofocus
                            />
                        </div>
                        <div>
                            <text-input
                                id="otp6"
                                type="text"
                                class="block w-full text-center"
                                required
                                autofocus
                            />
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 text-center mt-6">Didn't receive a code? <a href="" class="font-bold text-primary-500">Resend</a></p>
                    <div class="flex items-center mt-6">
                        <action-button
                            class="w-full flex justify-center"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Verify
                        </action-button>
                    </div>
                    <Link 
                    href="/admin/login" 
                    class="text-primary-500 text-sm text-center block mt-6">
                        Return to Login
                    </Link>
                </form>
            </jet-authentication-card>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetValidationErrors from "@/Components/Inputs/ValidationErrors.vue";

export default {
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetValidationErrors,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                otp1: "",
                otp2: "",
                otp3: "",
                otp4: "",
                otp5: "",
                otp6: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("admin.password.email"));
        },
    },
};
</script>
