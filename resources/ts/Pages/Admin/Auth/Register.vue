<template>
    <Head title="Register" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
            <h3 class="text-center text-lg">Admin</h3>
        </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <text-input id="name" type="text" label="Name" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <text-input id="email" type="email" label="Email" class="mt-1 block w-full" v-model="form.email" required />
            </div>

            <div class="mt-4">
                <password-input 
                    v-model="form.password"
                    label="Password"
                    placeholder="Your password"
                    id="password"
                    name="password"
                    required autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <password-input 
                    v-model="form.password_confirmation"
                    label="Confirm Password"
                    placeholder="Your password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required autocomplete="confirm-password"
                />
            </div>

            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a :href="route('admin.login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </a>

                <action-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </action-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetValidationErrors from "@/Components/Inputs/ValidationErrors.vue";
    import PasswordInput from "@/Components/Inputs/PasswordInput.vue";
    import { Head, Link } from "@inertiajs/vue3";

    export default {
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetValidationErrors,
            PasswordInput,
            Link,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('admin.register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
