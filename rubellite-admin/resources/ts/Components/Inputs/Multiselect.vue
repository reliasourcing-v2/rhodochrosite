<template>
    <div>
        <label class="block text-sm text-gray-900 mb-1">
            {{ label }}<span v-if="required" class="text-red-600 ml-0.5">*</span>
        </label>
        <div class="relative">
            <button v-if="canCopy" type="button" class="frm-multiselect_copy cursor-pointer">
                <img src="/icons/ic-copy.svg" alt="copy-icon" class="w-5 h-5 object-contain">
            </button>
            <Multiselect
                :mode="mode"
                :searchable="true"
                :placeholder="placeholder"
                :disabled="disabled"
                :options="options"
                :close-on-select="closeOnSelect"
                :create-option="createOption"
                class="frm-multiselect"
                v-model="modelValue"
                @change="$emit('change')"
                @select="$emit('select')"
                @clear="$emit('clear')"
                :canClear="canClearStat"
                :class="customInputClass, canCopy ? 'hasCopy' : ''"
            />
        </div>
        <p v-if="helper" class="mt-2 text-xs text-gray-500">
            {{ helper }}
        </p>

        <p v-if="error" class="mt-2 text-sm text-red-600">
            {{ error }}
        </p>
    </div>
</template>
<script setup lang="ts">
import { computed } from 'vue';
import Multiselect from "@vueform/multiselect";

const props = defineProps({
    modelValue: {
        required: true,
        default: null,
    },
    mode: {
        type: String,
        default: 'single' // single | multiple | tags
    },
    options: {
        type: Object,
        default: () => ({
            1: 'Option 1',
            2: 'Option 2',
            3: 'Option 3'
        })
    },
    label: {
        type: String,
        default: null,
    },
    helper: {
        type: String,
        default: null,
    },
    placeholder: {
        type: String,
        default: null,
    },
    disabled: {
        type: Boolean,
        default: false
    },
    error: {
        type: String,
        default: null,
    },
    customInputClass: {
        type: String,
        default: null,
    },
    canCopy: {
        type: Boolean,
        default: false,
    },
    closeOnSelect: {
        type: Boolean,
        default: true
    },
    createOption: {
        type: Boolean,
        default: false
    },
    canClearStat: {
        type: Boolean,
        default: false
    },
    required: {
        type: Boolean,
        default: false,
    },
});

const modelValue = props.modelValue;

const emit = defineEmits<{
    ( e: 'update:modelValue', val: object): void
}>()

const value = computed<object>({
    get() {
        return props.modelValue;
    },
    set(value) {
        emit('update:modelValue', value);
    }
})

</script>
<!-- <style src="@vueform/multiselect/themes/default.css"></style> -->
