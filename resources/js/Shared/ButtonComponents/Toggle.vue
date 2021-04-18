<template>
    <div @click="onClick">
        <label v-if="label" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            {{ label }}
        </label>
        <div class="w-12 h-6 flex items-center bg-gray-300 rounded-full p-1 duration-300 ease-in-out" :class="{ 'bg-green-400': toggleActive}">
            <div class="bg-white w-4 h-4 rounded-full shadow-md transform duration-300 ease-in-out" :class="{ 'translate-x-6': toggleActive,}"></div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        status: Boolean,
        label: String,
        id: Number
    },
    data() {
        return {
            toggleActive: this.status,
        };
    },
    methods: {
        onClick() {
            this.toggleActive = !this.toggleActive
            this.$emit('input', {status: this.toggleActive, id: this.id})
        }
    }
}
</script>