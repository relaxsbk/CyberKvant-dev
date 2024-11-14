<script setup>
    import {useHost} from "vue";

     defineProps({
        title: String,
        image: String
    })
</script>

<template>
    <div class="bg-white text-black w-full h-[70px] sm:h-[60px] lg:h-[70px] rounded-[10px] flex justify-center items-center cursor-pointer duration-200 ease-linear hover:bg-gray-400 ">
        <img class="w-[120px] sm:w-[100px] lg:w-[150px] h-auto lg:px-2" :src="image" :alt="title">
    </div>
</template>

<style scoped>

</style>
