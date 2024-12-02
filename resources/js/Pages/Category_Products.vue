<script setup>
import Breadcrumb from "@/components/Breadcrumb.vue";
import Accordion from "@/components/Accordion.vue";
import ProductGrid from "@/components/ProductGrid.vue";
import Pagination from "@/components/Pagination.vue";
import {router} from "@inertiajs/vue3";
import Filters from "@/components/Filters.vue";

const props = defineProps({
    category: Object,
    products: Object,
    appliedFilters: Object,
    filters: Object
})


</script>

<template>
    <section class="container mx-auto mt-[30px]">
        <Breadcrumb />

        <h1 class="text-3xl text-center mt-[30px]">Название категории: <span class="text-secondary-purple">{{props.category.title}}</span></h1>
        <section class=" w-full h-auto flex gap-4 py-3">

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

                <ProductGrid :products=props.products />

                <pagination class="mt-[15px]" :links="props.products.links"/>
            </div>

        </section>
    </section>
</template>

<style scoped>

</style>
