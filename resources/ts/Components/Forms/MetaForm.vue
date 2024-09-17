<template>
    <jet-form-section>
        <template #title>
            SEO Metadata
        </template>

        <template #description>
            Enter your SEO data such as title, description, image.
        </template>

        <template #form>
            <div class="col-span-12">
                <text-input
                    v-model="form.meta_title"
                    label="Title"
                    id="meta_title"
                    :error="form.errors.meta_title"
                />
            </div>
            <div class="col-span-12">
                <text-input
                    v-model="form.meta_description"
                    label="Description"
                    id="meta_description"
                    textarea
                    :error="form.errors.meta_description"
                />
            </div>
            <div class="col-span-12">
                <text-input
                    v-model="form.meta_keyword"
                    label="Keyword"
                    id="seo_keyword"
                    textarea
                    :error="form.errors.meta_keyword"
                />
            </div>
            <div class="col-span-12">
                <dropzone
                    v-model:path="form.meta_image"
                    v-model:file="form.meta_image"
                    label="Image"
                    id="seo_image"
                    description="Max file size: 2MB | Dimension: 1200px x 627px"
                    :error="form.errors.meta_image"
                />
            </div>
        </template>

        <template #actions>
            <slot />
        </template>
    </jet-form-section>
</template>

<script setup lang="ts">
defineProps ({
    form: {
        type: Object,
        required: true
    }
});
</script>