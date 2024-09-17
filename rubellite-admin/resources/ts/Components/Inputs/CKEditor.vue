<template>
    <div>
        <label 
            v-if="label"
            :for="id" 
            class="block text-sm text-gray-900 mb-1"
        >
            {{ label }}
        </label>
        <div class="relative">
            <ckeditor
                :editor="editor"
                :model-value="modelValue"
                @input="$emit('update:modelValue', $event)"
                :config="editorConfig"
                class="h-40"
            ></ckeditor>
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

<style>
.ck.ck-toolbar,
.ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
    border-color: #d1d5db;
}

.ck.ck-toolbar .ck.ck-toolbar__separator {
    background: #d1d5db;
}

.ck-editor { font-size: 1rem; }
.ck-editor h1 { font-size: 2rem; }
.ck-editor h2 { font-size: 1.875rem; }
.ck-editor h3 { font-size: 1.5rem; }
.ck-editor h4 { font-size: 1.25rem; }
.ck-editor h5 { font-size: 1.125rem; }
.ck-editor h6 { font-size: 1rem; }

.ck-editor ul {
    display: block;
    list-style-type: disc;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 0;
    margin-right: 0;
    padding-left: 40px;
}
.ck-editor ol {
    counter-reset: item;
    display: block;
    list-style-type: decimal;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 0;
    margin-right: 0;
    padding-left: 40px;
}

.ck-editor ol > li {
    display: table;
    counter-increment: item;
    margin-bottom: 0.6em;
}

.ck-editor ol > li:before {
    content: counters(item, ".") ". ";
    display: table-cell;
    padding-right: 0.6em;
}

.ck-editor li ol > li:before {
    content: counters(item, ".") " ";
}
</style>

<script setup lang="ts">
import { ref, computed } from 'vue';
import CKEditor from "@ckeditor/ckeditor5-vue";
import Editor from 'ckeditor5-custom-build';
import { UploadAdapter } from '../../plugins/ckeditor/UploadAdapter.ts';

const props = defineProps({
    modelValue: {
        default: '',
        required: true,
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
    config: {
        type: Object,
        default: {},
    },
});

const editor = ref(Editor);
const ckeditor = ref(CKEditor.component);

const editorConfig = computed(() => {
return Object.entries(props.config).length
    ? props.config
    : {
        name: props.name,
        height: 500,
        mediaEmbed: { previewsInData: true },
        extraPlugins: [ function (editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new UploadAdapter(loader);
            }
        }],
        link: {
            addTargetToExternalLinks: true,
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' },
            ]
        }
    };
});

</script>