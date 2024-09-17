<template>
    <admin-layout 
        :title="'Edit ' + frame.label" 
        :pages="pages" 
        showButton
    >
        <div v-if="form.frame_type == 1" class="p-4 md:p-7 space-y-5">
            <div class="w-[552px] m-auto">
                <p class="text-sm text-gray-500 mb-3">Image and text types</p>
                <div class="grid grid-cols-2 gap-6">
                    <label for="image-text" class="border-2 rounded p-3 transition cursor-pointer"
                        :class="form.card_type == 1 ? 'border-primary-500 hover:border-primary-500' : 'hover:border-primary-500/[0.5]'">
                        <input 
                            id="image-text" 
                            type="radio" 
                            name="frame-type" 
                            class="hidden" 
                            :value="1"
                            v-model="form.card_type"
                        >
                        <div class="w-full flex space-x-3 items-center">
                            <div class="w-4/12">
                                <div class="aspect-w-1 aspect-h-1 bg-primary-50"></div>
                            </div>
                            <div class="w-8/12 space-y-3 flex justify-between flex-col">
                                <div class="space-y-3">
                                    <div class="w-1/2 h-3 bg-primary-50"></div>
                                    <div class="w-full h-3 bg-primary-50"></div>
                                    <div class="w-full h-3 bg-primary-50"></div>
                                    <div class="w-full h-3"></div>
                                </div>
                                <div class="w-1/4 h-3 bg-primary-50"></div>
                            </div>
                        </div>
                    </label>
                    <label for="large-image" class="border-2 rounded transition cursor-pointer overflow-hidden"
                        :class="form.card_type == 2 ? 'border-primary-500 hover:border-primary-500' : 'hover:border-primary-500/[0.5]'">
                        <input 
                            id="large-image" 
                            type="radio" 
                            name="frame-type" 
                            class="hidden" 
                            :value="2"
                            v-model="form.card_type"
                        >
                        <div class="w-full flex space-x-3">
                            <div class="w-6/12">
                                <div class="w-full h-full bg-primary-50"></div>
                            </div>
                            <div class="w-6/12 space-y-3 flex justify-between flex-col py-4 pr-3">
                                <div class="space-y-3">
                                    <div class="w-1/2 h-3 bg-primary-50"></div>
                                    <div class="w-full h-3 bg-primary-50"></div>
                                    <div class="w-full h-3 bg-primary-50"></div>
                                    <div class="w-full h-3"></div>
                                </div>
                                <div class="w-1/4 h-3 bg-primary-50"></div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <jet-form-section>
                <template #title>
                    Frame Details
                </template>

                <template #description>
                    Relevant data and other details
                </template>

                <template #form>
                    <div class="col-span-12">
                        <label class="flex items-center cursor-pointer">
                            <jet-checkbox v-model="form.image_first" :checked="form.image_first == 1"/>
                            <span class="ml-2 text-sm text-gray-600">Image first</span>
                        </label>
                    </div>
                    <div class="col-span-12">
                        <dropzone
                            label="Image"
                            v-model:path="form.image"
                            v-model:file="form.image"
                            description="Max file size: 10MB | Dimension: 300px x 434px"
                            :error="form.errors.image_path"
                        ></dropzone>
                    </div>
                    <div class="col-span-12">
                        <ck-editor
                            v-model="form.title"
                            label="Title"
                            id="title"
                            :error="form.errors.title"
                        ></ck-editor>
                    </div>
                    
                    <div class="col-span-12">
                        <ck-editor
                            v-model="form.content"
                            label="Content"
                            id="content"
                            :error="form.errors.content"
                        ></ck-editor>
                    </div>

                    <div class="col-span-12">
                        <text-input
                            v-model="form.button_text"
                            label="Button Text"
                            id="button_text"
                            :error="form.errors.button_text"
                        />
                    </div>

                    <div class="col-span-12">
                        <text-input
                            v-model="form.button_link"
                            label="Button Link"
                            id="button_link"
                            :error="form.errors.button_link"
                        />
                    </div>
                    <div class="col-span-12">
                        <text-input
                            v-model="form.custom_class"
                            label="Custom Class"
                            id="button_link"
                            :error="form.errors.custom_class"
                        />
                    </div>
                </template>

                <template #actions>
                    <slot />
                </template>
            </jet-form-section>
        </div>
        <div v-if="form.frame_type == 2" class="p-4 md:p-7 space-y-10 flex">
            <div class="w-4/12 pr-10">
                <p class="text-sm text-gray-500 mb-3">Card types</p>
                <div class="grid grid-cols-2 gap-3">
                    <label for="white-card" class="border-2 rounded p-3 transition cursor-pointer"
                        :class="form.card_type == 1 ? 'border-primary-500 hover:border-primary-500' : 'hover:border-primary-500/[0.5]'">
                        <input 
                            id="white-card" 
                            type="radio" 
                            name="frame-type" 
                            class="hidden" 
                            :value="1"
                            v-model="form.card_type"
                        >
                        <div class="w-full">
                            <div class="flex w-full space-x-2 mb-3">
                                <div class="w-4 h-4 rounded-full bg-primary-50"></div>
                                <div class="w-[calc(100%-24px)] h-4 bg-primary-50"></div>
                            </div>
                            <div class="w-full h-20 bg-primary-50"></div>
                        </div>
                    </label>
                    <label for="dark-card" class="border-2 rounded p-3 transition cursor-pointer"
                        :class="form.card_type == 2 ? 'border-primary-500 bg-primary-700 hover:border-primary-500' : 'hover:border-primary-500/[0.5] bg-primary-700'">
                        <input 
                            id="dark-card" 
                            type="radio" 
                            name="frame-type" 
                            class="hidden" 
                            :value="2"
                            v-model="form.card_type"
                        >
                        <div class="w-full">
                            <div class="flex w-full space-x-2 mb-3">
                                <div class="w-4 h-4 rounded-full bg-primary-50"></div>
                                <div class="w-[calc(100%-24px)] h-4 bg-primary-50"></div>
                            </div>
                            <div class="w-full h-20 bg-primary-50"></div>
                        </div>
                    </label>
                    <label for="accent-card" class="border-2 rounded p-3 transition cursor-pointer"
                        :class="form.card_type == 3 ? 'border-primary-500 hover:border-primary-500' : 'hover:border-primary-500/[0.5]'">
                        <input 
                            id="accent-card" 
                            type="radio" 
                            name="frame-type" 
                            class="hidden" 
                            :value="3"
                            v-model="form.card_type"
                        >
                        <div class="w-full">
                            <div class="flex w-full space-x-2 mb-3">
                                <div class="w-5/12 h-2 bg-primary-50"></div>
                            </div>
                            <div class="w-10/12 h-2 bg-primary-50 mb-2"></div>
                            <div class="w-10/12 h-2 bg-primary-50 mb-2"></div>
                            <div class="w-10/12 h-2 bg-primary-50 mb-2"></div>
                            <div class="w-10/12 h-2 bg-primary-50 mb-2"></div>
                            <div class="w-10/12 h-2 bg-primary-50 mb-2"></div>
                            <div class="flex justify-end w-full">
                                <div class="w-4 h-4 bg-primary-50"></div>
                            </div>
                        </div>
                    </label>
                    <label for="team-card" class="border-2 rounded p-3 transition cursor-pointer"
                        :class="form.card_type == 4 ? 'border-primary-500 hover:border-primary-500' : 'hover:border-primary-500/[0.5]'">
                        <input 
                            id="team-card" 
                            type="radio" 
                            name="frame-type" 
                            class="hidden" 
                            :value="4"
                            v-model="form.card_type"
                        >
                        <div class="w-full">
                            <div class="w-8/12 mx-auto h-20 bg-primary-50 mb-2"></div>
                            <div class="w-full h-5 bg-primary-50 mb-2"></div>
                            <div class="w-full h-2 bg-primary-50"></div>
                        </div>
                    </label>
                </div>
            </div>
           
            <div class="w-8/12">
                <card-index 
                :cards="cards"
                :create-route="'admin.pages.parent.create-frame-card'"
                :edit-route="'admin.pages.parent.edit-frame-card'"
                :id="frame.id" />
            </div>
        </div>
        <template #buttons>
            <delete-button
                :icon="false"
                :modal-title="`Delete ${form.label}`"
                :modal-name="form.label"
                :route-link="route('admin.pages.parent.delete-frame', form.id)"
            />
            <action-button
            class="!ml-2"
            @click="submit">
                Update
            </action-button>
        </template>
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import { ref } from "vue";
import usePRXForm from "@/composables/usePRXForm.ts";
import draggable from 'vuedraggable';
import { router } from '@inertiajs/vue3';
import CardIndex from "@/Pages/Admin/Modular/Components/CardIndex.vue";

// Components

const props = defineProps({
    frame: {
        type: Object,
    },
    cards: {
        type: Object,
    },
});

/*---------------*
* Variables
*---------------*/

const createRoute = ref<string>(route('admin.pages.parent.create-frame-card', props.frame.id));

const formData = {
    id: props.frame.id,
    parent_page_id: props.frame.parent_page_id,
    custom_class: props.frame.custom_class,
    label: props.frame.label,
    image_first: props.frame.image_first,
    frame_type: props.frame.frame_type,
    card_type: props.frame.card_type,
    image: props.frame.image,
    title: props.frame.title,
    content: props.frame.content,
    button_text: props.frame.button_text,
    button_link: props.frame.button_link,
};

const pages = [
    {
        href: `${route('admin.pages.parent.edit', props.frame.parent_page_id)}?tab=frames`,
        name: "Frames",
    },
    {
        href: "",
        name: "Edit",
    },
];

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.pages.parent.update-frame", props.frame.id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);

const items = ref(props.cards);
const reorder =()=> {
    items.value.map((item, index) => {
        item.frame_order = index + 1;
    })

    router.post(
        route('admin.pages.parent.update-card-order'),
        { items: items.value },
        { preserveState: true }
    )
}
</script>