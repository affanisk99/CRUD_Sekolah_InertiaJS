<template>
 
    <div class="flex max-w-lg rounded-md shadow-sm">      
      <input autocomplete="off" type="text" name="search" placeholder="Cari ..." :value="value" @input="$emit('input', $event.target.value)" class="flex-1 block w-full min-w-0 border-gray-300 rounded-none focus:ring-blue-500 focus:border-blue-500 rounded-l-md sm:text-sm">
        <span class="inline-flex items-center px-3 text-gray-500 border border-l-0 border-gray-300 rounded-r-md bg-gray-50 sm:text-xs" @click="$emit('reset')">
          Kembali ke awal
        </span>
    </div>
</template>

<script>

export default {
  components: {
  },
  props: {
    value: String,
    maxWidth: {
      type: Number,
      default: 300,
    },
  },
}
</script>
