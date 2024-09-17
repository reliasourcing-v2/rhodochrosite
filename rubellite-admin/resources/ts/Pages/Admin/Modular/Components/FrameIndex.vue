<template>
    <table-container class="mt-6 max-w-[600px] mx-auto">
        <template #header>
            <div class="w-full flex justify-between items-center">
                <div>
                    <p class="text-sm font-bold text-gray-900">Frames</p>
                    <p class="mt-1 text-sm text-gray-500">Relevant data and other details</p>
                </div>
                <create-button 
                    :routeLink="route(createRoute, id)"
                />
            </div>
        </template>
        <template #body>
            <div class="px-6">
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
                            <tr class="cursor-move">
                                <td class="px-0 py-2">
                                    <a 
                                    class="block"
                                    :href="route(editRoute, element.id)">
                                        <p class="mb-2 text-xs">{{ element.label }}</p>
                                        <image-text v-if="element.frame_type == 1" />
                                        <cards v-if="element.frame_type == 2" />
                                    </a>
                                </td>
                            </tr>
                        </template>
                    </draggable>
                </table>
            </div>
        </template>
        <template #footer>
            <div v-if="frames.length <= 0">
                <p class="text-gray-400 text-sm">No frame available</p>
            </div>
        </template>
    </table-container>
</template>
<script lang="ts" setup>
import { ref, computed } from 'vue';
import ImageText from './FrameTypes/ImageText.vue';
import Cards from './FrameTypes/Cards.vue';
import draggable from 'vuedraggable';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    id: { 
        type: Number 
    },
    frames: {
        type: Object
    },
    createRoute: { 
        type: String 
    },
    editRoute: { 
        type: String 
    },
})

const items = ref(props.frames);
const reorder =()=> {
    items.value.map((item, index) => {
        item.order = index + 1;
    })

    router.post(
        route('admin.pages.frame.update-order'),
        { items: items.value },
        { preserveState: true }
    )
}
</script>