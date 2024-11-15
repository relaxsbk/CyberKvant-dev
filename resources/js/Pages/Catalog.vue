<script setup>
import Category from "@/components/Category.vue";

defineProps({
    'catalogs': Array
})

</script>

<template>
    <section class="container mx-auto mt-12 mb-[60px]">
        <h1 class="text-3xl mb-[30px]">Каталог товаров</h1>
        <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6 py-1 items-center">
            <Category
                v-for="catalog in catalogs"
                :key="catalog.id"
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
