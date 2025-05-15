<script setup>
const props = defineProps({
    item: Object
});
</script>

<template>
    <div class="flex items-center gap-4">
        <img
            :src="item.product.main_image_or.url"
            alt="product image"
            class="w-16 h-16 object-cover rounded"
        />
        <div>
            <h3 class="text-md font-medium">{{ item.product.title }}</h3>
            <p class="text-sm text-gray-500">Кол-во: {{ item.quantity }}</p>
            <p class="text-sm text-gray-700">Цена: {{ item.total_price.toLocaleString() }} ₽</p>
        </div>
    </div>
</template>
