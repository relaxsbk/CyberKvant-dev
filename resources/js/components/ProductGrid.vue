<script setup>

import Card from "@/components/Card.vue";

const props = defineProps({
    products: Object,
    cartProductIds: Array,
    favoriteProductIds: Array,
    compareProductIds: Array,
})

</script>

<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 ">
        <div
            v-for="product in props.products.data"
        >
            <Card :product=product
                  :cart-product-ids="cartProductIds"
                  :favorite-product-ids="favoriteProductIds"
                  :compare-product-ids="compareProductIds"
            />
        </div>

    </div>
</template>

<style scoped>

</style>
