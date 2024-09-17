<template>
    <admin-layout 
    title="Activity Logs">
        <div class="px-12 py-6">
            <activity-logs
            :logs="logs"
            :result-route="route('admin.activity-logs.index')"
            :query="searchText"
            :event="filterEvent"
            />
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref } from "vue";

const props = defineProps({
    logs: {
        type: Object
    },
    selectedEvent: {
        type: String
    },
    logQuery: {
        type: String
    }
})

/*--------------*
 * Activity Logs
 *--------------*/
const filterEvent = ref(props.selectedEvent);
const searchText = ref(props.logQuery);
const logs = computed(() => props.logs);

</script>
