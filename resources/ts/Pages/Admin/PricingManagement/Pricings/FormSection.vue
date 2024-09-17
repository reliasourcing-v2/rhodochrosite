<template>
    <page-template
        size="fit"
    >
        <jet-form-section>
            <template #title>
                Pricing Information
            </template>

            <template #description>
                Relevant Information and other details
            </template>

            <template #form>
                <div class="col-span-12">
                    <selector
                        label="Role"
                        placeholder="Role"
                        v-model="form.role"
                        :options="roles"
                        :error="form.errors.role"
                    />
                </div>
                <div class="col-span-12">
                    <selector
                        label="Country"
                        placeholder="Country"
                        v-model="form.country"
                        :options="countries"
                        :error="form.errors.country"
                    />
                </div>
                <div class="col-span-12">
                    <selector
                        label="Experience Level"
                        placeholder="Experience Level"
                        v-model="form.experience"
                        :options="experienceLevel"
                        :error="form.errors.experience"
                    />
                </div>
                <div class="col-span-12">
                    <text-input
                        v-model="form.offshore"
                        label="Offshore"
                        placeholder="Offshore"
                        id="offshore"
                        :error="form.errors.offshore"
                    />
                </div>
                <div class="col-span-12">
                    <text-input
                        v-model="form.onshore"
                        label="Onshore"
                        placeholder="Onshore"
                        id="onshore"
                        :error="form.errors.onshore"
                    />
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
    }
});

const roles = [
    {
        id: 'Web Designer',
        value: 'Web Designer'
    },
    {
        id: 'Web Developer',
        value: 'Web Developer'
    },
    {
        id: 'Software Developer',
        value: 'Software Developer'
    },
    {
        id: 'Sales Development Representative',
        value: 'Sales Development Representative'
    },
    {
        id: 'Lead Generation Specialist',
        value: 'Lead Generation Specialist'
    },
    {
        id: 'Technical Support Representative',
        value: 'Technical Support Representative'
    },
    {
        id: 'Customer Support Representative',
        value: 'Customer Support Representative'
    },
    {
        id: 'Social Media Manager',
        value: 'Social Media Manager'
    },
    {
        id: 'Graphic Designer',
        value: 'Graphic Designer'
    },
    {
        id: 'Content Writer',
        value: 'Content Writer'
    },
]

const countries = [
    {
        id: 'US',
        value: 'US'
    },
    {
        id: 'UK',
        value: 'UK'
    },
    {
        id: 'AU',
        value: 'AU'
    },
    {
        id: 'CA',
        value: 'CA'
    },
    {
        id: 'SG',
        value: 'SG'
    },
]

const experienceLevel = [
    {
        id: 'Entry-Level',
        value: 'Entry-Level'
    },
    {
        id: 'Intermediate',
        value: 'Intermediate'
    },
    {
        id: 'Senior-Level',
        value: 'Senior-Level'
    },
]
</script>
