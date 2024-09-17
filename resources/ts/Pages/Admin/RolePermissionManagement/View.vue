<template>
    <admin-layout :pages="pages">
        <!-- Tabs -->
        <Tabs
            :tabs="tabs"
            :button-items="true"
            :active-tab="activeTab"
            @update:tab="(value: string) => (activeTab = value)"
            :tab-route="route('admin.accounts.admins.index')"
        />
        <div class="px-12 py-6">
            <div v-if="activeTab !== 'activity_logs'" class="border rounded-lg overflow-hidden">
                <DataTable
                    :headers="headers"
                    no-action
                    no-border
                    :count="5"
                >
                    <template v-slot:body>
                        <template v-for="item in permissions" :key="item">
                            <tr>
                                <td
                                    class="w-[84%] px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                >
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">
                                                {{ item.name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ item.description }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td
                                    class="w-[8%] px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                >
                                    <CheckIcon class="w-5 h-5" v-if="item.permissionStatus===true"/>
                                </td>

                                <td
                                    class="w-[8%] px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                >
                                    <CheckIcon class="w-5 h-5" v-if="item.permissionStatus===false" />
                                </td>
                               
                            </tr>
                        </template>
                    </template>
                </DataTable>
                <pagination :items="role" />
            </div>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import { CheckIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    role: {
        type : Object,
        default: () => {},
        require: true,
    },
    usersCount: {
        type : Number,
        default: 0
    },
    selectedTab: {
        type : String,
        default: null
    },
    query: {
        type : String,
        default: null
    },
    filterDate: {
        type : String,
        default: null
    }
});

/**---------------*
 * VARS
 *----------------*/
const role = computed(() => props.role);

const searchText = ref<string>(props.query);
const activeTab = ref<string>(props.selectedTab);
const filterDate = ref<string>(props.filterDate);
const showArchiveModal = ref<boolean>(false);
const showRestoreModal = ref<boolean>(false);
const selectedItem = ref<any>(null);

const tabs: { name: string, value?: string, count?: Number }[] = [
    {
        name: 'Permissions',
        value: null,
    },
    {
        name: 'Users',
        value: 'users',
        count: props.usersCount
    }
];

const headers: { text: string }[] = [
    { text: 'Permission' },
    { text: 'Yes' },
    { text: 'No' },
];

const pages = [
    {
        href: route("admin.accounts.roles.index"),
        name: "Roles",
    },
    {
        href: "",
        name: "View",
    },
];

const permissions = [
    {
        name: "Manage Dashboard",
        description: "Allow the Admin to access the dashboard",
        permissionStatus: true
    },
    {
        name: "Manage Trips",
        description: "Allow the Admin to access the trips",
        permissionStatus: false
    },
    {
        name: "Manage Cash Liquidation",
        description: "Allow the Admin to access the cash liquidation",
        permissionStatus: true
    },
    {
        name: "Manage Doc Liquidation",
        description: "Allow the Admin to access the doc liquidation",
        permissionStatus: true
    },
    {
        name: "Manage Invoice",
        description: "Allow the Admin to access the invoice",
        permissionStatus: false
    },
    {
        name: "Manage Payroll",
        description: "Allow the Admin to access the payroll",
        permissionStatus: true
    },
]

/**---------------*
 * METHODS
 *----------------*/
const applyFilters = (): void => {
    router.get(
        route(route().current()),
        pickBy({
            date: filterDate.value,
            tab: props.selectedTab
        }),
        {
            preserveState: true
        }
    )
}
/**---------------*
 * WATCHERS
 *----------------*/

watch(
    searchText,
    throttle((val: string) => {
        router.get(
            route("admin.accounts.roles.index"),
            pickBy({
                query: val,
                tab: props.selectedTab
            }), // removes falsey values
            {
                preserveState: true,
            }
        );
    }, 1000)
);
</script>
