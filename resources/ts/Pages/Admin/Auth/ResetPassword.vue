<template>
    <Head title="Reset Password" />

    <div class="flex flex-col justify-center items-center h-screen">
        <div class="w-[392px] max-w-[392px] rounded-lg border border-gray-100 p-8">
            <jet-authentication-card
            title="Set Password"
            description="Provide your credentials to continue">

                <jet-validation-errors class="mb-4" />

                <form @submit.prevent="submit">
                    <div class="mb-6">
                        <text-input
                            id="email"
                            type="email"
                            label="Email"
                            v-model="form.email"
                            required
                            autofocus
                        />
                    </div>

                    <div class="mb-6">
                        <password-input 
                            v-model="form.password"
                            label="Password"
                            id="password"
                            name="password"
                            required autocomplete="new-password"
                        />
                    </div>

                    <div class="mb-6">
                        <password-input 
                            v-model="form.password_confirmation"
                            label="Confirm Password"
                            id="password_confirmation"
                            name="password_confirmation"
                            required autocomplete="confirm-password"
                        />
                    </div>

                    <div class="flex items-center justify-end">
                        <action-button
                            class="w-full flex justify-center"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Reset Password
                        </action-button>
                    </div>
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
import PasswordInput from "@/Components/Inputs/PasswordInput.vue";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/solid";
export default {
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetValidationErrors,
        PasswordInput,
        EyeIcon,
        EyeSlashIcon
    },

    props: {
        email: String,
        token: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                token: this.token,
                email: this.email,
                password: "",
                password_confirmation: "",
            }),
            hidden: true,
            hidden2: true,
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("admin.password.update"), {
                onFinish: () => this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
</script>
