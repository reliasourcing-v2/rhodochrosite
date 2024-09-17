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
    title: 'View ' + props.item.position + ' - ' + props.item.full_name,
    icon: '/icons/nav/ic-nav-inquiry.svg'
}

const breadcrumbs = [
    {
        title: 'Application',
        route: route('admin.application.index')
    },
    {
        title: 'View ' + props.item.position + ' - ' + props.item.full_name,
        route: route('admin.application.view', props.item.id)
    }
]

const form = useForm({
    date: props.item.date,
    full_name: props.item.full_name,
    phone: props.item.phone,
    email: props.item.email,
    position: props.item.position,
    message: props.item.message,
    formatted_cv_url: props.item.formatted_cv_url,
});

/*--------------*
* Functions
*--------------*/

// const edit = () => {
//     router.get(route('admin.company.people.edit', props.item.id))
// }
</script>
