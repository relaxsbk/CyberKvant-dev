<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);
</script>

<template>
    <select v-model="model"
            class="py-2.5 px-3 w-full mt-3 text-sm rounded border-none bg-[#2B2D2D] focus:border-primary-purple ease-out transition focus:outline-none focus:ring-0 peer">
        <option value="5" class="bg-[#1e1e1e]/70">5</option>
        <option value="4" class="bg-[#1e1e1e]/70">4</option>
        <option value="3" class="bg-[#1e1e1e]/70">3</option>
        <option value="2" class="bg-[#1e1e1e]/70">2</option>
        <option value="1" class="bg-[#1e1e1e]/70">1</option>



    </select>
</template>

<style scoped>

</style>
