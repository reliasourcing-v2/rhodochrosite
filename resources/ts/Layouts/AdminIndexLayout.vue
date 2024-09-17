<template>
    <admin-layout
        :title="title"
        :backUrl="backUrl"
        :pages="pages"
        :showBack="typeof backUrl == 'string'"
    >
        <!-- Action Buttons -->
        <template #actionButtons>
            <slot name="tab-buttons" />
        </template>

        <!-- Tabs -->
        <Tabs
            v-if="!noTabs"
            :tabs="tabs"
            :button-items="true"
            :active-tab="pageFilters.tab"
            @update:tab="(value) => (pageFilters.tab = value)"
            :tab-route="tabRoute"
        />

        <!-- Additional Tabs -->
        <slot name="additional-tabs" />

        <div class="px-12 py-6 bg-white">
            <div v-if="pageFilters.tab !== 'activity_logs'" class="">
                <table-container>
                    <template #header>

                        <!-- Filter Box -->
                        <FilterBox
                            :search="pageFilters.query"
                            @update:searchText="
                                (value) => (pageFilters.query = value)
                            "
                            @update:filters="applyFilters"
                            @update:sort="applySort"
                            :sort-options="sortOptions"
                            :custom-filters="
                                pageFilters.tab !== 'activity_logs'
                            "
                            :placeholder="searchPlaceholder"
                            :showButtons="showFilterButtons"
                            withLayoutButtons
                        >
                            <!-- Layout Buttons -->
                            <template #layoutButtons>
                                <slot name="layoutButtons" />
                            </template>

                            <!-- Filters -->
                            <template #fields>
                                <div class="mb-6" v-if="hasDefaultFilter">
                                    <date-picker
                                        id="filterDate"
                                        label="Date Created"
                                        placeholder="Filter Date Created"
                                        format="MM/dd/yyyy"
                                        v-model="pageFilters.date"
                                        :enableTimePicker="false"
                                        :partialRange="false"
                                        :range="true"
                                        @update:modelValue="
                                            (value) =>
                                                (pageFilters.date = value)
                                        "
                                    />
                                </div>

                                <!-- Additional Filters -->
                                <slot name="additional-filters" />
                            </template>
                        </FilterBox>
                    </template>

                    <!-- Body -->
                    <template #body>
                        <template v-if="pageFilters.tab !== 'activity_logs'">

                            <!-- Data Table -->
                            <DataTable
                                v-if="isDataTable"
                                :headers="headers"
                                :no-action="noAction"
                                :with-checkbox="withCheckbox"
                                :count="items.data.length"
                                @header:checked="
                                    (val) => $emit('header:checked', val)
                                "
                            >
                                <!-- Table Body -->
                                <template v-slot:body>
                                    <slot name="datatable-body" />
                                </template>
                            </DataTable>

                            <slot name="additional-view" />

                        </template>
                    </template>

                    <!-- Footer -->
                    <template #footer>

                        <!-- Pagination -->
                        <pagination
                            v-if="pageFilters.tab !== 'activity_logs' && isDataTable"
                            class="mb-4 w-full"
                            :items="items"
                        />
                    </template>
                </table-container>
            </div>

            <!-- Activity Logs -->
            <activity-logs
                v-if="pageFilters.tab === 'activity_logs'"
                :logs="items"
                :result-route="tabRoute"
                tab="activity_logs"
                :query="pageFilters.query"
                :rows="10"
            />
        </div>
    </admin-layout>
</template>
<script setup lang="ts">
import FilterBox from "@/Components/Containers/FilterBox.vue";
import {
    FilterFormat,
    TabFormat,
    HeaderFormat,
} from "@/Contracts/IndexLayoutInterfaces";
import { Page } from "@/Contracts/GeneralInterface";
import { PaginationInterface } from "@/Contracts/Pagination";
import { PageProps } from "@inertiajs/core";
import { router, usePage } from "@inertiajs/vue3";
import debounce from "lodash/debounce";
import pickBy from "lodash/pickBy";
import { computed, toRef, watch, PropType, ref } from "vue";
import { OptionFormat } from "@/Contracts/General";

interface BaseProps extends PageProps {
    items: PaginationInterface;
    activeCount: number;
    archivedCount: number;
    activityLogCount: number;
    tab: string;
    query: string;
    date: string;
    sort: string;
    order: string;
}

/**---------------*
 * VARS
 *----------------*/

const baseProps = computed(() => usePage<BaseProps>().props);
const props = defineProps({
    title            : { type: String, required: true },
    items            : { type: Object as PropType<PaginationInterface>, required: true },
    tabRoute         : { type: String, required: true },
    backUrl          : { type: String, default: null },
    headers          : { type: Array<HeaderFormat>, required: true },
    pages            : { type: Array<Page>, default: [] },
    tabs             : { type: Array<TabFormat>, default: [] },
    filters          : { type: Object as PropType<FilterFormat>, default: {} },
    noAction         : { type: Boolean, default: false },
    withCheckbox     : { type: Boolean, default: false },
    noTabs           : { type: Boolean, default: false },
    searchPlaceholder: { type: String, default: "Search" },
    sortOptions      : {
        type   : Array<OptionFormat>,
        default: [{ id: "created_at", value: "Created At" }],
    },
    hasDefaultFilter : { type: Boolean, default: true},
    showFilterButtons: { type: Boolean, default: true },
    isDataTable      : { type: Boolean, default: true }
});

const filterProp = toRef(props, "filters");
const filters    = ref(filterProp.value);

const count = computed<number>(() => props.items.data.length);
const tabs  = computed<TabFormat[]>(() =>
    props.tabs.length
        ? props.tabs
        : [
            { name: "All", value: null, count: baseProps.value.activeCount },
            {
                name: "Archived",
                value: "archived",
                count: baseProps.value.archivedCount,
            },
            {
                name: "Activity Logs",
                value: "activity_logs",
                count: baseProps.value.activityLogCount,
            },
        ]
);

const pageFilters = ref(
    Object.assign(filters.value, {
        tab: baseProps.value.tab,
        query: baseProps.value.query,
        date: baseProps.value.date,
        sort: baseProps.value.sort,
        order: baseProps.value.order,
    })
);

/**---------------*
 * METHODS
 *----------------*/

const updateFilters = () => {
    pageFilters.value = Object.assign(filters.value, {
        tab: baseProps.value.tab,
        query: baseProps.value.query,
        date: baseProps.value.date,
        sort: baseProps.value.sort,
        order: baseProps.value.order,
    });
};

const applyFilters = (): void => {
    router.get(props.tabRoute, pickBy(pageFilters.value), {
        preserveState: true,
    });
};

const applySort = (options): void => {
    pageFilters.value = Object.assign(pageFilters.value, options);
    applyFilters();
};

/**---------------*
 * WATCHERS
 *----------------*/

watch(
    () => filterProp.value,
    () => (filters.value = filterProp.value)
);

watch(
    () => filters.value,
    () => updateFilters()
);

watch(() => pageFilters.value, applyFilters);

watch(
    () => pageFilters.value.query,
    debounce(() => {
        applyFilters();
    }, 500)
);

defineExpose({
    applyFilters,
});
</script>
