<template>
    <user-layout>
        <div class="relative auth-frame1">
            <div class="xs:w-[440px] w-full mx-auto lg:pt-[52px] pt-8 pb-[100px] 2xl:px-0 lg:px-10 px-5">
                <div class="w-full text-center mb-8">
                    <h1 class="font-bold">Login</h1>
                </div>
                <div class="flex flex-col gap-7">
                    <v-text-input
                        v-model="form.email"
                        label="Email"
                        placeholder="Your email"
                        id="email"
                        name="email"
                        :error="form.errors.email"
                    />
                    <v-password-input 
                        v-model="form.password"
                        label="Password"
                        placeholder="Your password"
                        id="password"
                        name="password"
                        required
                        :error="form.errors.password"
                    />
                </div>
                <div class="mb-7 mt-1 flex items-center justify-between">
                    <div class="flex items-center">
                        <v-checkbox id="keepLogin" class="mr-2 w-4 h-4"></v-checkbox>
                        <label for="keepLogin" class="leading-6 text-sm text-neutral-400 inline-block">Keep me logged in</label>
                    </div>
                    <a href="/forgot-password" class="text-sm leading-6 text-primary-800 hover:text-secondary">Forgot password?</a>
                </div>
                <div class="mb-8 text-center">
                    <a href="/account/details/profile">
                        <v-button>
                            Login
                        </v-button>
                    </a>
                </div>
                <div class="mb-8 flex items-center justify-between">
                    <div class="sm:w-[150px] w-[27vw] h-[1px] bg-[#CED4DA]"></div>
                    <p class="leading-6 text-[#ADB5BD] text-center">or login via</p>
                    <div class="sm:w-[150px] w-[27vw] h-[1px] bg-[#CED4DA]"></div>
                </div>
                <div class="mb-10 grid 2xs:grid-cols-2 grid-cols-1 gap-6">
                    <div class="col-span-1">
                        <v-button
                            customClass="w-full secondary large"
                        >
                            <img src="/icons/ic-facebook-2.svg" alt="facebook_icon" class="w-5 h-5 object-contain mr-2">
                            <span>Facebook</span>
                        </v-button>
                    </div>
                    <div class="col-span-1">
                        <v-button
                            customClass="w-full secondary large"
                        >
                            <img src="/icons/ic-gmail.svg" alt="facebook_icon" class="w-5 h-5 object-contain mr-2">
                            <span>Gmail</span>
                        </v-button>
                    </div>
                </div>
                <div class="w-full text-center">
                    <p class="text-[#ADB5BD]">Don't have an account yet? 
                        <a href="/register" class="font-bold text-primary-800 hover:text-secondary">
                            Sign up now
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </user-layout>
</template>

<script setup lang="ts">
import { ref, watch, computed } from 'vue';
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
})

const hidden = ref<boolean>(true);
</script>
