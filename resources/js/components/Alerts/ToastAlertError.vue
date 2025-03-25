<script setup>
import {ref, watch } from "vue";

const props = defineProps({
    errors: {
        type: Object,
        required: true
    },
    message: {
        type: String,
        required: true
    }
});
const isVisible = ref(false);
const errorKey = ref(0);

// Функция для скрытия тоста с анимацией
const hideToast = () => {
    isVisible.value = false;
};

// Следим за ошибками и показываем тост
watch(() => props.errors, (newErrors) => {
    if (Object.keys(newErrors).length > 0) {
        isVisible.value = true;
        errorKey.value++; // Обновляем ключ, чтобы Vue перерисовал тост

        // Автоматически скрываем тост через 5 секунд
        setTimeout(hideToast, 5000);
    }
}, { deep: true });
</script>

<template>
    <Transition name="fade">
        <div v-if="isVisible" :key="errorKey" class="fixed z-50 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 divide-x rtl:divide-x-reverse rounded-lg shadow-sm right-5 bottom-5 dark:text-gray-400 divide-[#1E1E1E] bg-[#1E1E1E]" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                </svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{message}}</div>
            <button type="button" @click="hideToast" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-[#1E1E1E] dark:hover:bg-gray-700">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </Transition>
</template>

<style scoped>
/* Анимация появления и исчезновения */
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
    transform: translateY(20px);
}
</style>
