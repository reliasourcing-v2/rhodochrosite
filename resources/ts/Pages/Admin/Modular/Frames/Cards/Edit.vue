<template>
    <admin-layout
        title="Update Card"
        :pages="pages"
        showButton
    >
        <div class="p-4 md:p-7 space-y-5">
            <jet-form-section>
                <template #title>
                    Card
                </template>

                <template #description>
                    Relevant data and other details
                </template>

                <template #form>
                    <div class="col-span-12">
                        <dropzone
                            label="Image"
                            v-model:path="form.image"
                            v-model:file="form.image"
                            description="Max file size: 10MB | Dimension: 300px x 434px"
                            :error="form.errors.image"
                        ></dropzone>
                    </div>
                    <div class="col-span-12">
                        <text-input
                            v-model="form.title"
                            label="Title"
                            id="title"
                            :error="form.errors.title"
                        />
                    </div>
                    <div class="col-span-12">
                        <ck-editor
                            v-model="form.content"
                            label="Content"
                            id="content"
                            :error="form.errors.content"
                        ></ck-editor>
                    </div>
                    <div class="col-span-12" v-if="item.frame.card_type == 3">
                        <label class="flex items-center cursor-pointer">
                            <jet-checkbox v-model="form.accent" :checked="form.accent == 1"/>
                            <span class="ml-2 text-sm text-gray-600">With accent color</span>
                        </label>
                    </div>
                    <div class="col-span-12" v-if="item.frame.card_type == 4">
                        <dropzone
                            label="Icon"
                            v-model:path="form.icon"
                            v-model:file="form.icon"
                            description="Max file size: 10MB | Dimension: 300px x 434px"
                            :error="form.errors.icon"
                        ></dropzone>
                    </div>
                    <div class="col-span-12" v-if="item.frame.card_type == 4">
                        <text-input
                            v-model="form.linkedin_link"
                            label="Linkedin Link"
                            id="linkedin_link"
                            :error="form.errors.linkedin_link"
                        />
                    </div>
                </template>

                <template #actions>
                    <slot />
                </template>
            </jet-form-section>
        </div>
        <template #buttons>
            <action-button @click="submit">
                Update
            </action-button>
        </template>
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import { computed, ref } from "vue";
import usePRXForm from "@/composables/usePRXForm.ts";

// Components

const props = defineProps({
    item: {
        type: Object,
    },
    cardType: {
        type: Number
    }
});

/*---------------*
* Variables
*---------------*/
const isSubpage = computed(()=>window.location.pathname.includes('/admin/pages/subpage/'));
const isChild = computed(()=>window.location.pathname.includes('/admin/pages/child/'));

const formData = {
    frame_id: props.item.frame_id,
    title: props.item.title,
    content: props.item.content,
    image: props.item.image,
    accent: props.item.accent,
    icon: props.item.icon,
    linkedin_link: props.item.linkedin_link,
};

const pages = [
    {
        href: isSubpage.value ? `${route("admin.pages.subpage.edit-frame-card", props.item.frame_id)}?tab=cards` :
              isChild.value ? `${route("admin.pages.child.edit-frame", props.item.frame_id)}?tab=cards` :
                `${route("admin.pages.parent.edit-frame", props.item.frame_id)}?tab=cards`,
        name: "Frames",
    },
    {
        href: "",
        name: "Update Card",
    },
];

/*--------------*
* Functions
*--------------*/
const submitUrl = isSubpage.value ? route("admin.pages.subpage.update-frame-card", props.item.id) :
                  isChild.value ? route("admin.pages.child.update-frame-card", props.item.id) :
                  route("admin.pages.parent.update-frame-card", props.item.id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>