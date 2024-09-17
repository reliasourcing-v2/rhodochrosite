<template>
    <admin-layout
        :title="headerContent.title"
        :pages="breadcrumbs"
    >
        <!-- Tabs -->
        <div>
            <Tabs
                :tabs="tabs"
                :button-items="true"
                :active-tab="activeTab"
                @update:tab="(value: string) => (activeTab = value)"
                :tab-route="route('admin.article-management.articles.create')"
                :preserve-state="true"
            />
        </div>
        <div>
            <div class="mb-10">
                <form-section
                    :form="form"
                    v-if="activeTab == null"
                >
                    
                </form-section>

                <meta-form 
                    v-if="activeTab == 'seo-meta-data'" 
                    :form="form" 
                />
            </div>
            <div
                class="flex justify-end items-center px-6 py-4 w-full space-x-2 bg-gray-50"
            >
                <action-button
                    @click="cancel"
                    secondary
                >
                    Cancel
                </action-button>
                <action-button
                    @click="submit"
                >
                    Create
                </action-button>
            </div>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import { computed, ref } from "vue";
import { useForm, usePage } from "@inertiajs/vue3";
// Components
import FormSection from "./FormSection.vue";
import MetaForm from "@/Components/Forms/MetaForm.vue";

const props = defineProps({
    tags:{
        type: Object
    },
    selectedTab: {
        type: String
    },
})

/*---------------*
* Variables
*---------------*/

const author = computed(() => usePage().props.auth.user);

const headerContent = {
    title: 'Create Article',
    icon: '/icons/nav/ic-nav-accounts.svg'
}

const breadcrumbs = [
{
        name: 'Articles',
        href: route('admin.article-management.articles.index')
    },
    {
        name: 'Create Article',
        href: route('admin.article-management.articles.create')
    }
]

const selectorOptions = [
    {
        id: '1',
        value: 'News & Event'
    },
    {
        id: '2',
        value: 'Announcement'
    },
]

const form = useForm({
    slug: null,
    title: null,
    author: null,
    article_type:null,
    banner_image_path: null,
    publish_date: null,
    content: null,
    tags: null,
    is_highlight: false,
    meta_title: null,
    meta_description: null,
    meta_keyword: null,
    meta_image: null,

});


const activeTab = ref<string>(props.selectedTab);
const tabs = ref<{ name: string, value?: string}[]>([
    {
        name: 'Information',
        value: null,
    },
    {
        name: 'SEO Meta Data',
        value: 'seo-meta-data',
    },
]);

/*--------------*
* Functions
*--------------*/

const cancel = () => {
    window.location.replace(route("admin.article-management.articles.index"))
}

const submitUrl = route("admin.article-management.articles.store");
const submit = () => {
    form.post(submitUrl)
}
</script>
