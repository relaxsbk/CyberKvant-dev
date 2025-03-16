<script setup>

import Card from "@/components/Card.vue";
import Pagination from "@/components/Pagination.vue";

const props = defineProps({
    products: Object
})

</script>

<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 ">
        <div
            v-for="product in props.products.data"
        >
            <Card :product=product />
        </div>

    </div>
</template>

<style scoped>

</style>
