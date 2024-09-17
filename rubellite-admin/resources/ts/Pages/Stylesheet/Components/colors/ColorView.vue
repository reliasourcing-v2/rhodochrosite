<template>

    <div class="w-full">
        <h4 class="mb-4 text-gray-600 font-medium">Primary Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in primaryColors" :key="index"
            :style="{ width: 100 / primaryColors.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>

        <h4 class="mb-4 text-gray-600 font-medium">Secondary Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in secondaryColors" :key="index"
            :style="{ width: 100 / secondaryColors.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>

        <h4 class="mb-4 text-gray-600 font-medium">Gray Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in gray" :key="index"
            :style="{ width: 100 / gray.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>

        <h4 class="mb-4 text-gray-600 font-medium">Neutral Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in neutral" :key="index"
            :style="{ width: 100 / neutral.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>

        <h4 class="mb-4 text-gray-600 font-medium">Red Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in red" :key="index"
            :style="{ width: 100 / red.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>

        <h4 class="mb-4 text-gray-600 font-medium">Orange Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in orange" :key="index"
            :style="{ width: 100 / orange.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>

        <h4 class="mb-4 text-gray-600 font-medium">Yellow Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in yellow" :key="index"
            :style="{ width: 100 / yellow.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>

        <h4 class="mb-4 text-gray-600 font-medium">Green Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in green" :key="index"
            :style="{ width: 100 / green.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>

        <h4 class="mb-4 text-gray-600 font-medium">Blue Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in blue" :key="index"
            :style="{ width: 100 / blue.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>

        <h4 class="mb-4 text-gray-600 font-medium">Violet Colors</h4>
        <div class="flex space-x-2 mb-8">
            <div class="flex flex-col" v-for="i, index in violet" :key="index"
            :style="{ width: 100 / violet.length + '%' }">
                <div class="w-full mb-2">
                    <p class="text-xs text-slate-500">{{ i.hex }}</p>
                    <p class="text-xs text-slate-500">{{ i.color }}</p>
                </div>
                <div class="w-full h-10 rounded-xl" :class="i.color"></div>
            </div>
        </div>
    </div>


</template>

<script lang="ts" setup>

import colors from 'tailwindcss/colors'

const primaryColors = [
    { hex: '#f6e8fc', color: 'bg-primary-50' },
    { hex: '#f6e8fc', color: 'bg-primary-100' },
    { hex: '#f6e8fc', color: 'bg-primary-200' },
    { hex: '#f2ddfb', color: 'bg-primary-300' },
    { hex: '#e4b8f6', color: 'bg-primary-400' },
    { hex: '#a81ae2', color: 'bg-primary-500' },
    { hex: '#7e14aa', color: 'bg-primary-600' },
    { hex: '#3b094f', color: 'bg-primary-700' },
    { hex: '#3b094f', color: 'bg-primary-800' },
    { hex: '#3b094f', color: 'bg-primary-900' },
];

const secondaryColors = [
    { hex: '#FFF8E6', color: 'bg-secondary-200' },
    { hex: '#FFF5D9', color: 'bg-secondary-300' },
    { hex: '#FFEAB0', color: 'bg-secondary-400' },
    { hex: '#FFBC00', color: 'bg-secondary-500' },
    { hex: '#BF8D00', color: 'bg-secondary-600' },
    { hex: '#594200', color: 'bg-secondary-700' },
];

const gray = [
    { hex: colors.gray[50], color: 'bg-gray-50' },
    { hex: colors.gray[100], color: 'bg-gray-100' },
    { hex: colors.gray[200], color: 'bg-gray-200' },
    { hex: colors.gray[300], color: 'bg-gray-300' },
    { hex: colors.gray[400], color: 'bg-gray-400' },
    { hex: colors.gray[500], color: 'bg-gray-500' },
    { hex: colors.gray[600], color: 'bg-gray-600' },
    { hex: colors.gray[700], color: 'bg-gray-700' },
    { hex: colors.gray[800], color: 'bg-gray-800' },
    { hex: colors.gray[900], color: 'bg-gray-900' },
]

const neutral = [
    { hex: colors.neutral[50], color: 'bg-neutral-50' },
    { hex: colors.neutral[100], color: 'bg-neutral-100' },
    { hex: colors.neutral[200], color: 'bg-neutral-200' },
    { hex: colors.neutral[300], color: 'bg-neutral-300' },
    { hex: colors.neutral[400], color: 'bg-neutral-400' },
    { hex: colors.neutral[500], color: 'bg-neutral-500' },
    { hex: colors.neutral[600], color: 'bg-neutral-600' },
    { hex: colors.neutral[700], color: 'bg-neutral-700' },
    { hex: colors.neutral[800], color: 'bg-neutral-800' },
    { hex: colors.neutral[900], color: 'bg-neutral-900' },
]

