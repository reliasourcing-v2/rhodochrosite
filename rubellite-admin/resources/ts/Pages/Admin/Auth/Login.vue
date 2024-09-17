<template>
    <Head title="Log in" />

    <div class="flex flex-col justify-center items-center h-screen">
        <div class="w-[392px] max-w-[392px] rounded-lg border border-gray-100 p-8">
            <jet-authentication-card
            title="Admin"
            description="Provide your credentials to continue"
            >
                <form @submit.prevent="submit">
                    <div class="mb-6">
                        <text-input
                            v-model="form.email"
                            label="Email Address"
                            id="email"
                            type="email"
                            name="email"
                            class="mt-1 block w-full"
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
                            required 
                            autocomplete="current-password"
                        />
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <jet-checkbox name="remember" v-model:checked="form.remember" />
                            <label for="remember-me" class="ml-2 block text-xs text-gray-500">
                                Remember me
                            </label>
                        </div>

                        <a
                            v-if="canResetPassword"
                            :href="route('admin.password.request')"
                            class="text-xs text-primary-600"
                        >
                            Forgot your password?
                        </a>
                    </div>

                    <div class="flex items-center">
                        <action-button
                            block
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Log in
                        </action-button>
                    </div>
                </form>
            </jet-authentication-card>
        </div>
    </div>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetValidationErrors from "@/Components/Inputs/ValidationErrors.vue";
import PasswordInput from "@/Components/Inputs/PasswordInput.vue";
import { Head, Link } from "@inertiajs/vue3";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/solid";
export default {
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetValidationErrors,
        PasswordInput,
        Link,
        EyeIcon,
        EyeSlashIcon,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form
                .transform((data) => ({
                    ...data,
                    remember: this.form.remember ? "on" : "",
                }))
                .post(this.route("admin.login"), {
                    onFinish: () => this.form.reset("password"),
                });
        },
    },
};
</script>
