<script setup>

import Breadcrumb from "@/components/Breadcrumb.vue";
import MainLeftBlockProduct from "@/components/Products/MainLeftBlockProduct.vue";
import MainRightBlockProduct from "@/components/Products/MainRightBlockProduct.vue";
import MainBottomBlockProduct from "@/components/Products/MainBottomBlockProduct.vue";
import AppHead from "@/AppHead/AppHead.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    product: Object
})
</script>

<template>
    <AppHead :title="'Купить' + ' ' + product.title + ' ' + 'в магазине ГиперКвант '"/>
    <section class="container mx-auto mt-[30px] ">
           <Breadcrumb class="mt-8 mb-5">
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <Link :href="$route('catalog')" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white duration-200">Каталог</Link>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <Link :href="$route('catalog.show', product.catalog)" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white duration-200">Категории {{product.category.catalog.title}} </Link>
            </div>
        </li>
               <li>
                   <div class="flex items-center">
                       <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                       </svg>
                       <Link :href="$route('category.show', product.category)" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white duration-200">{{product.category.title}} </Link>
                   </div>
               </li>

        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{product.title}}</span>
            </div>
        </li>
    </Breadcrumb>
    </section>

    <section class=" mt-10 mb-[60px] container mx-auto flex flex-col justify-between sm:items-center lg:items-stretch lg:flex-row gap-8">
       <MainLeftBlockProduct :mainImage="product.mainImage" :images="product.images"/>
       <MainRightBlockProduct :title="product.title" :price="product.price" :rating="product.rating" :reviews_count="product.reviewsCount" />
    </section>

    <MainBottomBlockProduct :product="product" :description="product.description" :characteristic="product.characteristic" :reviews="product.reviews" />
</template>

<style scoped>

</style>
