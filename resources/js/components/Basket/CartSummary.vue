<script setup>
import { ref } from 'vue';

const isChecked = ref(false);
</script>

<template>
    <div class="p-6 h-min bg-white rounded-lg text-black">
        <h3 class="text-2xl mb-4 font-bold">Итого</h3>
        <div class="mb-5 flex flex-row justify-between items-center">
            <p class="text-[14px] text-gray-500">Товаров на сумму</p>
            <p class="font-bold text-[20px]">125 000 ₽</p>
        </div>
        <hr class="mb-5">
        <div class="mb-3 flex flex-row justify-between items-center">
            <p class="text-xl font-bold">К оплате </p>
            <p class="font-bold text-2xl">125 000 ₽</p>
        </div>

        <!-- Чекбокс согласия -->
        <div class="mt-4 flex items-start gap-x-2">
            <input type="checkbox" id="agree" v-model="isChecked" class="mt-1 rounded text-primary-purple focus:ring-0">
            <label for="agree" class="text-sm text-gray-700">
                Я согласен с условиями использования<br>
                пользовательского соглашения
            </label>
        </div>

        <!-- Кнопка оформления -->
        <button
            class="mt-4 w-full text-white bg-primary-purple py-2 rounded-lg transition-opacity duration-200"
            :class="{ 'opacity-50 cursor-not-allowed': !isChecked }"
            :disabled="!isChecked"
        >
            Оформить заказ
        </button>
    </div>
</template>
