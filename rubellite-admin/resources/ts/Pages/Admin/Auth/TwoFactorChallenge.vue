<template>
    <Head title="Two-factor Confirmation" />

    <div class="flex flex-wrap items-center h-screen">
        <div class="w-1/2 text-center px-10">
            <jet-authentication-card-logo />
        </div>

        <div class="w-1/2">

            <jet-authentication-card>
                <template #title>
                    <h3 class="text-lg font-bold mt-4">Reset Password</h3>
                    <p class="text-sm text-gray-500">6-digit code has been sent to sample@email.com</p>
                </template>

                <div class="mb-4 text-sm text-gray-600">
                    <template v-if="!recovery">
                        Please confirm access to your account by entering the authentication
                        code provided by your authenticator application.
                    </template>

                    <template v-else>
                        Please confirm access to your account by entering one of your emergency
                        recovery codes.
                    </template>
                </div>

                <jet-validation-errors class="mb-4" />

                <form @submit.prevent="submit">
                    <div v-if="!recovery">
                        <text-input
                            ref="code"
                            id="code"
                            type="text"
                            inputmode="numeric"
                            class="mt-1 block w-full"
                            v-model="form.code"
                            autofocus
                            label="Code"
                            autocomplete="one-time-code"
                        />
                    </div>

                    <div v-else>
                        <text-input
                            ref="recovery_code"
                            id="recovery_code"
                            type="text"
                            class="mt-1 block w-full"
                            label="Recovery Code"
                            v-model="form.recovery_code"
                            autocomplete="one-time-code"
                        />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button
                            type="button"
                            class="
                                text-sm text-gray-600
                                hover:text-gray-900
                                underline
                                cursor-pointer
                            "
                            @click.prevent="toggleRecovery"
                        >
                            <template v-if="!recovery"> Use a recovery code </template>

                            <template v-else> Use an authentication code </template>
                        </button>

                        <action-button
                            class="ml-4"
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

    data() {
        return {
            recovery: false,
            form: this.$inertia.form({
                code: "",
                recovery_code: "",
            }),
        };
    },

    methods: {
        toggleRecovery() {
            this.recovery ^= true;

            this.$nextTick(() => {
                if (this.recovery) {
                    this.$refs.recovery_code.focus();
                    this.form.code = "";
                } else {
                    this.$refs.code.focus();
                    this.form.recovery_code = "";
                }
            });
        },

        submit() {
            this.form.post(this.route("admin.two-factor.login"));
        },
    },
};
</script>
