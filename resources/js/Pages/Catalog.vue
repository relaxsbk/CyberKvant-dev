<script setup>
import CatalogCard from "@/components/CatalogCard.vue";
import AppHead from "@/AppHead/AppHead.vue";
import Breadcrumb from "../components/Breadcrumb.vue";

defineProps({
    'catalogs': Array
})

</script>

<template>
    <AppHead title="Каталог | Интернет-магазин бытовой и цифровой техники ГиперКвант"/>

    <section class="container mx-auto  mb-[60px]">
        <Breadcrumb class="mt-8 mb-5">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Каталог</span>
                </div>
            </li>
        </Breadcrumb>


        <h1 class="text-3xl mb-[30px]">Каталог товаров</h1>
        <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6 py-1 items-center">
            <CatalogCard
                v-for="catalog in catalogs"
                :key="catalog.id"
                :id="catalog.id"
                :slug="catalog.slug"
                :title="catalog.title"

            />
<!--            <Category />-->
<!--            <Category />-->
<!--            <Category />-->
<!--            <Category />-->
<!--            <Category />-->
<!--            <Category />-->
<!--            <Category />-->
<!--            <Category />-->
<!--            <Category />-->
        </div>
    </section>
</template>

<style scoped>

</style>
