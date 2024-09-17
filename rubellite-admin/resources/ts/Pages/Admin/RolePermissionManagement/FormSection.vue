<template>
    <jet-form-section>
        <template #title>
            Basic Information
        </template>

        <template #description>
            Upon saving, the new role will have the selected permissions.
        </template>

        <template #form>
            <div class="col-span-6">
                <text-input
                    v-model="form.name"
                    label="Name"
                    id="name"
                    :error="form.errors.name"
                />
            </div>
            <div class="col-span-6">
                <text-input
                    v-model="form.description"
                    label="Description"
                    id="description"
                    name="description"
                    :error="form.errors.description"
                />
            </div>
        </template>

        <template #actions>
            <action-button @click="submit" type="button">
                Save Changes
            </action-button>
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
