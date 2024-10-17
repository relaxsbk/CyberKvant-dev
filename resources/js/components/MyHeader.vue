<script setup>

</script>

<template>
    <nav class="bg-[#1E1E1E] ">
        <div class="container mx-auto flex items-center justify-between p-4">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <img src="https://via.placeholder.com/294x69" alt="Logo" class="w-72 h-16" />
            </div>

            <!-- Catalog Button for large screens -->
            <div class="text-[16px] ml-7 hidden lg:block">
                <button class="bg-[#9701FE] text-white px-4 py-3 rounded-[10px] flex flex-nowrap items-center text-center ">
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
                    class=" lg:w-96 px-4 py-3 border border-gray-300 rounded-[10px] flex-grow ml-7 mr-36 w-5"
                />


            <!-- Links -->
            <ul class="flex space-x-6 items-center text-white">
                <li class="relative">
                    <a href="#" class="flex flex-col items-center">
                        <img src="https://via.placeholder.com/20x22" alt="Compare" />
                        <span >Сравнить</span>
                    </a>
                </li>
                <li class="relative">
                    <a href="#" class="flex flex-col items-center">
                        <img src="https://via.placeholder.com/20x22" alt="Favorites" />
                        <span >Избранное</span>
                    </a>
                </li>
                <li class="relative">
                    <a href="#" class="flex flex-col items-center">
                        <img src="https://via.placeholder.com/20x22" alt="Cart" />
                        <span >Корзина</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex flex-col items-center">
                        <img src="https://via.placeholder.com/20x22" alt="Account" />
                        <span >Аккаунт</span>
                    </a>
                </li>
            </ul>

            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</template>

<style scoped>

</style>
