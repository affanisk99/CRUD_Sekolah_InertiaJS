<template>
  <div class="flex flex-wrap mt-6 -mb-1">
    <template v-for="(link, key) in links">
      <div v-if="link.url === null" :key="key" class="px-3 py-1 mb-1 mr-1 text-sm text-gray-400 border rounded" :class="{ 'ml-auto': link.label === 'Next' }" v-html="link.label"></div>
      <inertia-link v-else :key="key" class="px-3 py-1.5 mb-1 mr-1 text-xs border rounded hover:bg-indigo-500 hover:text-white focus:border-indigo-700 focus:text-indigo-500" :class="{ 'bg-gray-400 text-white': link.active, 'ml-auto': link.label === 'Next' }" :href="link.url" v-html="link.label"></inertia-link>
    </template>
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
  },
}
</script>
