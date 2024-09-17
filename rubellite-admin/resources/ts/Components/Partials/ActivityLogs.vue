<template>
    <table-container>
        <template #header>
            <FilterBox
                :search="searchText"
                @update:searchText="(value) => (searchText = value)"
            >
                <template #fields>
                    <div class="mb-6">
                        <selector
                            label="Event"
                            placeholder="Filter by Event"
                            :options="events"
                            :modelValue="filterEvent"
                            @update:modelValue="
                                (newValue) => (filterEvent = newValue)
                            "
                        />
                    </div>

                    <div class="mb-6" v-if="dateFilter">
                        <date-picker
                            id="filterDate"
                            label="Date Created"
                            placeholder="Filter Date Created"
                            v-model="filterDate"
                            :enableTimePicker="false"
                            @update:modelValue="(value) => (filterDate = value)"
                        />
                    </div>

                    <div class="mb-6" v-if="subjectFilter">
                        <selector
                            label="Subject"
                            placeholder="Filter Subject"
                            :options="subjects"
                            :modelValue="filterSubject"
                            @update:modelValue="
                                (newValue) => (filterSubject = newValue)
                            "
                        />
                    </div>
                </template>
            </FilterBox>
        </template>

        <div class="flex items-center justify-between px-4 mt-4">
            <div class="flex">
                <selector
                    placeholder="Filter by Status"
                    :options="events"
                    :modelValue="filterEvent"
                    @update:modelValue="(newValue) => (filterEvent = newValue)"
                    id="selector-id"
                    name="selector-name"
                    class="w-[180px] mr-2"
                ></selector>
            </div>
            <text-input
                :lead-icon="'/images/icons/ic-search.svg'"
                type="text"
                name="input"
                id="input"
                placeholder="Search"
                v-model="searchText"
            />
        </div>

        <template #body>
            <DataTable
                :headers="headers"
                :no-action="true"
                :count="logs.data.length"
            >
                <template v-slot:body>
                    <template v-for="log in logs.data" :key="log.id">
                        <tr>
                            <td class="text-gray-900">
                                {{ log.id }}
                            </td>
                            <td class="text-gray-900">
                                {{ log.log_name }}
                            </td>
                            <td class="text-gray-900">
                                {{ log.event }}
                            </td>
                            <td class="">
                                {{ log.description }}
                            </td>
                            <td class="text-gray-900">
                                {{ log.causer_name }}
                            </td>
                            <td class="text-gray-900">
                                {{ log.created_at }}
                            </td>
                        </tr>
                    </template>
                </template>
            </DataTable>
        </template>

        <template #footer>
            <pagination :items="logs" />
        </template>
    </table-container>
</template>
<script setup lang="ts">
// Components

import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import { router } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";

const props = defineProps({
    logs: {
        type: Object,
        default: {},
    },
    resultRoute: {
        type: String,
        default: "",
    },
    tab: {
        type: String,
        default: "",
    },
    query: {
        type: String,
        default: "",
    },
    event: {
        type: String,
        default: "",
    },
})

const logs = computed(() => props.logs);

const headers = [
    { text: "#", value: "id" },
    { text: "Log Name", value: "logName" },
    { text: "Event", value: "event" },
    { text: "Description", value: "description" },
    { text: "Caused By", value: "causedBy" },
    { text: "Date Received", value: "dateReceived" },
];

/*--------------*
 * Table Search
 *--------------*/
const filterEvent = ref(props.event);
watch(
    filterEvent,
    throttle((val) => {
        router.get(
            props.resultRoute,
            pickBy({
                log_event: val,
                log_query: props.query,
                tab: props.tab,
            }), // removes falsey values
            {
                preserveState: true,
            }
        );
    })
);

const searchText = ref(props.query);
watch(
    searchText,
    throttle((val) => {
        router.get(
            props.resultRoute,
            pickBy({
                log_event: props.event,
                log_query: val,
                tab: props.tab,
            }), // removes falsey values
            {
                preserveState: true,
            }
        );
    }, 1000)
);

const events = [
    { id: "created", value: "Created" },
    { id: "updated", value: "Updated" },
    { id: "deleted", value: "Deleted" },
    { id: "restored", value: "Restored" },
    { id: "mail", value: "Mail" },
    { id: "notification", value: "Notification" },
];

</script>
