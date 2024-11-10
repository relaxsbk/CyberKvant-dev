<script setup>


const props = defineProps({
    title: String,
    image: String
})
</script>

<template>
    <div class="bg-[#383A3A]/65 w-full h-[213px] flex flex-col justify-center items-center space-y-4 rounded-[10px] duration-200 ease-linear hover:bg-[#494A4A] hoverText cursor-pointer">
        <img class="max-h-[125px] max-w-[175px]" src="/resources/images/static/Category/1_758129.png" :alt="title">
        <p class="text-[18px] text-center">{{ title }}</p>
    </div>
</template>

<style scoped>

</style>
