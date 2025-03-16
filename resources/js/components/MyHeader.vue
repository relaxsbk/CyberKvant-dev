<script setup>
import { ref } from 'vue';
import SearchForm from "@/components/Forms/SearchForm.vue";
import { Link } from '@inertiajs/vue3'

// Reactive state to control the mobile menu visibility
const isMenuOpen = ref(false);

// Toggle the mobile menu visibility
const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};
</script>

<template>
    <nav class="bg-[#1E1E1E] fixed w-full z-50">
        <div class="container mx-auto flex items-center justify-between py-4">
            <!-- Logo -->
            <Link href="/" class="flex-shrink-0 hidden xl:block">
                <img src="/resources/js/Pages/logo-name.svg%20fill.svg" alt="LogoMain" class="w-72 h-16" />
            </Link>
            <Link href="/" class="flex-shrink-0 visible block xl:hidden " >
                <img src="/resources/js/Pages/logo-mini.svg" alt="LogoMini" class="w-20 h-16" />
            </Link>

            <!-- Catalog Button for large screens -->
            <div class="text-[16px] ml-7 hidden lg:block">
                <Link
                    :href="$route('catalog')"
                    class="bg-primary-purple text-white px-4 py-3 rounded-[10px] flex items-center duration-200 active:bg-dark-purple hover:bg-secondary-purple/80"
                    :class="{'bg-dark-purple/80': $page.url === '/catalog'}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list mr-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    Каталог
                </Link>
            </div>

            <!-- Search bar -->
            <div class="w-full ml-7 2xl:mr-36 xl:mr-3 lg:mr-3 md:mr-auto hidden lg:block flex-grow">
                <SearchForm />
            </div>

            <!-- Links for large screens -->
            <ul class="hidden lg:flex space-x-6 items-center text-white">
                <li>
                    <a href="#" class="flex flex-col items-center hoverText">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                            <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z" fill="#9701FE"/>
                        </svg>
                        <span>Сравнить</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex flex-col items-center hoverText">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" fill="#9701FE" />
                        </svg>
                        <span >Избранное</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex flex-col items-center hoverText">
                        <svg width="22" height="22" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.810711C0 0.595697 0.0842863 0.38949 0.234317 0.237452C0.384347 0.0854141 0.587832 0 0.800007 0H3.20003C3.37848 4.99584e-05 3.55179 0.0605612 3.6924 0.171911C3.83301 0.283261 3.93285 0.439055 3.97604 0.614519L4.62404 3.24284H23.2002C23.3217 3.24288 23.4416 3.27097 23.5509 3.32497C23.6601 3.37898 23.7557 3.45749 23.8305 3.55455C23.9053 3.6516 23.9573 3.76465 23.9825 3.8851C24.0078 4.00556 24.0056 4.13026 23.9762 4.24975L21.5762 13.9783C21.533 14.1537 21.4332 14.3095 21.2926 14.4209C21.152 14.5322 20.9786 14.5928 20.8002 14.5928H6.40006C6.22161 14.5928 6.0483 14.5322 5.90768 14.4209C5.76707 14.3095 5.66724 14.1537 5.62405 13.9783L2.57602 1.62142H0.800007C0.587832 1.62142 0.384347 1.53601 0.234317 1.38397C0.0842863 1.23193 0 1.02573 0 0.810711ZM8.00007 17.8356C7.57572 17.8356 7.16875 18.0065 6.86869 18.3105C6.56863 18.6146 6.40006 19.027 6.40006 19.4571C6.40006 19.8871 6.56863 20.2995 6.86869 20.6036C7.16875 20.9077 7.57572 21.0785 8.00007 21.0785C8.42442 21.0785 8.83139 20.9077 9.13145 20.6036C9.43152 20.2995 9.60009 19.8871 9.60009 19.4571C9.60009 19.027 9.43152 18.6146 9.13145 18.3105C8.83139 18.0065 8.42442 17.8356 8.00007 17.8356ZM4.80004 19.4571C4.80004 18.597 5.13719 17.7722 5.73731 17.164C6.33743 16.5559 7.15137 16.2142 8.00007 16.2142C8.84877 16.2142 9.66271 16.5559 10.2628 17.164C10.863 17.7722 11.2001 18.597 11.2001 19.4571C11.2001 20.3171 10.863 21.142 10.2628 21.7501C9.66271 22.3583 8.84877 22.6999 8.00007 22.6999C7.15137 22.6999 6.33743 22.3583 5.73731 21.7501C5.13719 21.142 4.80004 20.3171 4.80004 19.4571ZM19.2002 17.8356C18.7758 17.8356 18.3689 18.0065 18.0688 18.3105C17.7687 18.6146 17.6002 19.027 17.6002 19.4571C17.6002 19.8871 17.7687 20.2995 18.0688 20.6036C18.3689 20.9077 18.7758 21.0785 19.2002 21.0785C19.6245 21.0785 20.0315 20.9077 20.3316 20.6036C20.6316 20.2995 20.8002 19.8871 20.8002 19.4571C20.8002 19.027 20.6316 18.6146 20.3316 18.3105C20.0315 18.0065 19.6245 17.8356 19.2002 17.8356ZM16.0001 19.4571C16.0001 18.597 16.3373 17.7722 16.9374 17.164C17.5375 16.5559 18.3515 16.2142 19.2002 16.2142C20.0489 16.2142 20.8628 16.5559 21.4629 17.164C22.0631 17.7722 22.4002 18.597 22.4002 19.4571C22.4002 20.3171 22.0631 21.142 21.4629 21.7501C20.8628 22.3583 20.0489 22.6999 19.2002 22.6999C18.3515 22.6999 17.5375 22.3583 16.9374 21.7501C16.3373 21.142 16.0001 20.3171 16.0001 19.4571Z" fill="#9701FE"/>
                        </svg>
                        <span>Корзина</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex flex-col items-center hoverText">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" fill="#9701FE"/>
                        </svg>
                        <span>Аккаунт</span>
                    </a>
                </li>
            </ul>

            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button @click="toggleMenu" class="text-gray-200 focus:outline-none">
                    <transition name="icon"
                                enter-active-class="transition ease-in-out  duration-150 opacity-0  "
                                leave-active-class="transition ease-in-out duration-150 opacity-0 "
                    >
                        <svg v-if="isMenuOpen" key="close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-lg " viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                        </svg>

                        <svg v-else key="menu"  class="w-6 h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </transition>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <transition name="MobileMenu"
                    enter-active-class="transition ease-linear  duration-150 opacity-0  "
                    leave-active-class="transition ease-linear duration-150 opacity-0 "
        >
            <div v-if="isMenuOpen" class="lg:hidden bg-[#1E1E1E] transition duration-100 ease-in-out">
                <div class="p-4">
                    <ul class="space-y-4 text-white">
                        <li class="flex flex-col items-center bg-[#9701FE] text-white px-4 py-3 rounded-[10px] ">
                            <a href="#" class="block">Каталог</a>
                        </li>
                        <li>
                            <a href="#" class="flex flex-col items-center hoverText">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                                    <path fill="#9701FE" d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                                </svg>
                                <span >Сравнить</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex flex-col items-center  hoverText">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill="#9701FE" fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                                <span >Избранное</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex flex-col items-center hoverText">
                                <svg width="22" height="22" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#9701FE" fill-rule="evenodd" clip-rule="evenodd" d="M0 0.810711C0 0.595697 0.0842863 0.38949 0.234317 0.237452C0.384347 0.0854141 0.587832 0 0.800007 0H3.20003C3.37848 4.99584e-05 3.55179 0.0605612 3.6924 0.171911C3.83301 0.283261 3.93285 0.439055 3.97604 0.614519L4.62404 3.24284H23.2002C23.3217 3.24288 23.4416 3.27097 23.5509 3.32497C23.6601 3.37898 23.7557 3.45749 23.8305 3.55455C23.9053 3.6516 23.9573 3.76465 23.9825 3.8851C24.0078 4.00556 24.0056 4.13026 23.9762 4.24975L21.5762 13.9783C21.533 14.1537 21.4332 14.3095 21.2926 14.4209C21.152 14.5322 20.9786 14.5928 20.8002 14.5928H6.40006C6.22161 14.5928 6.0483 14.5322 5.90768 14.4209C5.76707 14.3095 5.66724 14.1537 5.62405 13.9783L2.57602 1.62142H0.800007C0.587832 1.62142 0.384347 1.53601 0.234317 1.38397C0.0842863 1.23193 0 1.02573 0 0.810711ZM8.00007 17.8356C7.57572 17.8356 7.16875 18.0065 6.86869 18.3105C6.56863 18.6146 6.40006 19.027 6.40006 19.4571C6.40006 19.8871 6.56863 20.2995 6.86869 20.6036C7.16875 20.9077 7.57572 21.0785 8.00007 21.0785C8.42442 21.0785 8.83139 20.9077 9.13145 20.6036C9.43152 20.2995 9.60009 19.8871 9.60009 19.4571C9.60009 19.027 9.43152 18.6146 9.13145 18.3105C8.83139 18.0065 8.42442 17.8356 8.00007 17.8356ZM4.80004 19.4571C4.80004 18.597 5.13719 17.7722 5.73731 17.164C6.33743 16.5559 7.15137 16.2142 8.00007 16.2142C8.84877 16.2142 9.66271 16.5559 10.2628 17.164C10.863 17.7722 11.2001 18.597 11.2001 19.4571C11.2001 20.3171 10.863 21.142 10.2628 21.7501C9.66271 22.3583 8.84877 22.6999 8.00007 22.6999C7.15137 22.6999 6.33743 22.3583 5.73731 21.7501C5.13719 21.142 4.80004 20.3171 4.80004 19.4571ZM19.2002 17.8356C18.7758 17.8356 18.3689 18.0065 18.0688 18.3105C17.7687 18.6146 17.6002 19.027 17.6002 19.4571C17.6002 19.8871 17.7687 20.2995 18.0688 20.6036C18.3689 20.9077 18.7758 21.0785 19.2002 21.0785C19.6245 21.0785 20.0315 20.9077 20.3316 20.6036C20.6316 20.2995 20.8002 19.8871 20.8002 19.4571C20.8002 19.027 20.6316 18.6146 20.3316 18.3105C20.0315 18.0065 19.6245 17.8356 19.2002 17.8356ZM16.0001 19.4571C16.0001 18.597 16.3373 17.7722 16.9374 17.164C17.5375 16.5559 18.3515 16.2142 19.2002 16.2142C20.0489 16.2142 20.8628 16.5559 21.4629 17.164C22.0631 17.7722 22.4002 18.597 22.4002 19.4571C22.4002 20.3171 22.0631 21.142 21.4629 21.7501C20.8628 22.3583 20.0489 22.6999 19.2002 22.6999C18.3515 22.6999 17.5375 22.3583 16.9374 21.7501C16.3373 21.142 16.0001 20.3171 16.0001 19.4571Z" />
                                </svg>
                                <span >Корзина</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex flex-col items-center hoverText">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path fill="#9701FE" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                                <span >Аккаунт</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Search bar for mobile -->
                    <div class="mt-4">
                       <SearchForm />
                    </div>
                </div>
            </div>
        </transition>
    </nav>
</template>

<style scoped>
/* You can add any additional styling here if needed */
</style>
