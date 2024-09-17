import { router } from "@inertiajs/vue3";
import { ref } from 'vue';
import pickBy from "lodash/pickBy";

const showLoader = ref(false);

const postMethod = async(
        postRoute: string,
        id: any,
        payload: any = {},
        isPreserveState: boolean = false
) : Promise<any> => {
    router.post(route(postRoute, id), payload, {
        preserveState: isPreserveState,
        preserveScroll: true,
        onBefore: () => showLoader.value = true,
        onError: (error) => {
            showLoader.value = false
        },
        onSuccess: async() => {
            showLoader.value = false
        },
        onFinish: () => {
            showLoader.value = false
        },
    });
}

const getMethod = async(getRoute: string, queryParams: any, isPreserveState: boolean = true) : Promise<any> => {
    router.get(
        route(getRoute),
        pickBy(queryParams),
        {
            preserveState: isPreserveState,
            onBefore: () => showLoader.value = true,
            onError: () => showLoader.value = false,
            onSuccess: () => showLoader.value = false,
            onFinish: () => showLoader.value = false,
        }
    )
}

export {
    showLoader,
    postMethod,
    getMethod
}
