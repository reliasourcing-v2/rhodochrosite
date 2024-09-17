<template>
    <Head title="Forgot Password" />

    <div class="flex flex-col justify-center items-center h-screen">
        <div class="w-[392px] max-w-[392px] rounded-lg border border-gray-100 p-8">
            <jet-authentication-card
            title="Forgot Password"
            description="Provide your credentials to continue">
            
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <jet-validation-errors class="mb-4" />

                <form @submit.prevent="submit">
                    <text-input
                        id="email"
                        type="email"
                        label="Email Address"
                        class="block w-full"
                        v-model="form.email"
                        required
                        autofocus
                    />

                    <div class="flex items-center mt-6">
                        <action-button
                            class="w-full flex justify-center"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Submit
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
import { Head, Link } from "@inertiajs/vue3";
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
                email: "",
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
