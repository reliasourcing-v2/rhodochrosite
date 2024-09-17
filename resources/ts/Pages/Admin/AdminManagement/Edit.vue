<template>
    <admin-layout 
    :pages="pages"
    :title="admin.name">
        <div class="">
            <FormSection 
            :form="form"
            :roles="roles">
                <a :href="route('admin.accounts.admins.view', admin.id)">
                    <action-button 
                    type="button"
                    fill="outline" 
                    class="mr-2">
                        Cancel
                    </action-button>
                </a>
                <action-button @click="submit">
                    Save Changes
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
    admin: {
        type : Object,
        default: () => {},
        require: true,
    },
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
    first_name: props.admin.first_name,
    last_name: props.admin.last_name,
    email: props.admin.email,
    title: props.admin.title,
    role_id: 1
};

const pages = [
    {
        href: route("admin.accounts.admins.index"),
        name: "Admins",
    },
    {
        href: "",
        name: "Edit",
    },
];

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.accounts.admins.edit", props.admin.id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>