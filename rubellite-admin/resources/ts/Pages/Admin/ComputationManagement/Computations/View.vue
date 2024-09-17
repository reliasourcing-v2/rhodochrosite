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
    title: 'View Computation',
    icon: '/icons/nav/ic-nav-inquiry.svg'
}

const breadcrumbs = [
    {
        title: 'Computation',
        route: route('admin.computation.index')
    },
    {
        title: 'View Computation',
        route: route('admin.computation.view', props.item.id)
    }
]

const form = useForm({
    email: props.item.email,
    formatted_pdf_url: props.item.formatted_pdf_url,
});

/*--------------*
* Functions
*--------------*/

// const edit = () => {
//     router.get(route('admin.company.people.edit', props.item.id))
// }
</script>
