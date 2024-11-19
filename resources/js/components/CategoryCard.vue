<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    id: Number,
    key: Number,
    title: String,
    image: String
})
</script>

<template>
    <Link :href="$route('category.show', {category: id})"  class="bg-[#383A3A]/65 w-full h-[213px] flex flex-col justify-center items-center space-y-4 rounded-[10px] duration-200 ease-linear hover:bg-[#494A4A] hoverText cursor-pointer">
        <img class="max-h-[125px] max-w-[175px]" src="/resources/images/static/Category/1_758129.png" :alt="title">
        <p class="text-[18px] text-center">{{ title }}</p>
    </Link>
</template>

<style scoped>

</style>
