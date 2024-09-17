<template>
    <div class="rangeInput">
        <Slider size="sm" :default="inputPlaceholder" :tooltips="false" :format="{
            prefix: '₱',
            thousand: ','
        }" :min="inputMin" :max="inputMax" :step="inputStep" v-model="value" />
        <div class="text-xs flex justify-between mt-2 text-neutral-400">
            <p>
                ₱<RenderPrice :value="value[0]" />
            </p>
            <p>
                ₱<RenderPrice :value="value[1]" />
            </p>
        </div>
    </div>
</template>
  
<script>
import Slider from '@vueform/slider';
import RenderPrice from "./RenderPrice.vue";

export default {
    components: {
        Slider,
        RenderPrice
    },
    props: {
        inputMin: {
            type: Number,
            default: 0,
        },
        inputMax: {
            type: Number,
            default: null,
        },
        inputStep: {
            type: Number,
            default: 10,
        },
        inputPlaceholder: {
            type: Array,
            default: [0,100],
        },
    },
    data() {
        return {
            value: [0, 1000]
        }
    }
}
</script>

<style src="@vueform/slider/themes/default.css"></style>