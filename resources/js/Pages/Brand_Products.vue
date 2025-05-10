<script setup>
import Breadcrumb from "@/components/Breadcrumb.vue";
import CategoryCard from "../components/CategoryCard.vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    brand: Object,
    categories: Object
})

</script>

<template>
    <section class="container mx-auto mt-10 ">
        <Breadcrumb class="mt-8 mb-5">
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <Link :href="$route('brands')" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white duration-200">Бренды</Link>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Категории бренда {{props.brand.title}}</span>
                </div>
            </li>
        </Breadcrumb>
        <br>
        <h2 class="text-4xl text-center mb-[30px]">Бренд название {{props.brand.title}} </h2>

        <section>
            <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 py-1 mb-[30px]">
                <CategoryCard
                    v-for="category in props.categories"
                    :key="category.id"
                    :id="category.id"
                    :title="category.title"
                    :image="category.image"
                    :brand="props.brand.title"
                />
            </div>
            <p class="text-xl mb-[30px]">{{props.brand.description}}</p>
        </section>

    </section>
</template>

<style scoped>

</style>
