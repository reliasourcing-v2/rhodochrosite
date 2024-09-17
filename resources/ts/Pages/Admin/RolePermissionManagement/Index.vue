<template>
    <admin-layout :pages="pages" title="Roles">
        <div class="px-12 py-6">
            <!-- Filter -->
            <div class="px-6 py-4 border-l border-t border-r  rounded-t-lg" v-if="activeTab !== 'activity_logs'">
                <FilterBox
                    :search="searchText"
                    @update:searchText="(value) => (searchText = value)"
                    @update:filters="applyFilters"
                    :custom-filters="activeTab !== 'activity_logs'"
                >
                    <template #fields>
                        <div class="mb-6">
                            <date-picker
                                id="filterDate"
                                label="Date Created"
                                placeholder="Filter Date Created"
                                v-model="filterDate"
                                :enableTimePicker="false"
                                @update:modelValue="(value) => (filterDate = value)"
                            />
                        </div>
                    </template>
                </FilterBox>
            </div>

            <div v-if="activeTab !== 'activity_logs'" class="border-l border-b border-r rounded-b-lg overflow-hidden">
                <DataTable
                    :headers="headers"
                    :no-action="true"
                    :count="items.data.length"
                >
                    <template v-slot:body>
                        <template v-for="role in items.data" :key="role.name">
                            <tr>
                                <td class="w-full px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ role.name }}
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium"
                                >
                                    <template v-if="activeTab !== 'archived'">
                                        <edit-button
                                            class="mr-3"
                                            :routeLink="route('admin.accounts.roles.view', role.id)"
                                        />
                                    </template>
                                </td>
                            </tr>
                        </template>
                    </template>
                </DataTable>
                <pagination :items="items" />
            </div>
        </div>

    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";

const props = defineProps([
    "items", 
    "activeCount", 
    "archivedCount", 
    "selectedTab", 
    "query",
    "filterDate",
]);


/**---------------*
 * VARS
 *----------------*/
const items = computed(() => props.items);

const searchText = ref<string>(props.query);
const activeTab = ref<string>(props.selectedTab);
const filterDate = ref<string>(props.filterDate);
const showArchiveModal = ref<boolean>(false);
const showRestoreModal = ref<boolean>(false);
const selectedItem = ref<any>(null);

const tabs: { name: string, value?: string, count?: Number }[] = [
    {
        name: 'Active',
        value: null,
        count: props.activeCount
    },
    {
        name: 'Archived',
        value: 'archived',
        count: props.archivedCount
    }
];

const headers: { text: string }[] = [
    { text: 'Role' },
    { text: ''}
];

const pages = [
    {
        href: route("admin.accounts.roles.index"),
        name: "Roles",
    },
    {
        href: "",
        name: "Index",
    },
];

/**---------------*
 * METHODS
 *----------------*/
const applyFilters = (): void => {
    router.get(
        route(route().current()),
        pickBy({
            date: filterDate.value
        }),
        {
            preserveState: true
        }
    )
}

const archiveItemName = computed(() =>
    selectedItem.value ? selectedItem.value.name : ""
);

const selectArchive = (item: object): void => {
    selectedItem.value = item;
    showArchiveModal.value = true;
}

const selectRestore = (item: object): void => {
    selectedItem.value = item;
    showRestoreModal.value = true;
}

const processArchive = (): void => {
    router.delete(
        route('admin.accounts.admins.delete', selectedItem.value.id),
        {
            preserveState: false
        }
    )
}

const processRestore =(): void => {
    router.post(
        route("admin.accounts.roles.restore"),
        { id: selectedItem.value.id },
        { preserveState: false }
    )
}

/*---------------*
* Import Modal  *
*---------------*/
const showModal = ref(false);
const importFile = ref(null);

const importModal = () => {
    showModal.value = true;
}

const importData = () => {
    router.post(
        route("admin.accounts.admins.import"),
        {
            file: importFile.value,
        },
        {
            preserveState: false,
            preserveScroll: true,
        }
    );
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
