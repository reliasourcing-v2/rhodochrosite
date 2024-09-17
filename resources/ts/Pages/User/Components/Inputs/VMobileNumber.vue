<template>
    <v-text-input
        :add_on_left="true"
        add_on_text="+63"
        custom-class="!pl-1"
        @keypress="numberonly"
        :placeholder="placeholder"
        :label="label"
        :maxlength="10"
        v-model="value"
        :error="error"
        :required="required"
        :name="name"
        :id="id"
        type="tel"
    />
</template>

<script setup lang="ts">
import { computed } from "vue";

/*--------------*
 * PROPS
 *--------------*/
const props = defineProps({
    modelValue: {
        default: "",
        required: true,
    },
    error: {
        type: String,
        default: null,
    },
    placeholder: {
        type: String,
        default: "Mobile Number",
    },
    label: {
        type: String,
        default: "Mobile Number",
    },
    name: {
        type: String,
        default: null,
    },
    id: {
        type: String,
        default: null,
    },
    required: {
        type: Boolean,
        default: false,
    },
});

/*--------------*
 * EMITS
 *--------------*/
const emit = defineEmits(["update:modelValue"]);

/*--------------*
 * COMPUTED
 *--------------*/
const value = computed({
    get() {
        return props.modelValue;
    },
    set(value: string) {
        emit("update:modelValue", value);
    },
});

/*--------------*
 * METHODS
 *--------------*/

/**
 * @property {Function}
 * @param {any} e
 * @return {boolean}
 */
const numberonly = (e: any): boolean => {
    e = e ? e : window.event;
    const charCode = e.which ? e.which : e.keyCode;

    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        e.preventDefault();
    }

    return true;
};
</script>
