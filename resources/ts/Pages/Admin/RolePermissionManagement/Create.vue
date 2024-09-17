<template>
	<admin-layout
		:breadcrumb-pages="breadcrumbs"
		title="Create Role"
		:show-back="true"
		:back-url="route('admin.accounts.roles.index')"
	>
		<div class="mb-6">
			<Tabs
				:tabs="tabs"
				:active-tab="activeTab"
				:preserve-state="true"
				@update:tab="(value) => (activeTab = value)"
				:tab-route="route('admin.accounts.roles.create')"
			/>
		</div>

		<div class="px-7" v-show="!activeTab">
            <FormSection 
            :form="form"
            >
                <action-button @click="submit">
                    Create
                </action-button>
            </FormSection>
        </div>

		<div class="px-7" v-show="activeTab == 'permissions'">
            <jet-form-section>
                <template #title>
                    Role Permissions
                </template>

                <template #description>
                    Abilities for different pages.
                </template>

                <template #form>
                    <div class="col-span-12">
                        <ToggleSwitch
                            v-for="permission in permissions"
                            :key="permission.id"
                            :value="form.permissions[permission.id]"
                            @change="
                                (value) =>
                                    (form.permissions[permission.id] =
                                        value)
                            "
                            :label="permission.label"
                            :description="permission.description"
                        />
                    </div>
                </template>
            </jet-form-section>
        </div>
	</admin-layout>
</template>


<script setup lang="ts">
// Packages
import usePRXForm from "@/composables/usePRXForm.ts";
import { computed, ref } from "vue";
// Components
import FormSection from "./FormSection.vue";

const props = defineProps([ 
    "selectedTab", 
	"permissions"
])

/*---------------*
* Variables
*---------------*/
const permissions = ref(props.permissions);
const activeTab = ref(props.selectedTab);
const formData = {
    name: null,
	description: null,
	permissions: [],
};
const tabs: { name: string, value?: string, count?: Number }[] = [
    {
        name: 'Information',
        value: null,
        count: null
    },
    {
        name: 'Permissions',
        value: 'permissions',
        count: null
    }
];

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.accounts.roles.store");
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>