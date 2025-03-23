<script setup>

import {Link} from '@inertiajs/vue3'
</script>

<template>
    <section class="container mx-auto py-6 flex text-primary-purple xs:justify-center xs:space-y-6  xs:flex-wrap lg:flex-nowrap lg:justify-between  lg:space-y-0 border-b border-gray-600">
        <div class=" xs:w-screen lg:w-auto ">
            <h5 class="text-center">Контактные данные</h5>
            <p class="text-[24px] text-white text-center">8 (888) 888-88-88</p>
            <p class="text-[24px] text-white text-center">+7 (777) 777-77-77</p>
        </div>
        <div class="flex flex-col space-y-3 xs:w-screen xs:text-center lg:text-start lg:w-auto">
<!--            Пример как делать активные ссылки по точному совпадению ЮРЛ-->
            <Link :href="$route('about')" class="hoverText" :class="{'text-secondary-purple': $page.url === '/about'}" >О нас</Link>
            <Link :href="$route('catalog')" class="hoverText" :class="{'text-secondary-purple': $page.url === '/catalog'}">Каталог товаров</Link>
            <Link class="hoverText">Гарантия и возврат</Link>
        </div>
        <div class="flex flex-col space-y-3 xs:w-screen xs:text-center lg:text-start lg:w-auto">
            <Link class="hoverText">FAQ</Link>
            <Link class="hoverText">Служба поддержки</Link>
            <Link class="hoverText">Доставка и оплата</Link>
        </div>
        <div class="flex flex-col justify-center items-center pt-4">


            <div class="flex justify-center h-[30px]">
                <img src="/resources/images/static/footer/mir.svg" alt="mir">
            </div>
            <div class="flex justify-center space-x-3 ">
                <img class="w-[40px] h-auto" src="/resources/images/static/footer/VK_Circled.png" alt="VK">
                <img class="w-[40px] h-auto" src="/resources/images/static/footer/tg.svg" alt="Telegram">
                <img class="w-[40px] h-auto" src="/resources/images/static/footer/wp.svg" alt="WhatsApp">
            </div>

        </div>

    </section>
    <div class="container mx-auto xs:w-screen lg:w-auto py-4 xs:px-4 sm:px-0">
        <span class="text-gray-600">© ГиперКвант, 2025 г.</span>
    </div>
</template>

<style scoped>

</style>
