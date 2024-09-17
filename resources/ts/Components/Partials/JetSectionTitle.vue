<template>
    <div class="">
        <div class="sm:px-0">
            <p class="text-sm font-bold text-gray-900">
                <slot name="title"></slot>
            </p>

            <p class="mt-1 text-sm text-gray-500">
                <slot name="description"></slot>
            </p>
        </div>

        <div class="px-4 sm:px-0">
            <slot name="aside"></slot>
        </div>
    </div>
</template>
