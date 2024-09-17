<template>
    <admin-layout
        :title="headerContent.title"
        :pages="breadcrumbs"
    >
        <!-- Tabs -->
        <div>
            <Tabs
                :tabs="tabs"
                :button-items="true"
                :active-tab="activeTab"
                @update:tab="(value: string) => (activeTab = value)"
                :tab-route="route('admin.pricing-management.pricings.edit', item.id)"
                :preserve-state="true"
            />
        </div>
        
       <div class="mb-10">
            <form-section
                :form="form"
                :selectorOptions="selectorOptions"
                :multiselectOptions="tags"
                v-if="activeTab == null"
            >
                
            </form-section>
       </div>
        <div
            class="flex justify-end items-center px-6 py-4 space-x-2 bg-gray-50 w-full"
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
                Save Changes
            </action-button>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
import { ref } from "vue";
// Packages
import { useForm } from "@inertiajs/vue3";
// Components
import FormSection from "./FormSection.vue";

const props = defineProps({
    item: {
        type: Object
    },
    selectedTab: {
        type: String
    },
})

/*---------------*
* Variables
*---------------*/

const headerContent = {
    title: 'Edit ' + props.item.role + ' - ' + props.item.country + ' - ' + props.item.experience,
    icon: '/icons/nav/ic-nav-accounts.svg'
}

const breadcrumbs = [
{
        name: 'Pricings',
        href: route('admin.pricing-management.pricings.index')
    },
    {
        name: 'Edit Pricing',
        href: route('admin.pricing-management.pricings.edit', props.item.id)
    }
]

const form = useForm({
    role: props.item.role,
    country: props.item.country,
    experience: props.item.experience,
    offshore: props.item.offshore,
    onshore: props.item.onshore,
});

const activeTab = ref<string>(props.selectedTab);

const tabs = ref<{ name: string, value?: string}[]>([
    {
        name: 'Information',
        value: null,
    },
])

/*--------------*
* Functions
*--------------*/

const cancel = () => {
    window.location.replace(route("admin.pricing-management.pricings.view", props.item.id))
}

const submitUrl = route("admin.pricing-management.pricings.update", props.item.id);
const submit = () => {
    form.post(submitUrl)
}
</script>
