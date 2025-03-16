<script setup>
import Card from "./Card.vue";


defineProps({
    product: {
        type: Object,
        required: true
    }
});



</script>

<template>
   <Card :product="product" />
    <div class="bg-[#D9D9D9] text-black mt-[-10px] py-[30px] px-[12px] rounded-b-[10px]">
        <p class="text-[16px] mb-2">
            Основные характеристики:
        </p>
        <div>
            <p class="text-[12px] text-gray-500 mb-1">
                Цвет
            </p>
            <p class="text-[14px] mb-2">
                Чёрный
            </p>

        </div>
    </div>
</template>

<style scoped>

</style>
