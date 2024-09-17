<template>
    <div class="">
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <template v-for="item in items" :key="item.id">
                            <th
                                v-if="item.summary_field"
                                scope="col"
                                class="
                                    px-6
                                    py-3
                                    text-center text-xs
                                    font-medium
                                    text-gray-500
                                    uppercase
                                    tracking-wider
                                "
                            >
                                {{ item.label }}
                            </th>
                        </template>
                        <th
                            scope="col"
                            class="
                                relative
                                px-6
                                py-3
                                text-center text-xs
                                font-medium
                                text-gray-500
                                uppercase
                                tracking-wider
                            "
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <draggable
                    :modelValue="[...Array(listData.length).keys()]"
                    @update:modelValue="reorder($event)"
                    tag="tbody"
                    item-key="name"
                    class="bg-white divide-y divide-gray-200"
                >
                    <template #item="{ element, index }">
                        <tr class="cursor-move">
                            <template v-for="item in items" :key="item.id">
                                <td v-if="item.summary_field" class="px-6 py-4 whitespace-pre-wrap">
                                    <div
                                        v-if="item.type === 'image'"
                                        class="text-sm text-center text-gray-900"
                                    >
                                        <img
                                            class="m-auto w-[100px] h-[100px] object-cover border border-gray-100 bg-gray-50"
                                            :src="renderUrl(listData[`${id}_${item.id}`][index])"
                                            alt="alt-image"
                                        />
                                    </div>
                                    <p v-else v-html="listData[`${id}_${item.id}`][index]" class="line-clamp-2 text-sm"></p>
                                </td>
                            </template>
                            <td
                                class="
                                    px-6
                                    py-4
                                    whitespace-nowrap
                                    text-center text-sm
                                    font-medium
                                "
                            >
                                <button
                                    @click.prevent="edit(index)"
                                    class="
                                        mx-1
                                        inline-flex
                                        items-center
                                        p-1
                                        border border-transparent
                                        rounded-full
                                        text-gray-600
                                        hover:text-blue-400
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-offset-1
                                        focus:ring-blue-500
                                    "
                                >
                                    <PencilSquareIcon class="h-5 w-5" aria-hidden="true" />
                                </button>
                                <!-- Delete Button -->
                                <button
                                    @click.prevent="remove(index)"
                                    class="
                                        mx-1
                                        inline-flex
                                        items-center
                                        p-1
                                        border border-transparent
                                        rounded-full
                                        text-gray-600
                                        hover:text-red-400
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-offset-1
                                        focus:ring-red-500
                                    "
                                >
                                    <TrashIcon class="h-5 w-5" aria-hidden="true" />
                                </button>
                            </td>
                        </tr>
                    </template>
                </draggable>
            </table>
        </div>
        <p v-if="listData.length == 0 && status === STATUSES.default" class="text-sm text-gray-400 text-center mt-4">No data to display.</p>
        <div class="text-right mt-4">
            <action-button
                v-if="status === STATUSES.default"
                @click="status = STATUSES.creating"
                type="button"
            >
                <PlusIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
                Add
            </action-button>
        </div>

        <!------------------
         | Editor
            ------------------>
        <div class="pt-4 border-t" :id="`${id}_editor`" v-if="status !== STATUSES.default">
            <p class="font-semibold mb-4">
                {{ status === STATUSES.creating ? "Add" : "Edit" }} {{ list.label }}
            </p>
            <template v-for="item in items" :key="`${item.id}`">
                <!-- Text -->
                <div
                    v-if="item.type === 'text' || item.type === 'url'"
                    class="col-span-5 mb-4"
                >
                    <text-input
                        v-model="createForm[`${id}_${item.id}`]"
                        :label="item.label"
                        :id="`${item.id}`"
                    />
                    <p class="text-gray-400 text-sm mt-1">
                        {{ item.description }}
                    </p>
                </div>

                <!-------------------
                    | Textarea
                    -------------------->
                <div
                    v-if="item.type === 'textarea'"
                    class="col-span-5 mb-4"
                >
                    <text-input
                        :textarea="true"
                        v-model="createForm[`${id}_${item.id}`]"
                        :label="item.label"
                        :id="`${item.id}`"
                    />
                    <p class="text-gray-400 text-sm mt-1">
                        {{ item.description }}
                    </p>
                </div>

                <!-------------------
                | Checkbox
                -------------------->
                <div
                v-if="item.type === 'checkbox'"
                class="col-span-5 mb-4"
                >
                    <div class="flex items-center space-x-3">
                        <input
                        class="rounded border-primary-600 text-primary-600 shadow-sm focus:ring-1 focus:ring-primary-500 focus:outline-none"
                        type="checkbox"
                        v-model="createForm[`${id}_${item.id}`]"
                        :label="item.label"
                        :id="`${item.id}`"
                        />
                        <label :for="item.id">
                            {{ item.label }}
                        </label>
                    </div>
                    <p class="text-gray-400 text-sm mt-1">
                        {{ item.description }}
                    </p>
                </div>

                <!-------------------
                | HTML Editor
                -------------------->
                <div
                    v-if="item.type === 'htmleditor'"
                    class="col-span-5 mb-4"
                >
                    <ck-editor
                        v-model="createForm[`${id}_${item.id}`]"
                        :label="item.label"
                        :id="`${item.id}`"
                        inListTable
                    ></ck-editor>
                    <p class="text-gray-400 text-sm mt-1">
                        {{ item.description }}
                    </p>
                </div>

                <!-- Images -->
                <div
                    v-if="item.type === 'image'"
                    class="col-span-5 mb-4"
                >
                    <dropzone
                        v-model:path="createForm[`${id}_${item.id}`]"
                        v-model:file="createForm[`${id}_${item.id}` + '_file']"
                        :label="item.label"
                        :id="`${item.id}`"
                        :description="item.description"
                        :overwrite-path="true"
                        :allow-delete="false"
                    ></dropzone>
                </div>
            </template>
            <p
                class="text-center mt-4 text-red-400 text-sm"
                v-if="status !== STATUSES.default && errors"
            >
                {{ errors }}
            </p>
            <div class="text-center mt-4 space-x-2" v-if="status !== STATUSES.default">
                <action-button
                @click="cancel"
                type="button"
                fill="outline">
                    Cancel
                </action-button>
                <action-button
                @click="save"
                type="button">
                    Save
                </action-button>
            </div>
            <!-- End Editor -->
        </div>
    </div>
