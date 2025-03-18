<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

</script>

<template>
    <input
        class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none text-white border-gray-600 focus:border-primary-purple ease-out transition focus:outline-none focus:ring-0 peer"
        placeholder=" "
        v-model="model"
    />
</template>

<style scoped>

</style>
