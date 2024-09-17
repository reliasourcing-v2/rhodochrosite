<template>
      <admin-layout
    :breadcrumb-pages="breadcrumbs"
    title="Update Role"
    :show-back="true"
    :back-url="route('admin.accounts.roles.index')"
      >
        <div class="mb-6">
            <Tabs
                :tabs="tabs"
                :active-tab="activeTab"
                @update:activeTab="(newValue) => (activeTab = newValue)"
                :tab-route="route('admin.accounts.roles.edit', role.id)"
            >
            </Tabs>
        </div>

        <div class="px-7" v-show="!activeTab">
            <FormSection 
            :form="form"
            >
                <action-button @click="submit">
                    Save Changes
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

        <activity-logs
            :logs="logs"
            :result-route="
                route('admin.accounts.roles.edit', role.id)
            "
            :query="searchText"
            :event="filterEvent"
            v-if="activeTab == 'activity-logs'"
        />
    </admin-layout>
</template>


<script setup lang="ts">
// Packages
import usePRXForm from "@/composables/usePRXForm.ts";
import { computed, ref } from "vue";
// Components
import FormSection from "./FormSection.vue";

const props = defineProps([ 
    "role",
    "selectedTab",
    "permissions",
    "savedPermissions",
    "logs",
    "logsCount",
    "logQuery",
    "selectedEvent",
])

/*---------------*
* Variables
*---------------*/
const role = ref(props.role);
const permissions = ref(props.permissions);
const activeTab = ref(props.selectedTab);
const formData = {
    name: role.value.name,
    description: role.value.description,
    permissions: props.savedPermissions,
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
    },
    {
        name: 'Activity Logs',
        value: 'activity-logs',
        count: props.logsCount
    }
];

/*--------------*
* Activity Logs
*--------------*/
const filterEvent = ref(props.selectedEvent);
const searchText = ref(props.logQuery);
const logs = computed(() => props.logs);

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.accounts.roles.edit", role.value.id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>
