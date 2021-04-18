<template>
	<inertia-link :disabled="loading" :href="url" class="ml-3 inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400">
    	<slot />
	</inertia-link>
</template>

<script>
export default {
	props: {
    	loading: Boolean,
		url: {
			type: String,
			default: ''
		}
	},
}
</script>
