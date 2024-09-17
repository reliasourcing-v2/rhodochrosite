<template>
    <Head title="Secure Area" />

    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <password-input 
                    v-model="form.password"
                    label="Password"
                    placeholder="Your password"
                    id="password"
                    name="password"
                    required autocomplete="current-password"
                />
            </div>

            <div class="flex justify-end mt-4">
                <action-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </action-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { Head } from "@inertiajs/vue3";
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetValidationErrors from "@/Components/Inputs/ValidationErrors.vue";
    import PasswordInput from "@/Components/Inputs/PasswordInput.vue";

    export default {
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetValidationErrors,
            PasswordInput
        },

        data() {
            return {
                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('admin.password.confirm'), {
                    onFinish: () => this.form.reset(),
                })
            }
        }
    }
</script>
