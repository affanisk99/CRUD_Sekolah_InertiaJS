<template>
    <div class="bg-gray-200 bg-opacity-75 rounded-md">
        <div class="flex bg-purple-400 bg-opacity-75 rounded-md justify-content-center" role="progressbar" :style="{ width: getProgress }">
            <div class="flex text-center">
                {{ getProgress }}
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        progress: {
            type: Number,
            default: 0
        }
    },
    computed: {
        getProgress() {
            return Math.round(this.progress) + '%'
        }
    }
}
</script>