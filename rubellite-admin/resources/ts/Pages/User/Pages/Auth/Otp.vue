<template>
    <Head title="Forgot Password" />
    <div class="flex flex-wrap items-center h-screen">
        <div class="w-1/2 max-w-[680px] mx-auto">
            <div class="text-center px-6 py-6 mb-6">
                <div class="rounded-[10px] inline-block overflow-hidden">
                    <jet-authentication-card-logo
                        customImageClass="w-[135px] min-w-[135px]"
                    />
                </div>
            </div>
            <template v-if="!validOtp">
                <jet-authentication-card>
                    <template #title>
                        <h3 class="text-lg font-bold text-gray-900 text-center">Reset Password</h3>
                        <p class="text-sm text-gray-500 text-center">
                            Kindly provide the 6-digit code sent to <span class="font-bold">{{ email }}</span>
                        </p>
        
                        <p v-if="errors?.otp" class="mt-2 text-sm text-red-600" id="otp-error">
                            {{ errors?.otp[0] }}
                        </p>
        
                        <p v-if="resendOtp" class="mt-2 text-sm text-green-600" id="resendOtp">
                            {{ resendOtp }}
                        </p>
                    </template>
                    <jet-validation-errors class="mb-4" />
                    <form @submit.prevent="submit">
                        <div class="flex items-center justify-center gap-6 whitespace-nowrap">
                            <code-input
                                :fields="6"
                                :fieldWidth="40"
                                :fieldHeight="40"
                                :required="true"
                                @change="(value: string) => code = value"
                                :key="codeKey"
                            />
                        </div>
                        <div class="my-6">
                            <p class="font-normal text-sm text-gray-500 text-center">
                                Didn't receive a code?
                                <Link @click="resendCode" class="font-bold text-primary-500" v-if="!disabled"> Resend </Link>
                            </p>
                        </div>
                        <div class="flex items-center mt-6">
                            <v-button class="w-full flex justify-center" :disabled="disabled"> Verify </v-button>
                        </div>
                    </form>
                    <div class="mt-6 text-center">
                        <Link :href="route('admin.login')" class="font-normal text-sm text-gray-900 hover:text-primary-800 transition"> Return to Login </Link>
                    </div>
                </jet-authentication-card>
            </template>
            <template v-else>
                <jet-authentication-card>
                    <template #title>
                        <h3 class="text-lg font-bold text-gray-900 text-center">New Password</h3>
                        <p class="text-sm text-gray-500 text-center">Kindly provide your new password</p>
                    </template>
        
                    <jet-validation-errors class="mb-4" />
        
                    <form @submit.prevent="submitNewPassword">
                        <div class="relative">
                            <v-password-input 
                                v-model="form.password"
                                label="New Password"
                                placeholder="Your password"
                                id="password"
                                name="password"
                                required autocomplete="current-password"
                            />
        
                            <p v-if="errors?.password" class="mt-2 text-sm" :class="errors?.password ? 'text-red-600' : 'text-gray-800'" id="email-error">
                                {{ errors?.password[0] }}
                            </p>
                        </div>
        
                        <div class="relative mt-6">
                            <v-password-input 
                                v-model="form.password_confirmation"
                                label="Confirm New Password"
                                placeholder="Your password"
                                id="password_confirmation"
                                name="password_confirmation"
                                required autocomplete="confirm-password"
                            />
                        </div>
        
                        <div class="flex items-center mt-6">
                            <v-button class="w-full flex justify-center"> Reset Password </v-button>
                        </div>
                    </form>
                    <div class="mt-6 text-center">
                        <Link :href="route('admin.login')" class="text-gray-900 text-sm text-center block mt-6 hover:text-primary-800 transition"> Return to Login </Link>
                    </div>
                </jet-authentication-card>
            </template>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { reactive, ref } from "vue";
import { Head, router } from "@inertiajs/vue3";
import route from "ziggy-js";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetValidationErrors from "@/Components/Inputs/ValidationErrors.vue";
import CodeInput from "@/Components/Inputs/CodeInput.vue";

/*--------------*
 * PROPS
 *--------------*/
const props = defineProps(["email"]);

/*--------------*
 * VARS
 *--------------*/
const email = ref<string>(props.email);
const code = ref<string>("");
const codeKey = ref<number>(0);
const errors = ref<any>([]);
const validOtp = ref<boolean>(false);
const resendOtp = ref<string>(null);
const disabled = ref<boolean>(false);

const form = reactive<{ password: string; password_confirmation: string }>({
    password: null,
    password_confirmation: null,
});

/*--------------*
 * METHODS
 *--------------*/
const submitNewPassword = () => {
    window.axios
        .post(route("admin.auth.set-new-password"), {
            email: email.value,
            code: code.value,
            password: form.password,
            password_confirmation: form.password_confirmation,
        })
        .then(() => {
            router.get(route("admin.login"));
        })
        .catch((error) => {
            errors.value = error.response.data.errors;
        });
};

const submit = () => {
    resendOtp.value = null;

    window.axios
        .post(route("admin.auth.verify-otp"), {
            email: email.value,
            code: code.value,
        })
        .then(() => {
            validOtp.value = true;
        })
        .catch((error) => {
            errors.value = error.response.data.errors;
            codeKey.value++;
        });
};

const resendCode = () => {
    resendOtp.value = null;
    errors.value = null;
    disabled.value = true;

    router.post(
        route("admin.auth.reset-password"),
        {
            email: email.value,
        },
        {
            preserveState: true,
            onFinish: () => {
                resendOtp.value = "New OTP Code has been sent to your email!";
                disabled.value = false;
            },
        }
    );
};
</script>
