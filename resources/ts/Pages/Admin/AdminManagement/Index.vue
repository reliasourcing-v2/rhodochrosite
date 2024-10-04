<template>
    <admin-layout :pages="pages" title="Admin">
        <template #actionButtons>
            <CreateButton
                v-if="activeTab !== 'activity_logs'"
                :routeLink="route('admin.accounts.admins.create')"
            />
        </template>

        <!-- Tabs -->
        <Tabs
            :tabs="tabs"
            :button-items="true"
            :active-tab="activeTab"
            @update:tab="(value: string) => (activeTab = value)"
            :tab-route="route('admin.accounts.admins.index')"
        />
        <div class="px-12 py-6">

            <table-container>
                <template #header>
                    <filter-box
                    :search="searchText"
                    @update:searchText="(value) => (searchText = value)"
                    @update:filters="applyFilters"
                    :custom-filters="activeTab !== 'activity_logs'">
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
                    </filter-box>
                </template>

                <template #body>
                    <data-table
                        :headers="headers"
                        :no-action="false"
                        :count="items.data.length"
                    >
                        <template v-slot:body>
                            <template v-for="item in items.data" :key="item">
                                <tr>
                                    <td>
                                        {{ item.name }}
                                    </td>
                                    <td>
                                        {{ item.created_at }}
                                    </td>
    
                                    <td class="text-center">
                                        <edit-button
                                        v-if="selectedTab !== 'archived'"
                                        :routeLink="route('admin.accounts.admins.view', item.id)"
                                        />

                                        <delete-button
                                            v-if="selectedTab !== 'archived'"
                                            :modal-title="`Archive Admin ${item.name}`"
                                            :modal-name="`${item.name}`"
                                            :route-link="route('admin.accounts.admins.delete', item.id)"
                                        />
    
                                        <restore-button
                                        v-if="selectedTab === 'archived'"
                                        @click="selectRestore(item)"
                                        />
                                    </td>
                                </tr>
                            </template>
                        </template>
                    </data-table>

                </template>

                <template #footer>
                    <pagination :items="items" />
                </template>
            </table-container>
        </div>

        <DeleteModal
            title="Archive Admin"
            :show="showArchiveModal"
            :item-name="archiveItemName"
            @confirm="processArchive"
            @cancel="showArchiveModal = false"
        />

        <RestoreModal
            title="Restore Admin"
            :show="showRestoreModal"
            @confirm="processRestore"
            @cancel="showRestoreModal = false"
        />

        <ImportModal
            title="Import Admins"
            content="Are you sure you wish to import this file"
            action-text="Import"
            :show="showModal"
            :manifest-route="route('admin.accounts.admins.manifest')"
            @cancel="showModal = false"
            @confirm="importData"
        >
            <template v-slot:body>
                <dropzone
                    :label="'Import'"
                    :id="'import'"
                    :description="'CSV, XLSX upto 2MB'"
                    :preview-file="true"
                    v-model:file="importFile"
                    accept=".csv,.xls,.xlsx"
                />
            </template>
        </ImportModal>
    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";

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
    activityLogCount: {
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
    },
    // {
    //     name: 'Activity Log',
    //     value: 'activityLog',
    //     count: props.activityLogCount
    // }
];

const headers: { text: string }[] = [
    { text: 'Admin' },
    { text: 'Date Created'}
];

const pages = [

    {
        href: route("admin.accounts.admins.index"),
        name: "Admins",
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
        route('admin.accounts.admins.delete', selectedItem.value.id),
        {
            preserveState: false
        }
    )
}

const processRestore =(): void => {
    router.post(
        route("admin.accounts.admins.restore"),
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
            route("admin.accounts.admins.index"),
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
