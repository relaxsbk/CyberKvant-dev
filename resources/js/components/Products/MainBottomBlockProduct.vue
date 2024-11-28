<script setup>
import Accordion from "@/components/Accordion.vue";
import { computed } from "vue";

const props = defineProps({
    reviews: { type: Array, default: () => [] }, // Отзывы
    characteristic: { type: Array, } // Характеристики
});

// Преобразуем массив characteristics в структуру для аккордиона
const processedCharacteristics = computed(() => {
    if (!Array.isArray(props.characteristic)) return [];

    return props.characteristic.map((group) => {
        // Преобразуем каждый элемент массива
        const [groupName, attributes] = Object.entries(group)[0]; // Получаем название группы и её характеристики
        return {
            title: groupName, // Название группы характеристик
            content: attributes // Характеристики в группе
        };
    });
});

const sections = computed(() => [
    {
        title: "Характеристики",
        content: props.characteristic
    },
    {
        title: "Отзывы",
        content: props.reviews.map(
            (review) => `${review.userName}: ${review.text}`
        )
    }
]);


</script>

<template>
    <section class="bg-[#1E1E1E] rounded-t-[40px] py-[30px] sm:px-12 mt-[-40px] w-full relative z-10">
        <div class="container mx-auto">
            <!-- Для проверки выводим сформированные данные -->


            <!-- Аккордион -->
            <Accordion :sections="sections" />
        </div>
    </section>
</template>

<style scoped>
</style>
