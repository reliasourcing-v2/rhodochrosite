<template>
    <user-layout>

        <general-banner 
            :item="{
                image: $page.props.storage_url + cms?.section1_image,
                title: cms?.section1_header
            }"
        />  

        <offset-banner 
            :item="{
                title: cms?.section1_subtitle,
                description: cms?.section1_description
            }"
        />

        <contact-frame class="py-10 bg-primary-50" />

    </user-layout>
</template>
<script lang="ts" setup>
defineProps({
    cms: {
        type: Object,
        default: () => ({})
    }
})
</script>