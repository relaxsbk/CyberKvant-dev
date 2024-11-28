<script setup>

</script>

<template>
    <!-- Левая часть с фотографиями -->
    <div class="border border-gray-800 rounded-[10px] p-3 flex flex-col items-center w-full sm:w-10/12  md:w-8/12  lg:w-8/12">
        <!-- Основная фотография -->
        <div class="w-full aspect-square mb-4 flex lg:w-10/12">
            <!--                <img src="https://via.placeholder.com/500x500" alt="Main product image" class="object-cover w-full h-full">-->
            <img src="/resources/images/static/Category/1_758129.png" alt="Main product image"
                 class="object-cover w-full h-full">
        </div>

        <!-- Превью фотографий -->
        <div class="flex gap-4 overflow-x-auto w-full  max-w-md justify-center flex-shrink-0">
            <div
                class="border-2 border-white-purple transition duration-200 ease-linear cursor-pointer xs:h-16 xs:w-16 sm:h-24 sm:w-24 p-1.5 rounded-[10px] flex-shrink-0">
                <!--                    <img src="https://via.placeholder.com/100x100" alt="Preview 1" class="object-cover w-full h-full rounded-md">-->
                <img src="/resources/images/static/Category/1_758129.png" alt="Preview 1"
                     class="object-cover w-full h-full rounded-md">
            </div>
            <div
                class="border-2 border-gray-500 transition duration-200 ease-linear cursor-pointer hover:border-white p-1.5  xs:h-16 xs:w-16 sm:h-24 sm:w-24 rounded-[10px]  flex-shrink-0">
                <!--                    <img src="https://via.placeholder.com/100x100" alt="Preview 2" class="object-cover w-full h-full rounded-md">-->
                <img src="/resources/images/static/Category/1_758129.png" alt="Preview 2"
                     class="object-cover w-full h-full rounded-md">
            </div>
            <div
                class="border-2 border-gray-500 transition duration-200 ease-linear cursor-pointer hover:border-white p-1.5  xs:h-16 xs:w-16 sm:h-24 sm:w-24 rounded-[10px]  flex-shrink-0">
                <!--                    <img src="https://via.placeholder.com/100x100" alt="Preview 2" class="object-cover w-full h-full rounded-md">-->
                <img src="/resources/images/static/Category/1_758129.png" alt="Preview 2"
                     class="object-cover w-full h-full rounded-md">
            </div>

        </div>
    </div>

</template>

<style scoped>

</style>
