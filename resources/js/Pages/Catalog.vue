<script setup>
import CatalogCard from "@/components/CatalogCard.vue";
import AppHead from "@/AppHead/AppHead.vue";

defineProps({
    'catalogs': Array
})

</script>

<template>
    <AppHead title="Каталог | Интернет-магазин бытовой и цифровой техники ГиперКвант"/>
    <section class="container mx-auto mt-12 mb-[60px]">
        <h1 class="text-3xl mb-[30px]">Каталог товаров</h1>
        <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6 py-1 items-center">
            <CatalogCard
                v-for="catalog in catalogs"
                :key="catalog.id"
                :id="catalog.id"
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
