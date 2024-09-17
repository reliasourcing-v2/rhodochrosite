<template>
    
    <div>
        <!-- <h4 class="mb-4 text-gray-600 font-medium">User Forms</h4>
        <div class="mb-4">
            <v-text-input
                type="text"
                name="text-input"
                id="text-input"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />
        </div>

        <div class="mb-4">
            <v-text-input
                textarea
                type="text"
                name="text-input"
                id="text-input"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />
        </div>

        <div class="mb-4">
            <v-text-input
                label="Price"
                placeholder="Price"
                id="price"
                :add_on_left="true"
                add_on_text="₱"
                type="number"
            />
        </div>

        <div class="mb-4">
            <v-text-input
                error="error"
                type="text"
                name="text-input"
                id="text-input"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />
        </div>

        <div class="mb-4">
            <v-password-input
                name="text-password"
                id="text-password"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />
        </div>

        <div class="mb-4">
            <v-date-picker
                name="text-input"
                id="text-input"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />
        </div>

        <div class="mb-4">
            <v-checkbox>
                <p>Regular Savings Deposit</p>
            </v-checkbox>
        </div>

        <div>
            <v-selector
                :options="[{ id: '1', value: 'Sample'}]"
                label="Sample Selector"
                placeholder="Sample Selector"
                id="selector-id"
                name="selector-name"
            />
        </div>

        <div class="w-full border-t border-gray-200 my-20"></div> -->

        <h4 class="mb-4 text-gray-600 font-medium">Admin Forms</h4>
        <div class="mb-4">
            <text-input
                type="text"
                name="text-input"
                id="text-input"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />
        </div>

        <div class="mb-4">
            <text-input
            label="Price"
            placeholder="Price"
            id="price"
            :add_on_left="true"
            add_on_text="₱"
            type="number"
            />

        </div>

        <div class="mb-4">
            <text-input
            label="Height"
            placeholder="Height"
            id="height"
            :add_on_right="true"
            add_on_text="cm"
            type="number"
            />
        </div>
        <div class="mb-4">
            <selector
                :options="[{ id: '1', value: 'Sample'}]"
                label="Sample Selector"
                placeholder="Sample Selector"
                id="selector-id"
                name="selector-name"
            />
        </div>
        <div class="mb-4">
            <text-input
                textarea
                name="textarea-input"
                id="textarea-input"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />
        </div>

        <div class="mb-4">
            <dropzone
                label="Dropzone"
            />
        </div>

        <!-- <text-field
            placeholder="Sample Field"
            label="Sample Field"
            class="mb-5 dark"
        />

        <text-field
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark"
            required
            label-note="test"
        />


        <text-area
            placeholder="Sample Field"
            label="Sample Field"
            class="mb-5 dark"
        />

        <text-area
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark"
            required
            label-note="test"
        />

        <password
            placeholder="Sample Field"
            label="Sample Field"
            class="mb-5 dark"
        />
        <password
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark"
            required
        />

        <text-editor
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark"
            required
            label-note="test"
        />

        <date-picker
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark active"
            required
            label-note="test"
        />

        <selector
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark active"
            required
            label-note="test"
        />

        <file-picker
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark active"
            required
            label-note="test"
        /> -->
    </div>

</template>
<script setup lang="ts">
import TextInput from "@/Pages/User/Components/Inputs/VTextInput.vue";
import Selector from "@/Components/Inputs/Selector.vue";
import Dropzone from "@/Components/Inputs/Dropzone.vue";
</script>
