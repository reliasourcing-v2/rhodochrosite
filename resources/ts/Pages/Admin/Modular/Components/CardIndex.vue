<template>
    <table-container 
    :show-footer="cards.length <= 0">
        <template #header>
            <div class="w-full flex justify-between items-center">
                <div>
                    <p class="text-sm font-bold text-gray-900">Cards</p>
                    <p class="mt-1 text-sm text-gray-500">Relevant data and other details</p>
                </div>
                <create-button 
                :routeLink="route(createRoute, id)"
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
                                {{ element.title }}
                            </td>
                            
                            <td class="text-right">
                                <edit-button
                                    :routeLink="route(editRoute, element.id)"
                                />
                                <delete-button
                                    :modal-title="`Archive ${element.title}`"
                                    :modal-name="element.title"
                                    :route-link="route('admin.pages.frame.delete-card', element.id)"
                                />
                            </td>
                        </tr>
                    </template>
                </draggable>
            </table>
        </template>
        <template #footer>
            <p class="text-gray-400 text-sm">No cards available</p>
        </template>
    </table-container>
</template>
<script lang="ts" setup>
import { ref } from 'vue';
import draggable from 'vuedraggable';
import { router } from '@inertiajs/vue3';
const props = defineProps({
    id: { 
        type: Number 
    },
    cards: {
        type: Object
    },
    createRoute: { 
        type: String 
    },
    editRoute: { 
        type: String 
    },
    deleteRoute: { 
        type: String 
    },
})

const headers: { text: string }[] = [
    { text: 'ID' },
    { text: 'Title' },
];

const items = ref(props.cards);
const reorder =()=> {
    items.value.map((item, index) => {
        item.order = index + 1;
    })

    router.post(
        route('admin.pages.frame.update-card-order'),
        { items: items.value },
        { preserveState: true }
    )
}

</script>