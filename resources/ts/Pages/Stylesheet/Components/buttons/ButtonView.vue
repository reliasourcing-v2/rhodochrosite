<template>
    <div class="">
        <div class="mb-10 space-y-4">
            <div class="flex items-start w-[70%] space-x-10">
                <p class="w-3/12">Primary Button</p>
                <div class="w-3/12">
                    <p class="text-sm text-gray-500 ">Small</p>
                </div>
                <div class="w-3/12">
                    <p class="text-sm text-gray-500 ">Default</p>
                </div>
                <div class="w-3/12">
                    <p class="text-sm text-gray-500 ">Large</p>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Icon Only</p>
                <div class="w-3/12">
                    <action-button
                    size="small">
                        <Squares2X2Icon class="w-5 h-5" />
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button>
                        <Squares2X2Icon class="w-5 h-5" />
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large">
                        <Squares2X2Icon class="w-5 h-5" />
                    </action-button>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Text Only</p>
                <div class="w-3/12">
                    <action-button
                    size="small">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button>
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large">
                        Button
                    </action-button>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Text + Leading Icon</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    :leading-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    :leading-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    :leading-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Text + Trailing Icon</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    :trailing-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    :trailing-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    :trailing-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
            </div>
        </div>
        <div class="mb-10 space-y-4">
            <p>Secondary Button</p>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Icon Only</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    fill="outline">
                        <Squares2X2Icon class="w-5 h-5" />
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    fill="outline">
                        <Squares2X2Icon class="w-5 h-5" />
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    fill="outline">
                        <Squares2X2Icon class="w-5 h-5" />
                    </action-button>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Text Only</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    fill="outline">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    fill="outline">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    fill="outline">
                        Button
                    </action-button>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Text + Leading Icon</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    fill="outline"
                    :leading-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    fill="outline"
                    :leading-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    fill="outline"
                    :leading-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Text + Trailing Icon</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    fill="outline"
                    :trailing-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    fill="outline"
                    :trailing-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    fill="outline"
                    :trailing-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
            </div>
        </div>
        <div class="mb-10 space-y-4">
            <p>Tertiary Button</p>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Icon Only</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    fill="none">
                        <Squares2X2Icon class="w-5 h-5" />
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    fill="none">
                        <Squares2X2Icon class="w-5 h-5" />
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    fill="none">
                        <Squares2X2Icon class="w-5 h-5" />
                    </action-button>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Text Only</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    fill="none">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    fill="none">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    fill="none">
                        Button
                    </action-button>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Text + Leading Icon</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    fill="none"
                    :leading-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    fill="none"
                    :leading-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    fill="none"
                    :leading-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
            </div>
            <div class="flex items-center w-[70%] space-x-10">
                <p class="text-sm text-gray-500 w-3/12">Text + Trailing Icon</p>
                <div class="w-3/12">
                    <action-button
                    size="small"
                    fill="none"
                    :trailing-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    fill="none"
                    :trailing-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
                <div class="w-3/12">
                    <action-button
                    size="large"
                    fill="none"
                    :trailing-icon="Squares2X2Icon">
                        Button
                    </action-button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Squares2X2Icon } from "@heroicons/vue/24/solid";
import ActionButton from "@/Components/ActionButtons/ActionButton.vue";

</script>