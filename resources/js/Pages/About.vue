<script setup>

import AppHead from "@/AppHead/AppHead.vue";
import Breadcrumb from "../components/Breadcrumb.vue";
</script>

<template>
    <AppHead title="О нас | Интернет-магазин бытовой и цифровой техники ГиперКвант"/>

    <section class="container mx-auto">
        <Breadcrumb class="mt-8 mb-5">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">О нас</span>
                </div>
            </li>
        </Breadcrumb>

        <h1>О нас</h1>
    </section>
</template>

<style scoped>

</style>
