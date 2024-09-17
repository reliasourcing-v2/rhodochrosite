<template>
    <jet-form-section 
    class="w-full"
    @submitted="showModal = true">
        <template #title> Security Information </template>

        <template #description> Relevant data and other information. </template>

        <template #form>
            <div class="col-span-6">
                <password-input
                    v-model="form.password"
                    label="New Password"
                    id="password"
                    name="password"
                    autocomplete="new-password"
                />
                <JetInputError :message="form.errors.password" class="mt-2" />
            </div>

            <div class="col-span-6">
                <password-input
                    v-model="form.password_confirmation"
                    label="Confirm Password"
                    id="password_confirmation"
                    name="password_confirmation"
                    autocomplete="new-password"
                />
                <JetInputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <action-button 
                :class="{ 'opacity-25': form.processing }" 
                :disabled="form.processing"
            >
                Save Changes
            </action-button>

            <action-button 
                fill="outline"
                @click="$emit('cancel')"
            >
                Cancel
            </action-button>

            <JetActionMessage :on="form.recentlySuccessful" class="ml-3"> Saved! </JetActionMessage>
        </template>
    </jet-form-section>

    <ConfirmationModal
        :show="showModal"
        @cancel="showModal = false"
        title="Update Password"
        description="Are you sure you wish to update your password?"
    >
        <template #content>
            <div class="mb-4">
                <password-input
                    v-model="form.current_password"
                    label="Current Password"
                    id="current_password"
                    name="current_password"
                    autocomplete="current-password"
                />
                <JetInputError :message="form.errors.current_password" class="mt-2" />
            </div>
        </template>

        <template #button>
            <div class="flex items-center justify-end space-x-2">
                <action-button 
                @click="showModal = false" 
                fill="outline">Cancel</action-button>
                <action-button @click="submit()">Proceed</action-button>
            </div>
        </template>
    </ConfirmationModal>
</template>

<script lang="ts" setup>
import JetActionMessage from "@/Components/Modals/JetActionMessage.vue";
import JetInputError from "@/Components/Inputs/InputError.vue";
import ConfirmationModal from "@/Components/Modals/ConfirmationModal.vue";
import PasswordInput from "@/Components/Inputs/PasswordInput.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

/*--------------*
 * VARS
 *--------------*/
const showModal = ref<boolean>(false);

const form = useForm({
    current_password: null,
    password: null,
    password_confirmation: null,
});

/*--------------*
 * METHODS
 *--------------*/
const submit = () => {
    form.put(route("admin.user-password.update"), {
        errorBag: "updatePassword",
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            showModal.value = false;
        },
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
            }

            if (form.errors.current_password) {
                form.reset("current_password");
            }
        },
    });
};
</script>
