<template>
    <admin-layout title="Computation">
        <header-section
            :header="headerContent"
            :breadcrumbs="breadcrumbs"
        >
        </header-section>
        <Tabs
            :tabs="tabs"
            :active-tab="activeTab"
            @update:tab="(value: string) => (activeTab = value)"
            :tab-route="route('admin.computation.index')"
        />
        <page-template>
            <div class="px-6 py-4">
                <Filter
                    :search="searchText"
                    @update:searchText="(value) => (searchText = value)"
                    @update:filters="applyFilters"
                    :custom-filters="activeTab !== 'activity_logs'"
                    :sidebarFilters="false"
                    :dropdownFilterOptions="dropdownFilterOptions"
                    :custom-filter="false"
                >
                </Filter>
            </div>
            <div>
                <div v-if="activeTab !== 'activity_logs'">
                    <DataTable
                        :headers="headers"
                        :no-action="false"
                        :count="items.data.length"
                    >
                        <template v-slot:body>
                            <template v-for="item in items.data" :key="item">
                                <tr class="h-20">
                                    <td class="first:pl-6 last:pr-6 px-4 whitespace-nowrap text-gray-900 w-1">
                                        {{ item.id }}
                                    </td>
                                    <td class="first:pl-6 last:pr-6 px-4 whitespace-nowrap text-gray-900 w-1">
                                        {{ item.email }}
                                    </td>
                                    <td class="first:pl-6 last:pr-6 px-4 whitespace-nowrap text-gray-900 w-1">
                                        {{ new Date(item.created_at) }}
                                    </td>
                                    <td
                                        class="
                                            first:pl-6 last:pr-6 px-6
                                            whitespace-nowrap w-1
                                            text-center
                                        "
                                    >
                                        <template v-if="selectedTab !== 'archived'">
                                            <edit-button
                                                :routeLink="route('admin.computation.view', item.id)"
                                            />
                                            <delete-button
                                                v-if="selectedTab !== 'archived'"
                                                :modal-title="`Archive Computation #${item.id}`"
                                                :modal-name="`${item.id}`"
                                                :route-link="route('admin.computation.delete', item.id)"
                                            />
                                        </template>

                                        <restore-button
                                            v-if="selectedTab === 'archived'"
                                            @click="selectRestore(item)"
                                        />
                                    </td>
                                </tr>
                            </template>
                        </template>
                    </DataTable>
                </div>
                <pagination :items="items" />
            </div>
        </page-template>
        <DeleteModal
            title="Archive Computation"
            :show="showArchiveModal"
            :item-name="archiveItemName"
            @confirm="processArchive"
            @cancel="showArchiveModal = false"
        />

        <RestoreModal
            title="Restore Computation"
            :show="showRestoreModal"
            @confirm="processRestore"
            @cancel="showRestoreModal = false"
        />
    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    items: {
        type : Object,
        default: () => {},
        require: true,
    },
    activeCount: {
        type : Number,
        default: 0
    },
    archivedCount: {
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
    },
    recipients: {
        type: String,
        default: null
    }
});

/**---------------*
 * VARS
 *----------------*/
const items = computed(() => props.items);

const searchText = ref<string>(props.query);
const activeTab = ref<string>(props.selectedTab ?? 'active');
const filterDate = ref<string>(props.filterDate);
const showArchiveModal = ref<boolean>(false);
const showRestoreModal = ref<boolean>(false);
const selectedItem = ref<any>(null);

const dropdownFilterOptions = [
    {
        id: 1,
        value: 'created_at',
        label: "Date Created"
    },
    {
        id: 2,
        value: 'name',
        label: 'Name'
    }
]

const headerContent = {
    title: 'Computations',
    icon: '/icons/nav/ic-nav-inquiry.svg'
}

const breadcrumbs = [
    {
        title: 'Computation',
    },
    {
        title: 'Index',
        route: route('admin.computation.index')
    }
]


interface tab {
    name: string,
    value: string,
    count?: number,
    icon?: string,
    iconActive?: string
}

const tabs:tab[] = [
    {
        name: 'Active',
        value: 'active',
        count: props.activeCount
    },
    {
        name: 'Archived',
        value: 'archived',
        count: props.archivedCount
    },
    // {
    //     name: 'Activity Logs',
    //     value: 'activity_logs',
    //     count: null,
    // }
];

const headers: { text: string }[] = [
    { text: 'ID' },
    { text: 'Email' },
    { text: 'Date Created' },
];


/**---------------*
 * METHODS
 *----------------*/

const splitDate = (date, index) => {
    let temp = date.split('-')
    return temp[index]
}

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
        route('admin.computation.delete', selectedItem.value.id),
        {
            preserveState: false
        }
    )
}

const processRestore =(): void => {
    router.post(
        route("admin.computation.restore"),
        { id: selectedItem.value.id },
        { preserveState: false }
    )
}


const form = useForm({
    emailRecipients: null,
})

/**---------------*
 * WATCHERS
 *----------------*/

watch(
    searchText,
    throttle((val: string) => {
        router.get(
            route("admin.computation.index"),
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
