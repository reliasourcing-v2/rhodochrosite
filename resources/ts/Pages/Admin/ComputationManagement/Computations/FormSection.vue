<template>
    <page-template
        size="fit"
    >
    <jet-form-section>
        <template #title>
            Application Information
        </template>

        <template #description>
            Relevant Information and other details
        </template>

        <template #form>
            <div class="col-span-12">
                <text-input
                    type="email"
                    v-model="form.email"
                    label="Email"
                    id="email"
                    name="email"
                    required
                    disabled
                    :error="form.errors.email"
                />
            </div>

            <div class="col-span-12 pb-6 border-b">
                <label class="block text-sm text-gray-500 mb-2">PDF Computation</label>
                <a 
                class="text-blue-600" 
                target="_blank"
                :href="form.formatted_pdf_url">View Computation</a>
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
    roleOptions: {
        type: Object
    },
    readonly: {
        type: Boolean,
        default: false
    }
});

</script>
