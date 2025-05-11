<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);
</script>

<template>
<textarea
    v-model="model"
    rows="12"
    class="py-2.5 px-3 w-full text-sm rounded border-none mt-3 bg-[#2B2D2D] focus:border-primary-purple ease-out transition focus:outline-none focus:ring-0 peer"

></textarea>
</template>

<style scoped>

</style>
