<script setup>
import Breadcrumb from "../components/Breadcrumb.vue";
import AppHead from "../AppHead/AppHead.vue";
import CardCompare from "../components/CardCompare.vue";
import {ref} from "vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    products: Array,
    cartProductIds: Array,
    favoriteProductIds: Array,
    compareProductIds: Array,
});

const compare = ref(props.products);

const handleRemoveCompare = (productId) => {
    compare.value = compare.value.filter(item => item.id !== productId);
};

const removeAll = () => {
    router.post(route('compare.removeAll'), {

    }, {
        preserveScroll: true,
        onSuccess: () => {
            compare.value = [];
        }
    });
};
</script>

<template>
    <AppHead title="Сравнить | Интернет-магазин бытовой и цифровой техники ГиперКвант"/>
    <section class="container mx-auto mt-10">
        <Breadcrumb class="mt-8 mb-5">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Сравнить</span>
                </div>
            </li>
        </Breadcrumb>

        <br>
        <h2 class="text-3xl mb-[30px] flex gap-3 items-center">
            Сравнить <span v-if="compare?.length > 0">( {{compare?.length}} )</span>
            <span v-if="compare?.length > 0"  @click="removeAll" class="text-[18px] text-secondary-purple cursor-pointer hover:text-white-purple duration-200">
                очистить
            </span>
        </h2>
        <div v-if="compare?.length > 0" class="flex flex-row flex-wrap gap-2 mb-[60px]">
            <div v-for="product in products" >
                <div class="w-[300px]">
                    <CardCompare
                        :product="product"
                        :cart-product-ids="cartProductIds"
                        :favorite-product-ids="favoriteProductIds"
                        :compare-product-ids="compareProductIds"
                        @remove-from-compare="handleRemoveCompare"
                    />
                </div>
            </div>
        </div>
        <div v-else>
            Нечего сравнивать
        </div>


    </section>
</template>
<style scoped>

</style>
