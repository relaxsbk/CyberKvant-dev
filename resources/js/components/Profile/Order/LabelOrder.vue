<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="bg-[#CA7FFE]/30 text-dark-purple px-6 py-1 rounded-[10px] text-sm">
        {{value}}
    </label>
</template>

<style scoped>

</style>
