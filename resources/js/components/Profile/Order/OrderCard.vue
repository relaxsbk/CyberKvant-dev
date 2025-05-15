<script setup>

import OrderItem from "./OrderItem.vue";
import LabelOrder from "./LabelOrder.vue";

const props = defineProps({
    order: Object
});


</script>

<template>
    <div class="w-full rounded-lg shadow-sm bg-white border-gray-700 mb-[25px]">
        <div class="flex items-center gap-3 px-6 py-2 font-medium text-start rounded-t-lg border-b border-[#777777] text-black">
            <h1 class="text-xl">Заказ №{{ order.id }}</h1>
            <span class="text-[#777777]">от {{ new Date(order.created_at).toLocaleDateString() }}</span>
            <LabelOrder :value="props.order.order_status.label" />
        </div>
        <div class="flex justify-between items-center gap-24 p-6 text-black">
            <div class="flex flex-col gap-5">
                <OrderItem
                    v-for="item in order.items"
                    :key="item.id"
                    :item="item"
                />
            </div>
            <div class="text-2xl font-bold">
                {{ order.total.toLocaleString() }} ₽
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
