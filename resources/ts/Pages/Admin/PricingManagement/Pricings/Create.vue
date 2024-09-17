<template>
    <admin-layout
        :pages="breadcrumbs"
    >
        <!-- Tabs -->
        <div>
            <Tabs
                :tabs="tabs"
                :button-items="true"
                :active-tab="activeTab"
                @update:tab="(value: string) => (activeTab = value)"
                :tab-route="route('admin.pricing-management.pricings.create')"
                :preserve-state="true"
            />
        </div>
        <div>
            <div class="mb-10">
                <form-section
                    :form="form"
                    v-if="activeTab == null"
                >
                    
                </form-section>

            </div>
            <div
                class="flex justify-end items-center px-6 py-4 w-full space-x-2 bg-gray-50"
            >
                <action-button
                    @click="cancel"
                    secondary
                >
                    Cancel
                </action-button>
                <action-button
                    @click="submit"
                >
                    Create
                </action-button>
            </div>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import { computed, ref } from "vue";
import { useForm, usePage } from "@inertiajs/vue3";
// Components
import FormSection from "./FormSection.vue";

const props = defineProps({
    selectedTab: {
        type: String
    },
})

/*---------------*
* Variables
*---------------*/

const author = computed(() => usePage().props.auth.user);

const headerContent = {
    title: 'Create Pricing',
    icon: '/icons/nav/ic-nav-accounts.svg'
}

const breadcrumbs = [
{
        name: 'Pricings',
        href: route('admin.pricing-management.pricings.index')
    },
    {
        name: 'Create Pricing',
        href: route('admin.pricing-management.pricings.create')
    }
]


const form = useForm({
    role: null,
    country:null,
    experience: null,
    offshore: null,
    onshore: null,

});


const activeTab = ref<string>(props.selectedTab);
const tabs = ref<{ name: string, value?: string}[]>([
    {
        name: 'Information',
        value: null,
    },
]);

/*--------------*
* Functions
*--------------*/

const cancel = () => {
    window.location.replace(route("admin.pricing-management.pricings.index"))
}

const submitUrl = route("admin.pricing-management.pricings.store");
const submit = () => {
    form.post(submitUrl)
}
</script>
