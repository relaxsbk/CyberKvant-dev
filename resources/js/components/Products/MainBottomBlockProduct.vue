<script setup>
import Accordion from "@/components/Accordion.vue";
import {computed} from "vue";

const props = defineProps({
    reviews: {type: Array, default: () => []},
    characteristic: {type: Array,}
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

            <!-- Аккордион -->
            <Accordion :sections="sections"/>
        </div>
    </section>
</template>

<style scoped>
</style>
