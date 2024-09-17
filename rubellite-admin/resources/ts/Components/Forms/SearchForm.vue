<template>
    <div class="w-full">
        <div class="relative rounded-md">
            <div
                class="
                    absolute
                    inset-y-0
                    left-0
                    pl-3
                    flex
                    items-center
                    pointer-events-none
                "
            >
                <MagnifyingGlassIcon
                    class="mr-3 h-5 w-5 text-gray-500"
                    aria-hidden="true"
                />
            </div>
            <input
                v-model="searchText"
                type="text"
                name="search"
                id="search"
                class="
                    focus:ring-primary-500 
                    focus:border-primary-500
                    block
                    w-full
                    pl-10
                    text-sm
                    placeholder:text-gray-300
                    border-gray-100
                    rounded-lg
                    h-11
                "
                placeholder="Search"
                @input="updateSearchText($event.target.value)"
            />
            <button
                v-if="searchText"
                @click="updateSearchText(null)"
                class="absolute inset-y-0 right-0 pr-3 flex items-center z-10"
            >
                <XMarkIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import {
    XMarkIcon,
    MagnifyingGlassIcon,
} from "@heroicons/vue/24/outline";

</script>