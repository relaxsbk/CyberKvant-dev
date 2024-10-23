<script setup>
import { defineProps } from 'vue';


const props = defineProps({
    product: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <article class="product-card-clean grid items-center bg-white rounded-lg text-[#13181e] grid-areas-template w-full h-[400px] p-4 relative text-center overflow-hidden">
        <div class="labels mb-3 flex justify-start gap-1">
            <div
                v-for="(label, index) in product.labels"
                :key="index"
                :class="{'bg-secondary-purple': label === 'Новинка', 'bg-dark-purple': label === 'Акция'}"
                class="text-white font-bold rounded-[10px] px-3 text-sm py-px"
            >
            {{ label }}
            </div>
        </div>
        <div class="image w-[180px] h-[180px] justify-self-center ">
            <div class="image bg-gray-200 w-[180px] h-full">
                <img :src="product.imageUrl || 'https://via.placeholder.com/180'" alt="image">
            </div>
        </div>
        <div class="category text-gray-400">{{product.category}}</div>
        <div class="name">{{product.name}}</div>
        <div class="status">⭐ {{product.rating}} 🤨 {{product.reviews}}</div>
        <div class="prices-buttons flex justify-between">
            <div class="text-lg">
                {{product.price}} P
            </div>
            <div>
                Кнопки
            </div>

        </div>
    </article>
</template>

<style scoped>

</style>
