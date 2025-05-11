<script setup>

import Breadcrumb from "@/components/Breadcrumb.vue";
import Brand from "@/Brand/Brand.vue";
import AppHead from "@/AppHead/AppHead.vue";

defineProps({
    "brands": Array
})
</script>

<template>
    <AppHead title="Бренды | Интернет-магазин бытовой и цифровой техники ГиперКвант"/>
    <section class="container mx-auto mt-10">
        <Breadcrumb class="mt-8 mb-5">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Бренды</span>
                </div>
            </li>
        </Breadcrumb>

        <br>
        <h2 class="text-3xl text-center mb-[30px]">Бренды</h2>
        <div class="h-auto grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 py-4">
            <Brand
                class="mb-[15px]"
                v-for="brand in brands"
                :key="brand.id"
                :id="brand.id"
                :slug="brand.slug"
                :title="brand.title"
                :image="brand.image"
            />

        </div>
    </section>
</template>

<style scoped>

</style>
