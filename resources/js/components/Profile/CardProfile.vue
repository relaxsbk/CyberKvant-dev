<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import UpdateProfileModal from "./UpdateProfileModal.vue";

const modalRef = ref(null);

const formatPhone = (phone) => {
    if (!phone) return '';

    const cleanPhone = phone.replace(/\D/g, "");

    if (cleanPhone.length === 10) {
        return `+7 (${cleanPhone.slice(0, 3)}) ${cleanPhone.slice(3, 6)}-${cleanPhone.slice(6, 8)}-${cleanPhone.slice(8, 10)}`;
    }
    return phone;
};

const openModal = () => {
    modalRef.value?.open();
};
</script>

<template>
    <UpdateProfileModal ref="modalRef"/>
    <div class="w-fit  rounded-lg shadow-sm bg-[#1E1E1E] border-gray-700">
        <div class="font-medium text-center  rounded-t-lg border-b border-[#373737] text-gray-400 bg-[#1E1E1E] " id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <h1 class="text-3xl text-white mb-2">Профиль</h1>
        </div>
        <div class="flex justify-between gap-24 p-6 ">
            <div class="text-lg flex flex-col gap-5">
                <p>
                    Добро пожаловать в свой профиль
                    <span class="text-secondary-purple">
                        {{$page.props.auth.user.firstName}}
                        {{$page.props.auth.user.lastName}}
                    </span>
                    !
                </p>
                <p>
                    Email:
                    <span class="text-secondary-purple">
                        {{$page.props.auth.user.email}}
                    </span>
                </p>
                <p>
                    Номер телефона:
                    <span class="text-secondary-purple">
                        <!-- Применяем форматирование телефона -->
                        {{ formatPhone($page.props.auth.user.phone) }}
                    </span>
                </p>
                <div class="flex gap-3">
                    <button @click="openModal()" class="w-3/6 bg-primary-purple text-sm text-center text-white py-2 rounded-lg  duration-200 hover:bg-dark-purple/80">
                        Редактировать профиль
                    </button>
                    <Link :href="$route('logout')" class="w-3/6 bg-gray-700/50 hover:bg-red-700/60  text-sm text-center text-white py-2 rounded-lg  duration-200">Выйти</Link>
                </div>
                <Link v-if="$page.props.auth.user.role === 'admin'" :href="$route('logout')" class="w-full bg-primary-purple hover:bg-dark-purple text-sm text-center text-white py-2 rounded-lg  duration-200">Вход в административную панель</Link>
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
