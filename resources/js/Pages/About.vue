<script setup>
import AppHead from "@/AppHead/AppHead.vue";
import Breadcrumb from "../components/Breadcrumb.vue";
</script>

<template>
    <AppHead title="О нас | Интернет-магазин бытовой и цифровой техники ГиперКвант" />

    <section class="container mx-auto">
        <Breadcrumb class="mt-8 mb-5">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">О нас</span>
                </div>
            </li>
        </Breadcrumb>

        <div class="bg-white dark:bg-[#1e1e1e] w-full p-6 rounded-2xl shadow-md mb-[30px]">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">О компании "ГиперКвант"</h1>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                Добро пожаловать в <strong>ГиперКвант</strong> — ваш надежный интернет-магазин бытовой и цифровой техники. Мы предлагаем широкий ассортимент техники для дома, офиса и отдыха от ведущих мировых брендов.
            </p>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                Наша миссия — сделать новейшие технологии доступными каждому. Мы тщательно отбираем продукцию, чтобы вы могли быть уверены в её качестве, надежности и актуальности.
            </p>
<!--           <div class="flex gap-5 justify-center mb-5">-->
<!--               <img-->
<!--                   src="https://mir-cdn.behance.net/v1/rendition/project_modules/1400/3873fb122851861.60e2c017b8b01.jpg"-->
<!--                   alt="Ассортимент бытовой и цифровой техники"-->
<!--                   class="w-1/2 h-auto rounded-xl mt-6  object-cover"-->
<!--               />-->
<!--               <img-->
<!--                   src="https://www.sostav.ru/images/news/2019/05/28/cxmo3nwy.jpg"-->
<!--                   alt="Ассортимент бытовой и цифровой техники"-->
<!--                   class="w-1/2 h-auto rounded-xl mt-6  object-cover"-->
<!--               />-->
<!--           </div>-->
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                В <strong>ГиперКвант</strong> вы найдете:
            </p>
            <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 mb-4">
                <li>бытовую технику: холодильники, стиральные машины, пылесосы и многое другое;</li>
                <li>цифровую технику: смартфоны, ноутбуки, планшеты, телевизоры;</li>
                <li>аксессуары и комплектующие от проверенных поставщиков.</li>
            </ul>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                Мы ценим каждого клиента и предлагаем комфортный сервис и квалифицированную поддержку.
            </p>
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                Спасибо, что выбираете <strong>ГиперКвант</strong>. Вместе мы делаем технологии ближе!
            </p>

        </div>
    </section>
</template>

<style scoped>
</style>
