<script setup>
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";

// Пропсы, принимающие данные для фильтров
const props = defineProps({
    category: Number,
    priceRange: {
        type: Object,
        required: true,
    },
    brands: {
        type: Array,
        required: true,
    },
    appliedFilters: {
        type: Object,
        required: false, // Становится необязательным
        default: () => ({}), // Значение по умолчанию
    },
});

// Локальные переменные для хранения значений фильтров
const selectedBrands = ref(props.appliedFilters.brands || []);
const minPrice = ref(props.appliedFilters.price_min || props.priceRange.min);
const maxPrice = ref(props.appliedFilters.price_max || props.priceRange.max);

// Обработка применения фильтров
const applyFilters = () => {
    const filters = {
        price_min: minPrice.value,
        price_max: maxPrice.value,
        brands: selectedBrands.value,
    };

    // Отправка данных фильтров на сервер
    router.get(route("category.show", { category: props.category }), filters, {
        preserveScroll: true,
        preserveState: true,
    });
};

// Следим за изменением входящих фильтров (если нужно динамическое обновление)
watch(
    () => props.appliedFilters,
    (newFilters) => {
        selectedBrands.value = newFilters.brands || [];
        minPrice.value = newFilters.price_min || props.priceRange.min;
        maxPrice.value = newFilters.price_max || props.priceRange.max;
    },
    { immediate: true }
);
</script>

<template>
    <div class="xs:mt-5 sm:mt-0 space-y-2">
        <!-- Фильтр по цене -->
        <div class="border border-gray-700 rounded-[10px] ">
            <div
                class="w-full flex items-center rounded-t-[10px] justify-between p-5 font-medium gap-3 transition ease-in-out duration-200 bg-gray-800 text-gray-400"
            >
                <span class="text-lg">Цена</span>
            </div>
            <div
                class="p-5 border-t text-gray-400 rounded-b-[10px] border-gray-700 bg-gray-900"
            >
                <div class="flex gap-2">
                    <input
                        name="price_min"
                        type="number"
                        class="w-1/2 p-2 border rounded-md focus:ring-dark-purple"
                        v-model="minPrice"
                        :placeholder="`От ${props.priceRange.min}`"
                    />
                    <input
                        name="price_max"
                        type="number"
                        class="w-1/2 p-2 border rounded-md focus:ring-dark-purple"
                        v-model="maxPrice"
                        :placeholder="`До ${props.priceRange.max}`"
                    />
                </div>
            </div>
        </div>

        <!-- Фильтр по брендам -->
        <div class="border border-gray-700 rounded-xl">
            <div
                class="w-full flex items-center rounded-t-[10px] justify-between p-5 font-medium gap-3 transition ease-in-out duration-200 bg-gray-800 text-gray-400"
            >
                <span class="text-lg">Бренды</span>
            </div>
            <div
                class="p-5 border-t text-gray-400 rounded-b-xl border-gray-700 bg-gray-900"
            >
                <div v-for="brand in props.brands" :key="brand" class="flex items-center gap-2">
                    <input
                        name="brand"
                        type="checkbox"
                        :value="brand"
                        v-model="selectedBrands"
                        class="cursor-pointer text-primary-purple bg-gray-100 border-gray-300 rounded focus:ring-purple-600  ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />
                    <label>{{ brand }}</label>
                </div>
            </div>
        </div>

        <!-- Кнопка применения фильтров -->
        <button
            type="button"
            @click="applyFilters"
            class="text-center w-full px-4 py-3 mt-2 bg-dark-purple text-white rounded-[10px]"
        >
            Применить
        </button>
    </div>
</template>
