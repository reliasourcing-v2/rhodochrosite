<template>
    <admin-layout title="Modular Pages">
        <!-- Tabs -->
        <div>
            <Tabs
                :tabs="tabs"
                :button-items="true"
                :active-tab="activeTab"
                @update:tab="(value: string) => (activeTab = value)"
                :tab-route="tabRoute"
            >
                <template #buttons>
                    <create-button
                        :routeLink="createRoute"
                    />
                </template>
            </Tabs>
        </div>

        <div class="px-12 py-6">
            <table-container>
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
                                        {{ item.id }}
                                    </td>
                                    <td class="w-10/12">
                                        {{ item.title }}
                                    </td>
                                   
                                    <td>
                                        {{ item.created_at }}
                                    </td>
                                    <td class="text-center">
                                        <edit-button
                                        v-if="selectedTab !== 'archived'"
                                        :routeLink="route('admin.pages.parent.edit', item.id)"
                                        />

                                        <delete-button
                                            v-if="selectedTab !== 'archived'"
                                            :modal-title="`Archive ${item.title}`"
                                            :modal-name="item.title"
                                            :route-link="route('admin.pages.parent.archive', item.id)"
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

        <restore-modal
        :title="'Restore'"
        :show="showRestoreModal"
        @confirm="processRestore"
        @cancel="showRestoreModal = false"
        />
      
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import { ref, watch, computed } from "vue";
import { router } from "@inertiajs/vue3";
import pickBy from "lodash/pickBy";
import throttle from "lodash/throttle";

const props = defineProps({
    items:          { type: Object, required: true },
    allCount:       { type: Number, default: 0 },
    archivedCount:  { type: Number, default: 0 },
    selectedTab:    { type: String, default: null },
    searchQuery:    { type: String, default: null },
    filterDate:     { type: String, default: null }
});

/**---------------*
 * TEMPLATE ROUTES
 *----------------*/
const tabRoute = ref<string>(route('admin.pages.parent.index'));
const createRoute = ref<string>(route('admin.pages.parent.create'));

/**---------------*
 * VARS
 *----------------*/
const items = computed(() => props.items);
const reorder_items = ref(items);

const activeTab = ref<string>(props.selectedTab);
const showArchiveModal = ref<boolean>(false);
const showRestoreModal = ref<boolean>(false);
const selectedItem = ref<any>(null);

const tabs = ref<{ name: string, value?: string, count?: number | string}[]>([
    {
        name: 'All',
        value: null,
        count: props.allCount
    },
    {
        name: 'Archived',
        value: 'archived',
        count: props.archivedCount
    },
]);

const headers: { text: string }[] = [
    { text: 'ID' },
    { text: 'Title' },
    { text: 'Date Created'},
];

/**---------------*
 * METHODS
 *----------------*/

const selectRestore = (item: object): void => {
    selectedItem.value = item;
    showRestoreModal.value = true;
}

const processRestore =(): void => {
    router.post(
        route("admin.pages.parent.restore"),
        { id: selectedItem.value.id },
        { preserveState: false }
    )
}
</script>
