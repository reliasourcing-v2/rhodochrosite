<template>
    <user-layout>
        <div class="relative auth-frame1">
            <div class="xs:w-[440px] w-full mx-auto lg:pt-[52px] pt-8 pb-[100px] 2xl:px-0 lg:px-10 px-5">
                <div class="w-full text-center mb-8">
                    <h1 class="font-bold">Reset Password</h1>
                </div>
                <div class="flex flex-col gap-7  mb-7">
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
                <div class="text-center">
                    <v-button btnType="submit">
                        Reset Password
                    </v-button>
                </div>
            </div>
        </div>
    </user-layout>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    password: null,
    confirmPassword: null,
})
</script>
