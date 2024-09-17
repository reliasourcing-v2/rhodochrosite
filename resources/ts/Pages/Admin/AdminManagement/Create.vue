<template>
    <admin-layout 
    title="Create Admin"
    :pages="pages">
        <div class="p-4 md:p-7">
            <FormSection 
            :form="form"
            :roles="roles">
                <action-button @click="submit">
                    Create
                </action-button>
            </FormSection>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import { ref } from "vue";
import usePRXForm from "@/composables/usePRXForm.ts";

// Components
import FormSection from "./FormSection.vue";

const props = defineProps({
    roles: {
        type : Object,
        default: () => {},
        require: true,
    },
});

/*---------------*
* Variables
*---------------*/

const formData = {
    first_name: null,
    last_name: null,
    email: null,
    title: null,
    role_id: 1
};


const pages = [
    {
        href: route("admin.accounts.admins.index"),
        name: "Admins",
    },
    {
        href: "",
        name: "Create",
    },
];

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.accounts.admins.store");
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>