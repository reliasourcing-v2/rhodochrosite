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
                :tab-route="route('admin.article-management.articles.edit', item.id)"
                :preserve-state="true"
            />
        </div>
        
       <div class="mb-10">
            <form-section
                :form="form"
                :selectorOptions="selectorOptions"
                :multiselectOptions="tags"
                v-if="activeTab == null"
            >
                
            </form-section>
            <meta-form 
                v-if="activeTab == 'seo-meta-data'" 
                :form="form" 
            />
       </div>
        <div
            class="flex justify-end items-center px-6 py-4 space-x-2 bg-gray-50 w-full"
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
                Save Changes
            </action-button>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
import { ref } from "vue";
// Packages
import { useForm } from "@inertiajs/vue3";
// Components
import FormSection from "./FormSection.vue";
import MetaForm from "@/Components/Forms/MetaForm.vue";

const props = defineProps({
    item: {
        type: Object
    },
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

const headerContent = {
    title: 'Edit ' + props.item.title,
    icon: '/icons/nav/ic-nav-accounts.svg'
}

const breadcrumbs = [
{
        name: 'Articles',
        href: route('admin.article-management.articles.index')
    },
    {
        name: 'Edit Article',
        href: route('admin.article-management.articles.edit', props.item.id)
    }
]

const form = useForm({
    slug: props.item.slug,
    title: props.item.title,
    author: props.item.author,
    article_type: props.item.article_type,
    banner_image_path: props.item.banner_image_path,
    publish_date: props.item.publish_date,
    content: props.item.content,
    is_highlight: props.item.is_highlight == 1 ? true : false,
    meta_title: props.item.meta_title,
    meta_description: props.item.meta_description,
    meta_keyword: props.item.meta_keyword,
    meta_image: props.item.meta_image,
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
])

/*--------------*
* Functions
*--------------*/

const cancel = () => {
    window.location.replace(route("admin.article-management.articles.view", props.item.id))
}

const submitUrl = route("admin.article-management.articles.update", props.item.id);
const submit = () => {
    form.post(submitUrl)
}
</script>
