<script setup>
import Breadcrumb from "@/components/Breadcrumb.vue";
import AccordionFilters from "@/components/AccordionFilters.vue";
import ProductGrid from "@/components/ProductGrid.vue";
</script>

<template>
    <section class="container mx-auto mt-20">
        <Breadcrumb />

        <h1 class="text-2xl mt-[30px]">Название категории</h1>
        <section class=" w-full h-auto flex gap-4 py-3">

            <div class="w-80">
                <h2 class="text-white text-lg py-4 ">Фильтры</h2>
                <AccordionFilters />
            </div>
            <div class=" flex-1 py-4">
                <h2 class="text-white text-lg  mb-4">Товары</h2>
                <ProductGrid />
            </div>
        </section>
    </section>
</template>

<style scoped>

</style>
