<script setup>
import { ref } from "vue";

// Массив фильтров
const filters = [
    { title: "Цена", content: "Фильтры по цене" },
    { title: "Бренд", content: "Фильтры по бренду" },
    { title: "Рейтинг", content: "Фильтры по рейтингу" },
];

// Массив активных секций
const activeFilter = ref([]);

// Логика переключения
const toggleFilter = (index) => {
    if (activeFilter.value.includes(index)) {
        // Если секция активна, удаляем её из массива
        activeFilter.value = activeFilter.value.filter((i) => i !== index);
    } else {
        // Если секция не активна, добавляем её
        activeFilter.value.push(index);
    }
};
</script>

<template>
    <div class="space-y-2">
        <div
            v-for="(filter, index) in filters"
            :key="index"
            class="border border-gray-200 rounded-xl dark:border-gray-700 "
        >
            <!-- Шапка с отдельной окраской -->
            <button
                @click="toggleFilter(index)"
                :class="[
                    'w-full flex items-center rounded-xl justify-between p-5 font-medium gap-3 transition ease-in-out duration-200  ',
                    {
                        'bg-secondary-purple/50 text-white': activeFilter.includes(index),
                        'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400': !activeFilter.includes(index)
                    }
                ]"
            >
                <span>{{ filter.title }}</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    :class="{ 'rotate-180': activeFilter.includes(index) }"
                    class="w-3 h-3 shrink-0 transition-transform duration-300"
                    fill="none"
                    viewBox="0 0 10 6"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5 5 1 1 5"
                    />
                </svg>
            </button>

            <!-- Контент с отдельной окраской -->
            <div
                v-show="activeFilter.includes(index)"
                :class="[
                    'p-5 border-t text-gray-500 dark:text-gray-400 rounded-b-xl',
                    'border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-900'
                ]"
            >
                {{ filter.content }}
            </div>
        </div>
    </div>
</template>



