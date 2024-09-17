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
                    required
                    v-model="form.full_name"
                    label="Full Name"
                    id="full_name"
                    :error="form.errors.full_name"
                    disabled
                />
            </div>
            <div class="col-span-12">
                <text-input
                    required
                    v-model="form.phone"
                    label="Contact Number"
                    id="phone"
                    :error="form.errors.phone"
                    disabled
                />
            </div>
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

            <div class="col-span-12">
                <text-input
                    v-model="form.position"
                    label="Position"
                    id="position"
                    name="position"
                    required
                    :error="form.errors.position"
                    disabled
                />
            </div>

            <div class="col-span-12">
                <text-input
                    textarea
                    v-model="form.message"
                    label="Message"
                    id="message"
                    name="message"
                    required
                    :error="form.errors.message"
                    disabled
                />
            </div>
            <div class="col-span-12 pb-6 border-b">
                <label class="block text-sm text-gray-500 mb-2">Curriculum Vitae</label>
                <a 
                class="text-blue-600" 
                target="_blank"
                :href="form.formatted_cv_url">View CV</a>
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
