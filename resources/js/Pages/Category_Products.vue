<script setup>
import Breadcrumb from "@/components/Breadcrumb.vue";
import ProductGrid from "@/components/ProductGrid.vue";
import Pagination from "@/components/Pagination.vue";
import Filters from "@/components/Filters.vue";
import AppHead from "@/AppHead/AppHead.vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    category: Object,
    catalog: Object,
    products: Object,
    appliedFilters: Object,
    filters: Object,
    cartProductIds: Array,
    favoriteProductIds: Array,
    compareProductIds: Array
})


</script>

<template>
    <AppHead :title="props.category.title + ' '+ 'Купить в интернет-магазине ГиперКвант | Страница ' + props.products.current_page + ' '+  'из'+ ' '+ props.products.last_page " />
    <section class="container mx-auto mt-[30px]">
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
                    <Link :href="$route('catalog.show', props.catalog)" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white duration-200">Категории {{props.catalog.title}}</Link>
                </div>
            </li>

            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{props.category.title}}</span>
                </div>
            </li>
        </Breadcrumb>

        <h1 class="text-3xl text-center ">Название категории: <span class="text-secondary-purple">{{props.category.title}}</span></h1>
        <section v-if="props.products.data?.length > 0" class=" w-full h-auto flex gap-4 py-3">

            <div class="w-1/5 py-4">
                <div class="sticky top-28">
                    <div class="sticky top-28">
                        <Filters :priceRange="props.filters.priceRange" :brands="props.filters.brands" :appliedFilters="props.appliedFilters" :category="props.category.id" />
                    </div>
<!--                    <Accordion  :sections="sections" />-->


                </div>

            </div>
            <div class=" flex-1 flex-grow py-4">
<!--                <pagination class="mb-[15px]" :links="props.products.links"/>-->

                <ProductGrid
                    :products=props.products
                    :cart-product-ids="cartProductIds"
                    :favorite-product-ids="favoriteProductIds"
                    :compare-product-ids="compareProductIds"
                />

                <pagination class="mt-[15px]" :links="props.products.links"/>
            </div>

        </section>

        <div v-else class="text-2xl text-center mt-12">
            Товаров пока что нет
        </div>
    </section>
</template>

<style scoped>

</style>
