<script setup>
    const props = defineProps({
        title: String,
        image: String
    })
</script>

<template>
    <div class="bg-white w-full h-[70px] sm:h-[60px] lg:h-[70px] rounded-[10px] flex justify-center items-center cursor-pointer">
        <img class="w-[120px] sm:w-[100px] lg:w-[150px] h-auto lg:px-2" src="/resources/images/static/Brands/logo%20samsung.png" :alt="title">
    </div>
</template>

<style scoped>

</style>
