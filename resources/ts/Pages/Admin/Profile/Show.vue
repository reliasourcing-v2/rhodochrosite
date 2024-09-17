<template>
    <admin-layout>
        <div class="flex flex-wrap">
            <div class="w-1/4 h-screen border-r">
                <div
                    v-for="tab in tabs"
                    :key="tab.name"
                    :href="tab.value ?? ''"
                    class="p-6 cursor-pointer flex items-center justify-between border-b border-gray-100"
                    :class="
                        selectedTab === tab.value
                            ? 'bg-gray-50'
                            : ''
                    "
                    @click.prevent="selectTab(tab.value)"
                >
                    <p class="text-sm">{{ tab.name }}</p>
                    <ChevronRightIcon class="w-5" />
                </div>
            </div>
            <div class="w-3/4">
                <div class="py-6 px-12">
                    <div v-if="activeTab === null" class="divide-y">
                        <div class="p-6 pt-0">
                            <p class="text-lg font-semibold">Profile</p>
                        </div>
                        <div class="flex flex-wrap p-6">
                            <div class="w-5/12">
                                <p class="text-sm">
                                    Full Name
                                </p>
                            </div>
                            <div class="w-5/12">
                                <p class="text-sm">
                                    {{ user.name }}
                                </p>
                            </div>
                            <div class="w-2/12 text-right" v-if="!updateProfile">
                                <p
                                    class="
                                        text-sm text-primary-700
                                        font-bold
                                        cursor-pointer
                                    "
                                    @click="updateProfile = true"
                                >
                                    Update
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap p-6">
                            <div class="w-5/12">
                                <p class="text-sm">
                                    Email Address
                                </p>
                            </div>
                            <div class="w-7/12">
                                <p class="text-sm">
                                    {{ user.email }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap p-6">
                            <div class="w-5/12">
                                <p class="text-sm">
                                    Role
                                </p>
                            </div>
                            <div class="w-7/12">
                                <p class="text-sm">
                                    {{ user.roles[0].name }}
                                </p>
                            </div>
                        </div>
                        <div class="w-full" v-if="updateProfile">
                            <update-profile-information-form
                                :user="user"
                                @cancel="updateProfile = false"
                            />
                        </div>
                    </div>

                    <div v-if="activeTab === 'security'" class="divide-y">
                        <div class="p-6 pt-0">
                            <p class="text-lg font-semibold">Password</p>
                        </div>
                        <div class="flex flex-wrap p-6">
                            <div class="w-5/12">
                                <p class="text-sm">
                                    Password
                                </p>
                            </div>
                            <div class="w-5/12">
                                <p class="text-sm">
                                    <!-- {{ user.updated_at }} -->
                                </p>
                            </div>
                            <div class="w-2/12 text-right" v-if="!updatePassword">
                                <p
                                    class="
                                        text-sm text-primary-700
                                        font-bold
                                        cursor-pointer
                                    "
                                    @click="updatePassword = true"
                                >
                                    Update
                                </p>
                            </div>
                        </div>
                        <div class="w-full" v-if="updatePassword">
                            <update-password-form
                            @cancel="updatePassword = false"
                            />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import pickBy from "lodash/pickBy";
import { ref } from "vue";

import { ChevronRightIcon } from '@heroicons/vue/24/solid';
import UpdateProfileInformationForm from '@/Pages/Admin/Profile/Partials/UpdateProfileInformationForm.vue';
import UpdatePasswordForm from '@/Pages/Admin/Profile/Partials/UpdatePasswordForm.vue';


const props = defineProps({
    user: {
        type: Object,
    },
    selectedTab: {
        type: String,
        default: null,
    },
});

const tabs = [
    {
        name: "Profile",
        value: null,
        show: true,
    },
    {
        name: "Security",
        value: "security",
        show: true,
    },
];

const updateProfile = ref(false);
const updatePassword = ref(false);

const activeTab = ref(props.selectedTab);
const selectTab = (value) => {
    router.get(
        route("admin.profile.show"),
        pickBy({ tab: value }), // removes falsey values
        {
            preserveState: false,
        }
    );
};

</script>
