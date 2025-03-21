<script setup>

import FormButton from "../Forms/FormButton.vue";
</script>

<template>
    <div class="w-fit  rounded-lg shadow-sm bg-[#1E1E1E] border-gray-700">
        <div class="font-medium text-center  rounded-t-lg border-b border-[#373737] text-gray-400 bg-[#1E1E1E] " id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <h1 class="text-3xl text-white mb-2">Профиль</h1>
        </div>
        <div class="flex justify-between gap-24 p-6 ">
            <div class="text-lg flex flex-col gap-5">
                <p>
                    Добро пожаловать в свой профиль
                    <span class="text-secondary-purple">
                    Пожидаев Павел
                </span>
                    !
                </p>
                <p>
                    Email:
                    <span class="text-secondary-purple">
                    pah4n1989@yandex.ru
                </span>

                </p>
                <p>
                    Номер телефона:
                    <span class="text-secondary-purple">
                    +7 (852) 654-85-87
                </span>

                </p>
                <FormButton class="w-4/6" value="Редактировать профиль"/>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="#ca7ffe" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
