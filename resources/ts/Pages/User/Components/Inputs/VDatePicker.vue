<template>
    <div>
        <label v-if="label" :for="id" class="block font-bold text-xs text-secondary">{{
            label
        }}<span v-if="required" class="text-red-600 ml-0.5">*</span></label>
        <div class="relative rounded-md">
            <DatePicker
                :uid="id"
                v-model="value"
                :disabled="disabled"
                :placeholder="placeholder"
                :timePicker="timePicker"
                :spaceConfirm="spaceConfirm"
                :enableTimePicker="enableTimePicker"
                :range="range"
                :presetRanges="presetRanges"
                :readonly=readonly
                :required="required"
                class="user-frm__date-picker font-sans"
            />
        </div>
        <p
            v-if="error"
            class="mt-2 text-sm"
            :class="error ? 'text-red-600' : 'text-gray-800'"
            id="email-error"
        >
            {{ error }}
        </p>
    </div>
</template>

<script>
import { computed } from "vue";
import DatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";

export default {
    components: {
        DatePicker,
    },
    props: {
        modelValue: {
            default: null,
            required: true,
        },
        disabled: {
            type: Boolean,
            default: false,
        },
        error: {
            type: String,
            default: null,
        },
        placeholder: {
            type: String,
            default: null,
        },
        name: {
            type: String,
            default: null,
        },
        id: {
            type: String,
            default: null,
        },
        label: {
            type: String,
            default: null,
        },
        timePicker: {
            type: Boolean,
            default: false,
        },
        enableTimePicker: {
            type: Boolean,
            default: true,
        },
        range: {
            type: Boolean,
            default: false,
        },
        presetRanges: {
            type: Object,
            default: {},
        },
        spaceConfirm: {
            type: Boolean,
            default: false,
        },
        required: {
            type: Boolean,
            default: false,
        },
        readonly: {
            type: Boolean,
            default: false,
        },
    },
    setup(props, { emit }) {
        const value = computed({
            get() {
                return props.modelValue;
            },
            set(value) {
                emit("update:modelValue", value);
            }
        });

        return {
            value
        };
    },
};
</script>
