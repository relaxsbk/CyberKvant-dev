<script setup>

import Breadcrumb from "../../components/Breadcrumb.vue";
import CardProfile from "../../components/Profile/CardProfile.vue";

import PlaceOrders from "../../components/Profile/Order/PlaceOrders.vue";
import OrderCard from "../../components/Profile/Order/OrderCard.vue";
import NotFoundOrder from "../../components/Profile/Order/NotFoundOrder.vue";
</script>

<template>
    <section class="container mx-auto">
        <Breadcrumb class="mt-[30px] mb-[60px]"/>

        <section class="mb-auto flex justify-center">
            <CardProfile/>
        </section>

    </section>
    <PlaceOrders>
        <h2 class="text-3xl mb-[30px]">История заказов</h2>
<!--        <NotFoundOrder/>-->
        <OrderCard/>
        <OrderCard/>
    </PlaceOrders>
</template>

<style scoped>

</style>
