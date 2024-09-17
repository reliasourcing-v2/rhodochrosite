<template>
    <jet-form-section>
        <template #title>
            Modular Page
        </template>

        <template #description>
            Relevant data and other details
        </template>

        <template #form>
            <div class="col-span-12">
                <text-input
                    v-model="form.title"
                    label="Title"
                    id="title"
                    :error="form.errors.title"
                />
            </div>
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
                    v-model="form.header"
                    textarea
                    label="Header"
                    id="header"
                    :error="form.errors.header"
                />
            </div>
            <div class="col-span-12">
                <ck-editor
                    v-model="form.subtitle"
                    label="Subtitle"
                    id="subtitle"
                    :error="form.errors.subtitle"
                ></ck-editor>
            </div>
            <div class="col-span-12">
                <ck-editor
                    v-model="form.description"
                    label="Description"
                    id="description"
                    :error="form.errors.description"
                ></ck-editor>
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
