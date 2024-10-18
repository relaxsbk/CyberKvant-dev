<script setup>
import { ref } from 'vue';

// Reactive state to control the mobile menu visibility
const isMenuOpen = ref(false);

// Toggle the mobile menu visibility
const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};
</script>

<template>
    <nav class="bg-[#1E1E1E] fixed w-full z-50">
        <div class="container mx-auto flex items-center justify-between p-4">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <img src="/resources/js/Pages/logo-name.svg%20fill.svg" alt="Logo" class="w-72 h-16" />
            </div>

            <!-- Catalog Button for large screens -->
            <div class="text-[16px] ml-7 hidden lg:block">
                <button class="bg-[#9701FE] text-white px-4 py-3 rounded-[10px] flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list mr-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    Каталог
                </button>
            </div>

            <!-- Search bar -->
            <input
                type="text"
                placeholder="Поиск"
                class="lg:w-96 px-4 py-3 border border-gray-300 rounded-[10px] flex-grow ml-7 mr-36 hidden lg:block"
            />

            <!-- Links for large screens -->
            <ul class="hidden lg:flex space-x-6 items-center text-white">
                <li>
                    <a href="#" class="flex flex-col items-center">
                        <img src="https://via.placeholder.com/20x22" alt="Compare" />
                        <span>Сравнить</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex flex-col items-center">
                        <img src="https://via.placeholder.com/20x22" alt="Favorites" />
                        <span>Избранное</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex flex-col items-center">
                        <img src="https://via.placeholder.com/20x22" alt="Cart" />
                        <span>Корзина</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex flex-col items-center">
                        <img src="https://via.placeholder.com/20x22" alt="Account" />
                        <span>Аккаунт</span>
                    </a>
                </li>
            </ul>

            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button @click="toggleMenu" class="text-gray-200 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div v-if="isMenuOpen" class="lg:hidden bg-[#1E1E1E] transition duration-100 ease-in-out">
            <div class="p-4">
                <ul class="space-y-4 text-white">
                    <li class="flex flex-col items-center bg-[#9701FE] text-white px-4 py-3 rounded-[10px] ">
                        <a href="#" class="block">Каталог</a>
                    </li>
                    <li>
                        <a href="#" class="flex flex-col items-center">
                            <img src="https://via.placeholder.com/20x22" alt="Compare" />
                            <span>Сравнить</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex flex-col items-center">
                            <img src="https://via.placeholder.com/20x22" alt="Favorites" />
                            <span>Избранное</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex flex-col items-center">
                            <img src="https://via.placeholder.com/20x22" alt="Cart" />
                            <span>Корзина</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex flex-col items-center">
                            <img src="https://via.placeholder.com/20x22" alt="Account" />
                            <span>Аккаунт</span>
                        </a>
                    </li>
                </ul>

                <!-- Search bar for mobile -->
                <div class="mt-4">
                    <input
                        type="text"
                        placeholder="Поиск"
                        class="w-full px-4 py-3 border border-gray-300 rounded-[10px]"
                    />
                </div>
            </div>
        </div>
    </nav>
</template>

<style scoped>
/* You can add any additional styling here if needed */
</style>
