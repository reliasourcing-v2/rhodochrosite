<template>
	{{ render() }}
</template>

<script>
export default {
	props: {
		value: {
			default: 0,
		},
	},
	setup(props) {
		function render(amount = null) {
			let value = amount ?? props.value;

			if (isNaN(value)) {
				value = 0;
			}

			return Intl.NumberFormat("fil-PH", {
				style: "decimal",
				// currency: "PHP",
			}).format(value);
		}

		return {
			render
		};
	},
};
</script>
