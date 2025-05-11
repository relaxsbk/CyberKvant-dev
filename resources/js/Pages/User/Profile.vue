<script setup>

import Breadcrumb from "../../components/Breadcrumb.vue";
import CardProfile from "../../components/Profile/CardProfile.vue";

import PlaceOrders from "../../components/Profile/Order/PlaceOrders.vue";
import OrderCard from "../../components/Profile/Order/OrderCard.vue";
import NotFoundOrder from "../../components/Profile/Order/NotFoundOrder.vue";
import ToastAlertError from "../../components/Alerts/ToastAlertError.vue";

const props = defineProps({
    orders: Array
})


</script>

<template>
    <section class="container mx-auto">
        <Breadcrumb class="mt-[30px] mb-[60px]">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Профиль </span>
                </div>
            </li>
        </Breadcrumb>

        <ToastAlertError :errors="$page.props.errors" :message="'Исправьте ошибки в форме'"/>
        <section class="mb-auto flex justify-center">
            <CardProfile/>
        </section>

    </section>
    <PlaceOrders>
        <h2 class="text-3xl mb-[30px]">История заказов</h2>
        <div v-if="props.orders.length">
            <OrderCard />
<!--            в теге написать for-->
        </div>
        <NotFoundOrder v-else/>
    </PlaceOrders>
</template>

<style scoped>

</style>
