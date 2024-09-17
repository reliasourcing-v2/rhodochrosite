<template>
    <Link :href="'/admin/login'">
        <img  src="/icons/logo.png" alt="logo" :class="customImageClass" class="mx-auto">
    </Link>
</template>

<script>
    import { Link } from "@inertiajs/vue3";

    export default {
        components: {
            Link,
        },

        props: {
            customImageClass: {
                type: String,
                default: null,
            },
        }
    }
</script>
