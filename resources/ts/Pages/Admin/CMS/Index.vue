<template>
    <admin-layout
    title="Pages"
    >
        <div class="px-12 py-6">
            <DataTable 
            :headers="headers" 
            :count="items.length"
            noBorder
            class="border border-gray-100 rounded-lg overflow-hidden">
                <template v-slot:body>
                    <template v-for="page in items" :key="page.slug">
                        <tr>
                            <td>
                                {{ page.label }}
                            </td>
                            <td>
                                {{ page.updated_at }}
                            </td>
                            <td>
                                {{ page.created_at }}
                            </td>
                            <td class="text-center">
                                <edit-button
                                    :routeLink="route('admin.cms.edit', page.id) + '?tab=section1'"
                                />
                            </td>
                        </tr>
                    </template>
                </template>
            </DataTable>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
import { computed } from "vue";

const props = defineProps({
    items: {
        type: Object
    }
})
const items = computed(() => props.items);

const headers = [
    { text: "Label", value: "Label" },
    { text: "Last Updated", value: "Last Updated" },
    { text: "Date Created", value: "Created" },
];
</script>
