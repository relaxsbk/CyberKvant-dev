<script setup>
import { ref } from 'vue';
import { IMaskDirective } from 'vue-imask';  // Импортируем директиву

// Ссылка на модель данных
const model = ref('');
</script>

<template>
    <!-- Используем директиву v-mask с маской для номера телефона -->
    <input
        v-mask="'+7 (000) 000-0000'"
        class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-primary-purple ease-out transition focus:outline-none focus:ring-0 peer"
        placeholder=" "
        v-model="model"
    />
</template>

<style scoped>
/* Стили для инпута */
</style>
