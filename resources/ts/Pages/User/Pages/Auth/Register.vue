<template>
    <user-layout>
        <div class="relative auth-frame1">
            <div class="xs:w-[440px] w-full mx-auto lg:pt-[52px] pt-8 pb-[100px] 2xl:px-0 lg:px-10 px-5">
                <div class="w-full text-center mb-8">
                    <h1 class="font-bold">Sign Up</h1>
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
                    <v-text-input
                        v-model="form.firstName"
                        label="First Name"
                        placeholder="Your first name"
                        id="firstName"
                        name="firstName"
                        :error="form.errors.firstName"
                    />
                    <v-text-input
                        v-model="form.lastName"
                        label="Last Name"
                        placeholder="Your last name"
                        id="lastName"
                        name="lastName"
                        :error="form.errors.lastName"
                    />
                    <v-text-input
                        v-model="form.phoneNumber"
                        label="Phone Number"
                        placeholder="Your phone number"
                        id="phoneNumber"
                        name="phoneNumber"
                        :add_on_left="true"
                        add_on_text="+63 |"
                        type="tel" 
                        :error="form.errors.phoneNumber"
                        :maxlength="10"
                        @keypress="numberonly"
                    />
                    <v-password-input 
                        v-model="form.password"
                        label="Password"
                        placeholder="Your password"
                        id="password"
                        name="password"
                        :error="form.errors.password"
                    />
                    <v-password-input 
                        v-model="form.confirmPassword"
                        label="Confirm Password"
                        placeholder="Your password"
                        id="confirm_password"
                        name="confirm_password"
                        :error="form.errors.confirmPassword"
                    />
                </div>
                <div class="mb-7 mt-2 w-full">
                    <div class="flex items-start">
                        <v-checkbox id="termsCondition" class="mr-2 mt-1 w-4 h-4"></v-checkbox>
                        <label for="termsCondition" class="leading-6 text-sm text-neutral-400 inline-block">By clicking the submit button below, I hereby agree to and accept Furniture Source’s Terms and Conditions governing my use of this website.</label>
                    </div>
                </div>
                <div class="mb-8 text-center">
                    <a href="/otp">
                        <v-button>
                            Sign Up
                        </v-button>
                    </a>
                </div>
                <div class="mb-8 flex items-center justify-between">
                    <div class="sm:w-[135px] w-[25vw] h-[1px] bg-[#CED4DA]"></div>
                    <p class="leading-6 text-[#ADB5BD] text-center">or register via</p>
                    <div class="sm:w-[135px] w-[25vw] h-[1px] bg-[#CED4DA]"></div>
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
                    <p class="text-[#ADB5BD]">Already have an account? 
                        <a href="/login" class="font-bold text-primary-800 hover:text-secondary">
                            Login now
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </user-layout>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";
import { numberonly } from '@/composables/useNumberOnly.ts';

const form = useForm({
    email: null,
    firstName: null,
    lastName: null,
    phoneNumber: null,
    password: null,
    confirmPassword: null,
})

</script>
