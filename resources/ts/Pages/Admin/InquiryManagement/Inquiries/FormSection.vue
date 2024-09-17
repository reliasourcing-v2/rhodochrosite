<template>
    <page-template
        size="fit"
    >
    <jet-form-section>
        <template #title>
            Inquiry Information
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
                    label="Phone Number"
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
                    v-model="form.company"
                    label="Company"
                    id="company"
                    name="company"
                    required
                    :error="form.errors.company"
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

            <!-- <div class="col-span-6">
                <selector
                    v-model="form.role_id"
                    :options="roles"
                    label="Role"
                    id="title"
                    name="title"
                    :error="form.errors.role_id"
                />
            </div> -->
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
