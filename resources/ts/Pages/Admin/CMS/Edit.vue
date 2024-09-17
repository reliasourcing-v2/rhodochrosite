<template>
    <admin-layout
        :title="`${page.label}`"
        :pages="pages"
        showButton
        :flash="flash"
    >
        <!-- Tabs -->
        <div>
            <div class="border-b border-gray-200 flex justify-between">
                <nav class="-mb-px flex space-x-2 px-7 py-2" aria-label="Tabs">
                    <a
                        v-for="tab in schema.sections"
                        :key="tab.id"
                        :href="tab.id ?? ''"
                        @click.prevent="selectTab(tab.id)"
                        :class="[
                            isSelectedTab(tab.id)
                                ? 'text-primary-600'
                                : 'text-gray-400 hover:text-gray-600 hover:border-gray-200',
                            'whitespace-nowrap flex py-4 px-1 text-sm cursor-pointer relative',
                        ]"
                    >
                        {{ tab.label }}
                        <span 
                        v-if="isSelectedTab(tab.id)"
                        class="absolute -bottom-2 left-0 bg-primary-600 w-full inline-block h-1"
                        />
                    </a>
                    <a
                        v-if="page.show_metadata == 1"
                        :href="'seo-meta-data' ?? ''"
                        @click.prevent="selectTab('seo-meta-data')"
                        :class="[
                            isSelectedTab('seo-meta-data')
                                ? 'text-primary-600'
                                : 'text-gray-400 hover:text-gray-600 hover:border-gray-200',
                            'whitespace-nowrap flex py-4 px-1 text-sm cursor-pointer relative',
                        ]"
                    >
                        SEO Meta data
                        <span 
                        v-if="isSelectedTab('seo-meta-data')"
                        class="absolute -bottom-2 left-0 bg-primary-600 w-full inline-block h-1"
                        />
                    </a>
                </nav>
            </div>
        </div>

        <div class="p-4 !pt-0 md:p-7" >
            <template 
            v-for="section in schema.sections"
            :key="section.id">
                <jet-form-section
                v-if="activeTab == section.id"
                :hasActions="false">
                    <template #title>
                        {{ section.label }}
                    </template>

                    <template #description>
                        {{ section.description }}
                    </template>

                    <template #form>
                        <template
                            v-for="item in section.items"
                            :key="`${section.id}_${item.id}`"
                        >
                            <!-------------------
                            | Text
                            -------------------->
                            <div
                                v-if="item.type === 'text' || item.type === 'url'"
                                class="col-span-12"
                            >
                                <text-input
                                    v-model="form[section.id + '_' + item.id]"
                                    :label="item.label"
                                    :id="`${section.id}_${item.id}`"
                                    :error="form.errors[section.id + '_' + item.id]"
                                />
                                <p class="text-gray-400 text-xs mt-1" v-html="item.description"></p>
                            </div>

                            <!-------------------
                            | Textarea
                            -------------------->
                            <div 
                                v-if="item.type === 'textarea'" 
                                class="col-span-12"
                            >
                                <text-input
                                    :textarea="true"
                                    v-model="form[section.id + '_' + item.id]"
                                    :label="item.label"
                                    :id="`${section.id}_${item.id}`"
                                    :error="form.errors[section.id + '_' + item.id]"
                                />
                                <p class="text-gray-400 text-xs mt-1" v-html="item.description"></p>
                            </div>

                            <!-------------------
                            | HTML Editor
                            -------------------->
                            <div 
                                v-if="item.type === 'htmleditor'" 
                                class="col-span-12"
                            >
                                <ck-editor
                                    v-model="form[section.id + '_' + item.id]"
                                    :label="item.label"
                                    :id="`${section.id}_${item.id}`"
                                    :error="form.errors[section.id + '_' + item.id]"
                                ></ck-editor>
                                <p class="text-gray-400 text-xs mt-1" v-html="item.description"></p>
                            </div>

                            <!-------------------
                            | Images
                            -------------------->
                            <div 
                                v-if="item.type === 'image'"
                                class="col-span-12" 
                            >
                                <dropzone
                                    v-model:path="form[section.id + '_' + item.id]"
                                    v-model:file="form[section.id + '_' + item.id + '_file']"
                                    :label="item.label"
                                    :id="`${section.id}_${item.id}`"
                                    :description="item.description"
                                    :error="form.errors[section.id + '_' + item.id + '_file']"
                                    :allow-delete="false"
                                ></dropzone>
                            </div>

                            <!-------------------
                            | List Table
                            -------------------->
                            <div class="col-span-12" v-if="item.type === 'list_table'">
                                <label
                                    :for="item.id"
                                    class="block text-sm text-gray-500 mb-2"
                                    >{{ item.label }}</label
                                >
                                <list-table
                                    :list="item"
                                    :items="item.items"
                                    :id="section.id + '_' + item.id"
                                    :form="form"
                                    @update-list="updateList"
                                ></list-table>
                            </div>
                        </template>
                    </template>
                </jet-form-section>
            </template>
        </div>
        <div class="p-4 !pt-0 md:p-7" v-if="activeTab == 'seo-meta-data'">
            <jet-form-section 
            :hasActions="false">
                <template #title>
                    SEO Metadata
                </template>

                <template #description>
                    Enter your SEO data such as title, description, keywords, and image.
                </template>

                <template #form>
                    <div class="col-span-12">
                        <text-input
                            v-model="form.title"
                            label="Title"
                            id="meta_title"
                            :error="form.errors.title"
                        />
                        <p class="text-gray-400 text-xs mt-1">50-60 characters max</p>
                    </div>

                    <div class="col-span-12">
                        <text-input
                            v-model="form.description"
                            label="Description"
                            id="meta_description"
                            textarea
                            :error="form.errors.description"
                        />
                    </div>

                    <div class="col-span-12">
                        <text-input
                            v-model="form.keywords"
                            label="Keywords"
                            id="meta_keyword"
                            textarea
                            :error="form.errors.keywords"
                        />
                        <p class="text-gray-400 text-xs mt-1">
                            Comma-separated values
                        </p>
                    </div>

                    <div class="col-span-12">
                        <dropzone
                            v-model:path="form.og_image_path"
                            v-model:file="form.og_image_path"
                            label="Image"
                            id="seo_image"
                            description="Max file size: 2MB | Dimension: 1200px x 627px"
                            :error="form.errors.og_image_path"
                        ></dropzone>
                    </div>
                </template>
            </jet-form-section>
        </div>

        <template #buttons>
            <action-button @click="submit">
                Save Changes
            </action-button>
        </template>
    </admin-layout>
</template>

<script setup lang="ts">
import ListTable from "@/Components/Partials/ListTable.vue";
import useListTable from "@/composables/useListTable.ts";
import usePRXCMSForm from "@/composables/usePRXCMSForm.ts";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import pickBy from "lodash/pickBy";

const props = defineProps([
    "page", "schema", "selectedTab", "flash"
])

const pages = [
    {
        name: "CMS",
        href: route("admin.cms.index"),
    },
    { name: "Edit", href: "#" },
];

const activeTab = ref<string>(props.selectedTab);

const submitUrl = route("admin.cms.edit", props.page.id);

const { form, submit } = usePRXCMSForm(props.page, props.schema, submitUrl);

const { updateList } = useListTable(form);

const isSelectedTab = (value) => {
    return props.selectedTab === value;
}

const selectTab = (value) => {
    router.get(
        route('admin.cms.edit', props.page.id),
        pickBy({ tab: value }), // removes falsey values
        {
            preserveState: true,
            onSuccess: () => {
                activeTab.value = value;
            },
        }
    );
}

</script>
