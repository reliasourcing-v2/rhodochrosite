<template>
	{{ render() }}
</template>

<script setup lang="ts">
const props = defineProps({
	value: {
		default: 0,
	},
})

const render = (amount = null) => {
	let value = amount ?? props.value;

	if (isNaN(value)) {
		value = 0;
	}
	return Intl.NumberFormat("fil-PH", {
		style: "decimal",
		minimumFractionDigits: 2,
		maximumFractionDigits: 2,
		// currency: "PHP",
	}).format(value);
}
</script>
