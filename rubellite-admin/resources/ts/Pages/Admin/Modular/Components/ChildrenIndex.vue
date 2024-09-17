<template>
    <table-container 
    class="mt-6 max-w-[600px] mx-auto"
    :show-footer="childrenPages.length <= 0">
        <template #header>
            <div class="w-full flex justify-between items-center">
                <div>
                    <p class="text-sm font-bold text-gray-900">Modular Children Pages</p>
                    <p class="mt-1 text-sm text-gray-500">Relevant data and other details</p>
                </div>
                <create-button 
                    :routeLink="createRoute"
                />
            </div>
        </template>
        <template #body>
            <table class="min-w-full">
                <draggable
                    v-model="items"
                    tag="tbody"
                    item-key="id"
                    @change="reorder"
                    v-bind="{
                        animation: 200,
                    }"
                >
                    <template #item="{element}">
                        <tr class="border-t cursor-move">
                            <td>
                                {{ element.id }}
                            </td>
                            <td>
                                {{ element.title }}
                            </td>
                            
                            <td class="text-right">
                                <edit-button
                                    :routeLink="route('admin.pages.child.edit', element.id)"
                                />
                                <delete-button
                                    :modal-title="`Archive ${element.title}`"
                                    :modal-name="element.title"
                                    :route-link="route('admin.pages.child.archive', element.id)"
                                />
                            </td>
                        </tr>
                    </template>
                </draggable>
            </table>
        </template>
        <template #footer>
            <div>
                <p class="text-gray-400 text-sm">No sub page available</p>
            </div>
        </template>
    </table-container>
</template>
<script lang="ts" setup>
import { ref } from 'vue';
import draggable from 'vuedraggable';
import { router } from '@inertiajs/vue3';
const props = defineProps({
    item: {
        type: Object
    },
    childrenPages: {
        type: Object
    },
})

const headers: { text: string }[] = [
    { text: 'ID' },
    { text: 'Title' },
];

const createRoute = ref<string>(route('admin.pages.child.create', props.item.id));

const items = ref(props.childrenPages);
const reorder =()=> {
    items.value.map((item, index) => {
        item.order = index + 1;
    })

    router.post(
        route('admin.pages.child.update-order'),
        { items: items.value },
        { preserveState: true }
    )
}
</script>