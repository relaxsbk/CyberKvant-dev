<script setup>
    import {ref} from "vue";

    const searchInput = ref('')
</script>

<template>
    <form action="*" class="relative bg-white rounded-[10px]">
        <input
            v-model="searchInput"
            id="searchInput"
            type="search"
            class=" text-black px-4 py-3 rounded-[10px] w-full border border-solid border-transparent duration-500 ease-linear transition-colors focus:border-dark-purple outline-none shadow-none"
        />

        <transition name="fade">
            <label v-if="!searchInput" class="text-gray-600 absolute left-0 py-3 px-4" for="searchInput">Поиск...</label>
        </transition>

    </form>
</template>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.5s ease;
    }
    .fade-enter-from, .fade-leave-to {
        opacity: 0;
    }
</style>
