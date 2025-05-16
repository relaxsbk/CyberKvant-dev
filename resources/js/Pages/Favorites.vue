<script setup>
import Breadcrumb from "../components/Breadcrumb.vue";
import AppHead from "../AppHead/AppHead.vue";
import Card from "../components/Card.vue";
import {ref} from "vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    products: Array,
    cartProductIds: Array,
    compareProductIds: Array,
    cartFavoriteIds: Array,
});

const favorite = ref(props.products);

const handleRemoveFavorite = (productId) => {
    favorite.value = favorite.value.filter(item => item.id !== productId);
};

const removeAll = () => {
    router.post(route('favorites.removeAll'), {
        // product_id: props.product.id,
        // quantity: 1
    }, {
        preserveScroll: true,
        onSuccess: () => {
            favorite.value = [];
            console.log('Корзина очищена');
        }
    });
};


</script>

<template>
    <AppHead title="Избранное | Интернет-магазин бытовой и цифровой техники ГиперКвант"/>
    <section class="container mx-auto mt-10">
        <Breadcrumb class="mt-8 mb-5">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Избранное</span>
                </div>
            </li>
        </Breadcrumb>

        <br>
        <h2 class="text-3xl mb-[30px] flex gap-3 items-center">
            Избранное <span v-if="favorite?.length > 0">( {{favorite?.length}} )</span>
            <span v-if="favorite?.length > 0"  @click="removeAll" class="text-[18px] text-secondary-purple cursor-pointer hover:text-white-purple duration-200">
                очистить
            </span>
        </h2>
        <div v-if="favorite?.length > 0" class="flex flex-row flex-wrap gap-2">
            <div v-for="product in products" >
                <div class="w-[300px]">
                    <Card
                        :cart-product-ids="cartProductIds"
                        :favorite-product-ids="cartFavoriteIds"
                        :compare-product-ids="compareProductIds"
                        :product="product"
                        @remove-from-favorites="handleRemoveFavorite"
                    />
                </div>
            </div>
        </div>
        <div v-else class="flex flex-row flex-wrap gap-2">
            Товаров нет
        </div>


    </section>
</template>
<style scoped>

</style>