</template>

<script>
import {
    PlusIcon,
    XCircleIcon,
    PencilSquareIcon,
    TrashIcon,
} from "@heroicons/vue/24/outline";
import { computed, ref, nextTick } from "vue";

import draggable from "vuedraggable";
import { usePage } from "@inertiajs/vue3";
export default {
    components: {
        PlusIcon,
        XCircleIcon,
        PencilSquareIcon,
        TrashIcon,
        draggable,
    },
    props: {
        list: {
            type: Object,
            required: true,
        },
        items: {
            type: Array,
            required: true,
        },
        id: {
            type: String,
            required: true,
        },
        form: {
            type: Object,
            required: true,
        },
    },
    setup(props, { emit }) {
        // Constants
        const STATUSES = {
            default: 0,
            creating: 1,
            editing: 2,
        };
        const status = ref(STATUSES.default);

        const errors = ref("");

        const listData = computed(() => {
            let data = buildModel(true);
            data.length = data[Object.keys(data)[0]].length;
            return data;
        });

        const selectedIndex = ref(null);

        function buildModel(populate = false) {
            let obj = {};
            props.items.forEach((item) => {
                obj[`${props.id}_${item.id}`] = populate
                    ? props.form[`${props.id}_${item.id}`]
                    : null;
                if (item.type === "image") {
                    obj[`${props.id}_${item.id}_file`] = populate
                        ? props.form[`${props.id}_${item.id}_file`]
                        : null;
                }
            });
            return obj;
        }

        const createForm = ref(buildModel());

        // validate locally to save bandwidth
        function validate() {
            const form = Object.assign({}, createForm.value);
            for (const key in form) {
                const itemKey = key.replace(`${props.id}_`, "");
                const obj = props.items.find((i) => i.id === itemKey);
                if (obj && obj.rules.includes("required") && form[key] === null) {
                    // add image rules
                    if (obj.type === "image" && form[`${key}_file`] !== null) {
                        continue;
                    }
                    errors.value = `${obj.label} is required.`;
                    return false;
                }
            }
            errors.value = "";
            return true;
        }

        function edit(index) {
            selectedIndex.value = index;
            props.items.forEach((item) => {
                const key = `${props.id}_${item.id}`;
                createForm.value[key] = props.form[key][index];
                if (item.type === "image") {
                    createForm.value[`${key}_file`] = props.form[`${key}_file`][index];
                }
            });
            status.value = STATUSES.editing;
            nextTick(() => {
                document.getElementById(`${props.id}_editor`).scrollIntoView();
            });
        }

        function remove(index) {
            selectedIndex.value = index;
            emit("update-list", {
                action: "delete",
                form: createForm.value,
                selectedIndex: selectedIndex.value,
            });
            status.value = STATUSES.default;
            selectedIndex.value = null;
        }

        function save() {
            if (validate()) {
                emit("update-list", {
                    action: status.value === STATUSES.creating ? "create" : "edit",
                    form: createForm.value,
                    selectedIndex: selectedIndex.value,
                });
                createForm.value = buildModel(); // reset form
                status.value = STATUSES.default;
                selectedIndex.value = null;
            }
        }

        function cancel() {
            status.value = STATUSES.default;
            createForm.value = buildModel(); // reset form
        }

        function reorder(order) {
            emit("update-list", {
                action: "reorder",
                form: createForm.value,
                order: order,
            });
        }

        const storage_url = computed(() => usePage().props.storage_url);
        function renderUrl(url) {
            return url !== null && url.startsWith("data:")
                ? url
                : storage_url.value + url;
        }

        return {
            STATUSES,
            status,
            errors,
            listData,
            createForm,
            edit,
            remove,
            save,
            cancel,
            reorder,
            renderUrl,
        };
    },
};
</script>
