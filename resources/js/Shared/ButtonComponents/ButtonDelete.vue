<template>
	<button :disabled="loading" @click="destroy" type="button" class="ml-3 inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
    	<slot />
	</button>
</template>

<script>
export default {
	props: {
    	loading: Boolean,
		url: String,
		name: String
	},
	methods: {
		destroy() {
			if (confirm(`Are you sure you want to delete this ${this.name}?`)) {
				this.$inertia.delete(this.url)
			}
	    }
	}
}
</script>
