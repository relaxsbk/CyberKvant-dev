<script setup>

import Breadcrumb from "@/components/Breadcrumb.vue";
import MainLeftBlockProduct from "@/components/Products/MainLeftBlockProduct.vue";
import MainRightBlockProduct from "@/components/Products/MainRightBlockProduct.vue";
import MainBottomBlockProduct from "@/components/Products/MainBottomBlockProduct.vue";

defineProps({
    product: Object
})
</script>

<template>

    <section class="container mx-auto mt-[60px] ">
        <Breadcrumb/>
    </section>

    <section class=" mt-20 mb-[60px] container mx-auto flex flex-col justify-between sm:items-center lg:items-stretch lg:flex-row gap-8">
       <MainLeftBlockProduct />
       <MainRightBlockProduct :title="product.title" :price="product.price" :rating="product.rating" :reviews_count="product.reviewsCount" />
    </section>

    <MainBottomBlockProduct :description="product.description" :characteristic="product.characteristic" :reviews="product.reviews" />
</template>

<style scoped>

/* Для кастомизации можно добавить стили для горизонтального скролла */

</style>
