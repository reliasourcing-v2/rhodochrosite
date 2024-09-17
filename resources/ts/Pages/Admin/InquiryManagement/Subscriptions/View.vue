<template>
    <admin-layout
        :show-back="true"
    >
        <header-section
            :header="headerContent"
            :breadcrumbs="breadcrumbs"
        >
        </header-section>
        <form-section
            :form="form"
            :readonly="true"
        >
           
        </form-section>
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import { router, useForm } from "@inertiajs/vue3";
// Components
import FormSection from "./FormSection.vue";

const props = defineProps({
    item: {
        type: Object
    },
})

/*---------------*
* Variables
*---------------*/

const headerContent = {
    title: 'View ' + props.item.subject + ' - ' + props.item.first_name + ' ' + props.item.last_name,
    icon: '/icons/nav/ic-nav-inquiry.svg'
}

const breadcrumbs = [
    {
        title: 'Inquiry',
        route: route('admin.contact.subscriptions.index')
    },
    {
        title: 'View ' + props.item.subject + ' - ' + props.item.first_name + ' ' + props.item.last_name,
        route: route('admin.contact.subscriptions.view', props.item.id)
    }
]

const form = useForm({
    date: props.item.date,
    full_name: props.item.full_name,
    role: props.item.role,
    solution: props.item.solution,
    position: props.item.position,
    industry: props.item.industry,
    phone: props.item.phone,
    email: props.item.email,
    company: props.item.company,
});

/*--------------*
* Functions
*--------------*/

// const edit = () => {
//     router.get(route('admin.company.people.edit', props.item.id))
// }
</script>
