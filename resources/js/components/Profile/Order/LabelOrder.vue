<script setup>
import { computed } from 'vue'

const props = defineProps({
    value: {
        type: String,
        required: true
    }
})

// Сопоставление статуса с цветом фона
const bgColorClass = computed(() => {
    switch (props.value.toLowerCase()) {
        case 'новый':
            return 'bg-[#CA7FFE]/30 text-dark-purple'
        case 'отменён':
            return 'bg-red-500/30 text-red-800'
        case 'в обработке':
            return 'bg-yellow-400/30 text-yellow-900'
        case 'завершён':
            return 'bg-green-500/30 text-green-900'
        default:
            return 'bg-gray-300/30 text-gray-800'
    }
})
</script>

<template>
    <label
        class="px-6 py-1 rounded-[10px] text-sm"
        :class="bgColorClass"
    >
        {{ value }}
    </label>
</template>

<style scoped>
</style>
