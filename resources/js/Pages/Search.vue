<script setup>
import AppHead from "@/AppHead/AppHead.vue";
import Breadcrumb from "../components/Breadcrumb.vue";

import Pagination from '@/components/Pagination.vue';
import Card from "../components/Card.vue";

const props = defineProps({
    products: Object,
    query: String,
    cartProductIds: Array,
    favoriteProductIds: Array,
    compareProductIds: Array,
});

</script>


<template>
    <AppHead title="О нас | Интернет-магазин бытовой и цифровой техники ГиперКвант" />

    <section class="container mx-auto">
        <Breadcrumb class="mt-8 mb-5">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Результат по запросу "{{ query }}"</span>
                </div>
            </li>
        </Breadcrumb>


    </section>

    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-6">
            Результаты поиска для <span class="text-secondary-purple">"{{ query }}"</span>
        </h1>

        <div v-if="products.data.length">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <Card
                    v-for="product in products.data"
                    :key="product.id"
                    :product="product"
                    :cart-product-ids="cartProductIds"
                    :favorite-product-ids="favoriteProductIds"
                    :compare-product-ids="compareProductIds"
                />
            </div>

            <Pagination :links="products.links" class="mt-6" />
        </div>
        <div v-else>
            <p>Товары не найдены.</p>
        </div>
    </div>
</template>

<style scoped>
</style>
