<template>
    <user-layout>
        <div class="h-[100px]"></div>
        <section class="bg-primary-50">
            <div class="max-w-[1440px] px-4 lg:px-20 m-auto py-16">
                <div class="max-w-[900px] m-auto mb-16">
                    <p v-if="article.article_type == 'blogs'" class="text-neutral-600 mb-4">Blogs</p>
                    <p v-if="article.article_type == 'case-studies'" class="text-neutral-600 mb-4">Case Studies</p>
                    <h1 class="text-3xl lg:text-5xl font-bold mb-4">{{ article.title }}</h1>
                    <div class="text-neutral-600 mb-8 flex lg:items-center lg:space-x-1 justify-between w-full lg:space-y-0 space-y-1 lg:flex-row flex-col lg:text-base text-sm">
                        <p>{{ formatDate(article.publish_date) }}</p>
                        <p v-if="article.author">Written by: {{ article.author }}</p>
                    </div>
                    <div class="overflow-hidden relative mb-4">
                        <img 
                            class="w-full h-full object-cover" 
                            :src="$page.props.storage_url + article.banner_image_path" 
                            alt="banner"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                    <div class="ck-content" v-html="article.content"></div>
                </div>
                <div class="max-w-[1032px] m-auto">
                    <p class="text-2xl font-bold mb-8">Read more Articles</p>
                    <div v-if="suggestedArticles.length > 0" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <a v-for="item in suggestedArticles" :href="route('web.resources.show', item.slug)">
                            <div class="space-y-4 transition hover:text-primary-500">
                                <div class="aspect-w-[500] aspect-h-[307]">
                                    <img 
                                        class="w-full h-full object-cover" 
                                        :src="$page.props.storage_url + item.banner_image_path" 
                                        alt="placeholder"
                                        loading="lazy"
                                        decoding="async"
                                    >
                                </div>
                                <p class="text-sm text-neutral-600">{{ formatDate(article.publish_date) }}</p>
                                <p class="line-clamp-2 font-semibold text-xl">{{ item.title }}</p>
                            </div>
                        </a>
                    </div>
                    <div v-else>
                        <p>No article available ...</p>
                    </div>
                </div>
            </div>
        </section>
    </user-layout>
</template>
<script setup lang="ts">
const props = defineProps({
    article: {
        type: Object
    },
    suggestedArticles: {
        type: Object
    }
})

const formatDate = (rawDate) => {
    return new Date(rawDate).toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    })
}

</script>