const red = [
    { hex: colors.red[50], color: 'bg-red-50' },
    { hex: colors.red[100], color: 'bg-red-100' },
    { hex: colors.red[200], color: 'bg-red-200' },
    { hex: colors.red[300], color: 'bg-red-300' },
    { hex: colors.red[400], color: 'bg-red-400' },
    { hex: colors.red[500], color: 'bg-red-500' },
    { hex: colors.red[600], color: 'bg-red-600' },
    { hex: colors.red[700], color: 'bg-red-700' },
    { hex: colors.red[800], color: 'bg-red-800' },
    { hex: colors.red[900], color: 'bg-red-900' },
]

const orange = [
    { hex: colors.orange[50], color: 'bg-orange-50' },
    { hex: colors.orange[100], color: 'bg-orange-100' },
    { hex: colors.orange[200], color: 'bg-orange-200' },
    { hex: colors.orange[300], color: 'bg-orange-300' },
    { hex: colors.orange[400], color: 'bg-orange-400' },
    { hex: colors.orange[500], color: 'bg-orange-500' },
    { hex: colors.orange[600], color: 'bg-orange-600' },
    { hex: colors.orange[700], color: 'bg-orange-700' },
    { hex: colors.orange[800], color: 'bg-orange-800' },
    { hex: colors.orange[900], color: 'bg-orange-900' },
]

const yellow = [
    { hex: colors.yellow[50], color: 'bg-yellow-50' },
    { hex: colors.yellow[100], color: 'bg-yellow-100' },
    { hex: colors.yellow[200], color: 'bg-yellow-200' },
    { hex: colors.yellow[300], color: 'bg-yellow-300' },
    { hex: colors.yellow[400], color: 'bg-yellow-400' },
    { hex: colors.yellow[500], color: 'bg-yellow-500' },
    { hex: colors.yellow[600], color: 'bg-yellow-600' },
    { hex: colors.yellow[700], color: 'bg-yellow-700' },
    { hex: colors.yellow[800], color: 'bg-yellow-800' },
    { hex: colors.yellow[900], color: 'bg-yellow-900' },
]

const green = [
    { hex: colors.green[50], color: 'bg-green-50' },
    { hex: colors.green[100], color: 'bg-green-100' },
    { hex: colors.green[200], color: 'bg-green-200' },
    { hex: colors.green[300], color: 'bg-green-300' },
    { hex: colors.green[400], color: 'bg-green-400' },
    { hex: colors.green[500], color: 'bg-green-500' },
    { hex: colors.green[600], color: 'bg-green-600' },
    { hex: colors.green[700], color: 'bg-green-700' },
    { hex: colors.green[800], color: 'bg-green-800' },
    { hex: colors.green[900], color: 'bg-green-900' },
]

const blue = [
    { hex: colors.blue[50], color: 'bg-blue-50' },
    { hex: colors.blue[100], color: 'bg-blue-100' },
    { hex: colors.blue[200], color: 'bg-blue-200' },
    { hex: colors.blue[300], color: 'bg-blue-300' },
    { hex: colors.blue[400], color: 'bg-blue-400' },
    { hex: colors.blue[500], color: 'bg-blue-500' },
    { hex: colors.blue[600], color: 'bg-blue-600' },
    { hex: colors.blue[700], color: 'bg-blue-700' },
    { hex: colors.blue[800], color: 'bg-blue-800' },
    { hex: colors.blue[900], color: 'bg-blue-900' },
]

const violet = [
    { hex: colors.violet[50], color: 'bg-violet-50' },
    { hex: colors.violet[100], color: 'bg-violet-100' },
    { hex: colors.violet[200], color: 'bg-violet-200' },
    { hex: colors.violet[300], color: 'bg-violet-300' },
    { hex: colors.violet[400], color: 'bg-violet-400' },
    { hex: colors.violet[500], color: 'bg-violet-500' },
    { hex: colors.violet[600], color: 'bg-violet-600' },
    { hex: colors.violet[700], color: 'bg-violet-700' },
    { hex: colors.violet[800], color: 'bg-violet-800' },
    { hex: colors.violet[900], color: 'bg-violet-900' },
]
</script>
