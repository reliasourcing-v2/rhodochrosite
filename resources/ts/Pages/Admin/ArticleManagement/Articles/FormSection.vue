<template>
    <page-template
        size="fit"
    >
        <jet-form-section>
            <template #title>
                Article Information
            </template>

            <template #description>
                Relevant Information and other details
            </template>

            <template #form>
                <div class="col-span-12">
                    <text-input
                        v-model="form.slug"
                        label="Slug"
                        id="slug"
                        :error="form.errors.slug"
                    />
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
                    <text-input
                        v-model="form.author"
                        label="Author"
                        id="author"
                        :error="form.errors.author"
                    />
                </div>
                <div class="col-span-12">
                    
                    <selector
                        label="Article Type"
                        placeholder="Select Type"
                        v-model="form.article_type"
                        :options="selectorOptions"
                        :error="form.errors.article_type"
                    />
                </div>
                <div class="col-span-12">
                    <dropzone
                        v-model:path="form.banner_image_path"
                        v-model:file="form.banner_image_path"
                        label="Image"
                        id="banner_image_path"
                        description="Max file size: 2MB | Dimension: 1200px x 627px | Recommended file type: .webp"
                        :error="form.errors.banner_image_path"
                    />
                </div>
                <div class="col-span-12">
                    <date-picker
                        id="publish_date"
                        v-model="form.publish_date"
                        placeholder="Publish Date"
                        class="frm__date-picker font-sans"
                        :error="form.errors.publish_date"
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
                <div class="col-span-12">
                    <label class="flex items-center cursor-pointer">
                        <jet-checkbox v-model="form.is_highlight" :checked="form.is_highlight == 1"/>
                        <span class="ml-2 text-sm text-gray-600">Is Highlight</span>
                    </label>
                </div>
            </template>

            <template #actions>
                <slot />
            </template>
        </jet-form-section>
    </page-template>
</template>

<script setup lang="ts">

const props = defineProps ({
    form: {
        type: Object,
        required: true
    },
    selectorOptions: {
        type: Object
    },
    multiselectOptions: {
        type: Object
    },
    readonly: {
        type: Boolean,
        default: false
    },
});

const selectorOptions = [
    {
        id: 'blogs',
        value: 'Blogs'
    },
    {
        id: 'case-studies',
        value: 'Case Studies'
    },
]

</script>
