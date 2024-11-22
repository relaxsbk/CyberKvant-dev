<script setup>

import Breadcrumb from "@/components/Breadcrumb.vue";
import Brand from "@/Brand/Brand.vue";

defineProps({
    "brands": Array
})
</script>

<template>
    <section class="container mx-auto mt-10">
        <Breadcrumb />
        <br>
        <h2 class="text-3xl text-center mb-[30px]">Бренды</h2>
        <div class="h-auto grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 py-4">
            <Brand
                class="mb-[15px]"
                v-for="brand in brands"
                :key="brand.id"
                :title="brand.title"
                :image="brand.image"
            />

        </div>
    </section>
</template>

<style scoped>

</style>
