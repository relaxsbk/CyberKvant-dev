<script setup>

import OrderItem from "./OrderItem.vue";
</script>

<template>
    <div class="w-full  rounded-lg shadow-sm bg-white border-gray-700 mb-[25px]">
        <div class="flex flex-row items-center gap-3 px-6 py-2 font-medium text-start rounded-t-lg border-b border-[#777777] text-black" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <h1 class="text-xl text-black ">Заказ №1</h1>
            <span class="text-[#777777]">от 13.12.2024</span>
            <label class="bg-[#CA7FFE]/30 text-dark-purple px-6 py-1 rounded-[10px] text-sm">Завершён</label>
        </div>
        <div class="flex justify-between items-center gap-24 p-6 text-black">
            <div class="text-lg flex flex-row gap-5">
                <OrderItem/>
                <OrderItem/>

            </div>
            <div class="text-2xl font-bold">
                150 000 Р
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
