<template>
  <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    <label v-if="label" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" :for="id">{{ label }}</label>
    <textarea :id="id" ref="input" v-bind="$attrs" :class="{ error: error }" :value="value" @input="$emit('input', $event.target.value)" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" />
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `textarea-input-${this._uid}`
      },
    },
    value: String,
    label: String,
    error: String,
  },
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
  },
}
</script>
