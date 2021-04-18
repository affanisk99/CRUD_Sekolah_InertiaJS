<template>
	<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
		<label v-if="label" :for="id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
			{{ label }}
		</label>
		<div class="mt-1 sm:mt-0 sm:col-span-2">
			<input :id="id" type="file" ref="file" @change="onChange" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
			<div v-if="error" class="text-sm text-red-700">{{ error }}</div>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		id: {
			type: [String, Number],
				default() {
					return `text-input-${this._uid}`
				},
		},
		item: [String, Object],
		// key: String,
		label: String,
		error: String
	},
	methods: {
		onChange (event) {
			this.$emit('file-change', {file: event.target.files[0], id: event.target.id, item: this.item, id: this.id})
		}
	}
}
</script>



