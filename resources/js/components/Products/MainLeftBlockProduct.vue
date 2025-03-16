<script setup>
import { ref } from 'vue';

// Создаём переменную для хранения текущего выбранного изображения
const mainImage = ref('http://localhost:5173/resources/images/static/Category/1_758129.png');

// Массив для хранения путей
const images = [
    'http://localhost:5173/resources/images/static/Category/1_758129.png',
    'http://localhost:5173/resources/images/static/Category/1_758129.png',
    'http://localhost:5173/resources/images/static/Category/1_758129.png'
];

// Переменная для отслеживания выбранного индекса
const activeIndex = ref(0);

// Метод для изменения основного изображения при клике на превью
const changeMainImage = (image, index) => {
    mainImage.value = image;
    activeIndex.value = index; // Обновляем индекс активного изображения
};
</script>

<template>
    <!-- Левая часть с фотографиями -->
    <div class="border border-gray-800 rounded-[10px] p-3 flex flex-col items-center w-full sm:w-10/12  md:w-8/12  lg:w-8/12">
        <!-- Основная фотография -->
        <div class="w-full aspect-square mb-4 flex lg:w-10/12">
            <img :src="mainImage" alt="Main product image" class="object-cover w-full h-full">
        </div>

        <!-- Превью фотографий -->
        <div class="flex gap-4 overflow-x-auto w-full  max-w-md justify-center flex-shrink-0">
            <div
                v-for="(image, index) in images"
                :key="index"
                class="transition duration-200 ease-linear cursor-pointer p-1.5 xs:h-16 xs:w-16 sm:h-24 sm:w-24 rounded-[10px] flex-shrink-0"
                :class="{
                    'border-2 border-white-purple': activeIndex === index, // Активное превью
                    'border-2 border-gray-500': activeIndex !== index // Неактивное превью
                }"
                @click="changeMainImage(image, index)">
                <img :src="image" alt="Preview" class="object-cover w-full h-full rounded-md">
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Можно добавить дополнительные стили для активного состояния */
</style>
