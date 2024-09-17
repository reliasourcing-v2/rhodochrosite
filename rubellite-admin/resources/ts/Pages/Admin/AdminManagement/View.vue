<template>
    <admin-layout :pages="pages">
        <div class="w-[552px] mx-auto mt-6 border border-gray-100 rounded-lg ">
            <div class="p-6 text-sm">
                <p class="font-semibold">Admin Information</p>
                <p class="text-gray-500">Relevant Information and other details</p>

                <div class="my-6">
                    <p class="text-gray-500">Full Name</p>
                    <p class="text-gray-900">{{ admin.name }}</p>
                </div>
                <div class="w-1/2 inline-block">
                    <p class="text-gray-500">Email Address</p>
                    <p class="text-gray-900">{{ admin.email }}</p>
                </div>
                <div class="w-1/2 inline-block">
                    <p class="text-gray-500">Job Title</p>
                    <p class="text-gray-900">{{ admin.title }}</p>
                </div>
            </div>
            <div class="py-4 px-6 w-full bg-gray-50 border-t border-gray-100 flex justify-end">
                <a :href="route('admin.accounts.admins.edit', admin.id)">
                    <action-button>
                        Update Information
                    </action-button>
                </a>
            </div>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">

const props = defineProps({
    admin: {
        type: Object
    }
});

/**---------------*
 * VARS
 *----------------*/
const pages = [
    {
        href: route("admin.accounts.admins.index"),
        name: "Admins",
    },
    {
        href: "",
        name: "View",
    },
];

</script>
