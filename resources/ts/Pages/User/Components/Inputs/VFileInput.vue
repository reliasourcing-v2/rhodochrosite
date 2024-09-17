<template>
    <div>
        <label v-if="label" class="block text-sm text-gray-900 mb-1">{{ label }}</label>
        <div v-bind="getRootProps()" class="flex items-center space-x-6">
            <div class="w-[calc(100%-134px)] bg-white text-gray-400 text-sm px-4 h-11 flex items-center justify-center rounded-md">
                <div class="w-full">
                    <p v-if="previewFile && acceptedFiles.length > 0" class="w-full">{{ file.name }}</p>
                    <p v-else class="w-full">No file chosen</p>
                </div>
                <input
                    v-bind="getInputProps()"
                    :id="id"
                    :name="name"
                    type="file"
                    class="sr-only"
                />
                 <!-- External error -->
                <p
                    v-if="error"
                    class="mt-2 text-sm"
                    :class="error ? 'text-red-600' : 'text-gray-800'"
                    id="email-error"
                >
                    {{ error }}
                </p>

                <!-- Reject error -->
                <p
                    v-for="(rejectError, index) in rejectErrors"
                    :key="index"
                    class="mt-2 text-sm text-red-600"
                >
                    {{ rejectError.filename }}: {{ rejectError.errors.join(", ") }}
                </p>
            </div>
            <div class="relative text-primary-500 font-medium cursor-pointer">
                <img 
                    class="h-11" 
                    src="/icons/export.svg" 
                    alt="button"
                >
                <p class="absolute top-1/2 w-full text-center -translate-y-1/2 text-sm">Choose File</p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from "vue";
import { usePage, router } from "@inertiajs/vue3";
import { useDropzone } from "vue3-dropzone";

const props = defineProps({
    path: {
        type: String,
        default: "",
    },
    file: {
        type: String,
    },
    error: {
        type: String,
        default: null,
    },
    description: {
        type: String,
        default: "PNG, JPG, GIF up to 10MB",
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
    // Dropzone props
    multiple: {
        type: Boolean,
        default: false,
    },
    maxSize: {
        type: Number,
        default: 25,
    },
    maxFiles: {
        type: Number,
        default: 0,
    },
    accept: {
        type: String,
        default: "application/pdf,.docx,.doc",
    },
    overwritePath: {
        type: Boolean,
        default: false,
    },
    previewFile: {
        type: Boolean,
        default: true,
    },
    deleteImageRoute: {
        type: String,
        default: null
    },
})

const rejectErrors = ref([]);
const acceptedFileSrcs = ref([]);
const emit = defineEmits(['update:path', 'update:file'])

// Triggers when file is dropped or selected
function onDrop(acceptFiles, rejectReasons) {
    // console.log(acceptFiles);
    // console.log(rejectReasons);
    // process errors
    rejectErrors.value = rejectReasons.length
        ? renderErrors(rejectReasons)
        : [];

    // process SRCs
    acceptedFileSrcs.value = [];
    if (acceptFiles.length) {
        acceptFiles.forEach((file) => {
            processFileSrc(file).then((base64) => {
                acceptedFileSrcs.value.push(base64);
                if (props.overwritePath) {
                    emit("update:path", base64);
                }
            });
        });
        // emit v-model change event
        let payload = props.multiple
            ? acceptedFiles.value
            : acceptedFiles.value[0];
        emit("update:file", payload);
    } else {
        emit("update:file", null);
    }
}

const processFileSrc = (file) => {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
    });
}

const renderErrors = (rejectReasons) => {
    const errors = rejectReasons.map((reason) => {
        return {
            filename: reason.file.name,
            errors: reason.errors.map((error) => {
                switch (error.code) {
                    case "file-invalid-type":
                        return "Invalid file type";
                    case "file-too-large":
                        return `File too large (${reason.file.size / 1000 / 1000} MB)`;
                }
            }),
        };
    });
    return props.multiple ? errors : [errors[0]];
}

const { getRootProps, getInputProps, isDragActive, acceptedFiles } =
    useDropzone({
        onDrop,
        maxSize: props.maxSize * 1000 * 3000, // convert to MB
        maxFiles: props.maxFiles,
        multiple: props.multiple,
        accept: props.accept,
    });

// displayed image
const storageUrl = computed(() => usePage().props.storage_url);
const displaySrc = computed(() => {
    if (acceptedFileSrcs.value.length) {
        return acceptedFileSrcs.value[0];
    } else if (props.path) {
        return storageUrl.value + props.path;
    }
    return null;
});

const fileDownload = (key) => {
    const a = document.createElement("a");
    a.href = acceptedFileSrcs.value[key];
    a.download = acceptedFiles.value[key].name;
    a.target = "_blank";
    a.click();
    a.remove();
}

const fileDelete = (key) => {
    acceptedFiles.value.splice(key, 1);
    acceptedFileSrcs.value.splice(key, 1);

    // emit v-model change event
    let payload = props.multiple
        ? acceptedFiles.value
        : acceptedFiles.value[0];
    emit("update:file", payload);
}

const deleteOldImage = (id) => {
    router.delete(
        route(props.deleteImageRoute, id),
        { preserveState: false }
    );
}

const previewFileDownload = (item) => {
    const a = document.createElement("a");
    a.href = item;
    a.target = "_blank";
    a.click();
    a.remove();
}
</script>
