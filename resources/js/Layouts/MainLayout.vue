<script setup>

import MyHeader from "@/components/MyHeader.vue";
import MyFooter from "@/components/MyFooter.vue";
</script>

<template>
    <header>
        <MyHeader />
    </header>

    <main class="flex flex-col min-h-screen">

<!--        <header class="bg-emerald-700">-->
<!--            <nav class="bg-gray-100 border-b border-gray-300 mb-4 fixed top-0 w-full">-->
<!--                <div class="container mx-auto px-4">-->
<!--                    <div class="md:hidden flex items-center justify-between h-16">-->
<!--                        <a class="flex items-center" href="">-->
<!--                            <img class="primary-logo" src="" alt="Основной логотип">-->
<!--                            &lt;!&ndash;                            <img class="secondary-logo" src="" alt="Альтернативный логотип">&ndash;&gt;-->
<!--                        </a>-->
<!--                        <button class="md:hidden flex items-center justify-center p-2 text-gray-500 hover:text-gray-700 focus:outline-none" type="button" aria-controls="navbar" aria-expanded="false" aria-label="Переключатель навигации">-->
<!--                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <div class="hidden md:flex md:items-center md:justify-between" id="navbar">-->
<!--                        <a class="flex items-center" href="">-->
<!--                            <img class="primary-logo" src="" alt="Основной логотип">-->
<!--                            &lt;!&ndash;                            <img class="secondary-logo" src="" alt="Альтернативный логотип">&ndash;&gt;-->
<!--                        </a>-->
<!--                        <ul class="flex space-x-4">-->
<!--                            <li>-->
<!--                                <a class="btn btn-primary flex items-center bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" href="{{route('CatalogPage')}}">-->
<!--                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list mr-1" viewBox="0 0 16 16">-->
<!--                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>-->
<!--                                    </svg>-->
<!--                                    Каталог-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                        <form action="" class="flex items-center" role="search">-->
<!--                            <input class="form-control me-2 border border-gray-300 rounded px-2 py-1" type="search" placeholder="Поиск" aria-label="Поиск" name="search">-->
<!--                            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" type="submit">Поиск</button>-->
<!--                        </form>-->
<!--                        <ul class="flex items-center space-x-4">-->
<!--                            <li>-->
<!--                                <a href="{" class="relative flex flex-col items-center">-->
<!--                                    <img class="w-5" src="" alt="Сравнить">-->
<!--                                    <span class="text-dark">Сравнить</span>-->

<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="" class="relative flex flex-col items-center">-->
<!--                                    <img class="w-5" src="" alt="Избранное">-->
<!--                                    <span class="text-dark">Избранное</span>-->

<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="" class="relative flex flex-col items-center">-->
<!--                                    <img class="w-5" src="" alt="Корзина">-->
<!--                                    <span class="text-dark">Корзина</span>-->

<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->

<!--                                <a class="flex flex-col items-center" href="">-->
<!--                                    <img class="w-5" src="" alt="Аккаунт">-->
<!--                                    <span>Аккаунт</span>-->
<!--                                </a>-->

<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </nav>-->

<!--        </header>-->

        <slot />
    </main>

    <footer>
        <MyFooter />
    </footer>



</template>

<style scoped>

</style>
