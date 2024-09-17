<template>
    <user-layout>
        <div class="relative auth-frame1">
            <div class="xs:w-[440px] w-full mx-auto lg:pt-[52px] pt-8 pb-[100px] 2xl:px-0 lg:px-10 px-5">
                <div class="w-full text-center mb-8">
                    <h1 class="font-bold">Forgot Password</h1>
                </div>
                <div class="flex flex-col gap-7 mb-7">
                    <v-text-input
                        v-model="form.email"
                        label="Email"
                        placeholder="Your email"
                        id="email"
                        name="email"
                        :error="form.errors.email"
                    />
                </div>
                <div class="mb-8 text-center">
                    <v-button btnType="submit">
                        Send Reset Password Request
                    </v-button>
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
})
</script>
