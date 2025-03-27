<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <button
        class="mt-4 w-full text-sm text-white bg-primary-purple py-2 rounded-lg  duration-200 hover:bg-dark-purple/80"
    >
        {{value}}
    </button>
</template>

<style scoped>

</style>
