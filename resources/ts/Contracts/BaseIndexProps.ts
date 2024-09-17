import { PaginationInterface } from "./Pagination";
import { PropType } from "vue";

export default {
    items: {
        type: Object as PropType<PaginationInterface>,
        required: true,
    },
    activeCount: {
        type: Number,
        default: 0,
    },
    archivedCount: {
        type: Number,
        default: 0,
    },
    activityLogCount: {
        type: Number,
        default: 0,
    },
    tab: {
        type: String,
        default: null,
    },
    query: {
        type: String,
        default: null,
    },
    date: {
        type: [String,Array],
        default: null,
    },
    per_page: {
        type: Number,
        default: 10,
    },
};
