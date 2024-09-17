<template>
    <div>
        <div @click="toggle" :class="customClass">
            <slot name="title"></slot>
        </div>
        <transition
            @before-enter="beforeEnter"
            @enter="enter"
            @before-leave="beforeLeave"
            @leave="leave"
        >
            <nav class="mt-3" v-show="show">
                <div class="space-y-1">
                    <slot name="content"></slot>
                </div>
            </nav>
        </transition>
    </div>
</template>
<script>
export default {
    props: {
        customClass: {
            type: String,
            default: null,
        },
    },
    data: () => ({
        show: false,
    }),
    methods: {
        toggle() {
            this.show = !this.show;
        },
        beforeEnter(el) {
            el.style.height = "0";
        },
        enter(el) {
            el.style.height = el.scrollHeight + "px";
        },
        beforeLeave(el) {
            el.style.height = el.scrollHeight + "px";
        },
        leave(el) {
            el.style.height = "0";
        },
    },
};
</script>
