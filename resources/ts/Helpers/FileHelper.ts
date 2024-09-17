
import { usePage } from "@inertiajs/vue3";
import { computed } from 'vue';

const storageUrl = computed(() => usePage().props.storage_url);

const renderStorageFile = (filePath: string) => {
    return storageUrl.value + filePath;
}

export { renderStorageFile }
