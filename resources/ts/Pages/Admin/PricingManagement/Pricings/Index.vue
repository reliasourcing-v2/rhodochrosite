<template>
    <admin-layout title="Pricings">
        <header-section
            :header="headerContent"
            :breadcrumbs="breadcrumbs"
        >
        </header-section>
        <Tabs
            :tabs="tabs"
            :button-items="true"
            :active-tab="activeTab"
            @update:tab="(value: string) => (activeTab = value)"
            :tab-route="route('admin.pricing-management.pricings.index')"
        >
            <template #buttons>
                <create-button
                    :routeLink="route('admin.pricing-management.pricings.create')"
                />
            </template>
        </Tabs>
        <page-template>
            <div class="px-6 py-4">
                <Filter
                    :search="searchText"
                    placeholder="Search Title"
                    @update:searchText="(value) => (searchText = value)"
                    @update:filters="applyFilters"
                    :custom-filters="false"
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
                                    <td class="first:pl-6 last:pr-6 px-6 whitespace-nowrap text-gray-900 w-1">
                                        {{ item.id }}
                                    </td>
                                    <td class="first:pl-6 last:pr-6 px-6 whitespace-nowrap text-gray-900 w-1">
                                        {{ item.role }}
                                    </td>
                                    <td class="first:pl-6 last:pr-6 px-6 whitespace-nowrap text-gray-900 w-1">
                                        {{ item.country }}
                                    </td>
                                    <td class="first:pl-6 last:pr-6 px-6 whitespace-nowrap text-gray-900 w-1">
                                        {{ item.experience }}
                                    </td>
                                    <td
                                        class="
                                            first:pl-6 last:pr-6 px-4
                                            whitespace-nowrap w-1
                                            text-center
                                        "
                                    >
                                        <template v-if="selectedTab !== 'archived'">
                                            <edit-button
                                                class="mr-3"
                                                :routeLink="route('admin.pricing-management.pricings.edit', item.id)"
                                            />
                                            <delete-button
                                                :modal-title="`Archive Item #${item.id}`"
                                                :modal-name="`Item #${item.id}`"
                                                :route-link="route('admin.pricing-management.pricings.archive', item.id)"
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

        <RestoreModal
            title="Restore Item"
            :show="showRestoreModal"
            @confirm="processRestore"
            @cancel="showRestoreModal = false"
        />
    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref } from "vue";
import { router } from "@inertiajs/vue3";
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
const activeTab = ref<string>(props.selectedTab ?? 'active');
const filterDate = ref<string>(props.filterDate);
const showArchiveModal = ref<boolean>(false);
const showRestoreModal = ref<boolean>(false);
const selectedItem = ref<any>(null);

const headerContent = {
    title: 'Articles',
    icon: '/icons/nav/ic-nav-stylesheet.svg'
}

const breadcrumbs = [
    {
        title: 'Pricing',
    },
    {
        title: 'Index',
        route: route('admin.pricing-management.pricings.index')
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
];

const headers: { text: string }[] = [
    { text: 'ID' },
    { text: 'Role' },
    { text: 'Country' },
    { text: 'Experience level' },
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

const processRestore =(): void => {
    router.post(
        route("admin.article-management.articles.restore"),
        { id: selectedItem.value.id },
        { preserveState: false }
    )
}

</script>
