import { PropType } from "vue";
import { PaginationInterface } from "./Pagination";

export default {
    item: {
        type: Object,
        required: true,
    },
    selectedTab: {
        type: String,
        default: null,
    },
    per_page: {
        type: Number,
        default: 10,
    },
    logs: {
        type: Object as PropType<PaginationInterface>,
        default: {},
    },
    activityLogCount: {
        type: Number,
        default: 0,
    },
    filterLogQuery: {
        type: String,
        default: null,
    },
    filterLogEvent: {
        type: String,
        default: null,
    },
    filterLogDate: {
        type: String,
        default: null,
    },
};
