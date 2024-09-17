<template>
    <admin-layout :showSubheader="false">
        <div class="flex h-screen bg-white">
            <!-- TAB SECTION -->
            <section class="w-1/2 border-r">
                <div class="flex justify-between items-center p-6 border-b  border-gray-100">
                    <p class=" text-lg text-gray-900 font-semibold">Notifications</p>
                    <action-button 
                        customClass="text-primary-500 !font-normal" 
                        fill="none"
                        type="button"
                    >
                        Mark all as read
                    </action-button>
                </div>
                <div>
                    <Tabs
                        :tabs="tabs"
                        :button-items="false"
                        :active-tab="activeTab"
                        @update:activeTab="(newValue) => (activeTab = newValue)"
                        :tabRoute="route('admin.notification.index')"
                        navClass="!px-6"
                    />
                </div>
                <div class="">
                    <div class="w-full flex flex-col rounded-xl">
                        <div
                            v-for="(item, index) in items.data"
                            :key="item"
                            class="border-b"
                        >
                            <div v-if="item.created" class="px-6 py-3 bg-gray-50">
                                {{ item.created }}
                            </div>
                            <button
                                @click="showNotification(item)"
                                :class="[
                                    'w-full p-6 text-sm text-left leading-5 text-gray-500',
                                    'focus:outline-none focus:bg-gray-50',
                                    isSelected(item.id)
                                        ? 'text-gray-900 bg-gray-50'
                                        : 'text-gray-900 hover:bg-white/[0.12]',
                                ]"
                            >
                                <div class="flex justify-between items-center">
                                    <p class="relative" :class="{ 'font-semibold': item.read_at === null }">
                                        {{ item.title }}
                                        <span v-if="item.read_at === null" class="absolute top-1.5 -right-4 bg-primary-500 w-2 h-2 rounded-full"></span>
                                    </p>
                                    <p class="text-gray-500 !font-normal">{{ item.time_elapsed }}</p>
                                </div>
                                <div class="mt-4 !font-normal">
                                    <p class="text-gray-500 " v-html="item.message"></p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
  
                <template v-if="items.data.length === 0">
                    <div class="flex flex-col w-full h-full items-center pt-12 space-y-6">
                        <div class="w-[200px] h-[200px] flex justify-center items-center rounded-full bg-primary-50">
                            <StarIcon class="w-20 h-20 text-primary-500"/>
                        </div>
                        <div class="space-y-2 text-center">
                            <p class="text-lg font-semibold">You're up to date!</p>
                            <p class="text-sm text-gray-500">We'll let you know when we get news for you</p>
                        </div>
                    </div>
                </template>
            </section>
  
            <!-- CONTENT SECTION -->
            <section class="w-1/2">
                <div v-if="notification" class="px-12 py-6">
                    <div class="rounded-xl bg-white focus:outline-none focus:ring-0 space-y-4">
                        <div class="space-y-2">
                            <p class="font-semibold text-lg">{{ notification?.title }}</p>
                            <p class="text-sm text-gray-500">{{ notification.date_created }}</p>
                            <p class="text-gray-500" v-html="notification?.message"></p>
                        </div>
                    <action-button 
                      type="button"
                    >
                        View Transaction
                    </action-button>
                    </div>
                </div>
            </section>
        </div>
    </admin-layout>
</template>
<script setup lang="ts">
import { ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import { StarIcon } from "@heroicons/vue/24/solid";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import pickBy from "lodash/pickBy";
import { onMounted } from "vue";

/*--------------*
* INTERFACE
*--------------*/
interface Notification{
    title: string,
    message: string,
    created_at: string,
    read_at: string,
    time_elapsed: string,
}

interface PropsData{
    items: Notification[],
    selected_tab: string | null,
    date: string | null,
    read_count: number,
    unread_count: number,
}
/*--------------*
* PROPS
*--------------*/

const props = withDefaults(defineProps<PropsData>(), {});
console.log(props);
const notifications = ref<any>([]);


/*--------------*
* REFS
*--------------*/
const notification = ref<any>(null);
const activeTab = ref<string>(props.selected_tab);
const selected = ref(null);
const rows = ref(10);

/*--------------*
* CONSTANTS
*--------------*/
const tabs = [
{
    name: "New",
    value: null,
    count: props.unread_count
},
{
    name: "History",
    value: "history",
    count: props.read_count
}
];


const items = {
    data: [
        // {
        // title: 'New Transaction',
        //     message: 
        //     `
        //         <span class='text-primary-500'>Aliz Santana</span> has booked a Playground 
        //     Admission at <span class='text-primary-500'>SM.Sta Mesa</span> branch.
        //     `,
        //     created: 'Aug 2023',
        // date_created: 'Aug 26, 2023 (00:00)',
        //     read_at: null,
        //     time_elapsed: 'Just now'
        // },
        // {
        // title: 'New Transaction',
        //     message: 
        //     `
        //     <span class='text-primary-500'>Aliz Santana</span> has booked a Playground 
        //     Admission at <span class='text-primary-500'>SM.Sta Mesa</span> branch.
        //     `,
        //     created: null,
        // date_created: 'Aug 26, 2023 (00:00)',
        //     read_at: null,
        //     time_elapsed: 'Just now'
        // }
    ]
}

/*--------------*
* METHODS
*--------------*/

const showNotification = (item) => {
notification.value = item;
markRead(item);
selected.value = item.id;
window.scrollTo({
    top: 0,
    behavior: 'smooth'
});
};

const isSelected = (id: number): boolean => {
return selected.value === id;
}

const markRead = (notification) => {
router.patch(
    route('admin.notification.show', notification), {}, {  preserveState: true,  preserveScroll: true})
}

onMounted(() => {
    notifications.value = props.items.map(a => {
        const date =  new Date(a.created_at)
        const month_year = date.toLocaleString('default', { month: 'long' })+ ' ' + date.getFullYear().toString()
        return {...a, created_at: month_year}
    })
    console.log(notifications.value);

})	
</script>