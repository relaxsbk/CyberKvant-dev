<script setup>

import Card from "@/components/Card.vue";
</script>

<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        <div
            v-for="product in 12"
            :key="product"
            class="bg-white rounded-lg p-4 shadow-md"
        >
            <Card :product="{ title: 'Товар', category: 'Категория', price: 1000, rating: 4.5, reviews: 10 }" />
        </div>
    </div>
</template>

<style scoped>

</style>
