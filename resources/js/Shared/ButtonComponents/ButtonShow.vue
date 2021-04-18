<template>
	<inertia-link :disabled="loading" :href="url" class="ml-3 inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200">
    	<slot />
	</inertia-link>
</template>

<script>
export default {
	props: {
    	loading: Boolean,
		url: String
	},
}
</script>
