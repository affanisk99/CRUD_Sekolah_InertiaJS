<template>
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <label v-if="label" :for="id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ label }}</label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select :id="id" ref="input" v-model="selected" @change="onChange" v-bind="$attrs" :class="{ error: error }" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                <slot />
            </select>
            <div v-if="error" class="text-sm text-red-700">{{ error }}</div>
        </div>
    </div>
</template>

<script>
export default {
	inheritAttrs: false,
	props: {
    	id: {
    	type: String,
    	default() {
        	return `select-input-${this._uid}`
      	},
    },
		value: [String, Number, Boolean, Array],
		label: String,
		error: String,
	},
	data() {
		return {
		selected: this.value,
		}
	},
	watch: {
		selected(selected) {
			this.$emit('input', selected)
		},
	},
	methods: {
		focus() {
			this.$refs.input.focus()
		},
		select() {
			this.$refs.input.select()
		},
		onChange(e) {
            this.$emit('select', e.target.value)
        }
	},
}
</script>