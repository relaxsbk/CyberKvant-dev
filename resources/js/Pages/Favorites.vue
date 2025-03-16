<script setup>
import Breadcrumb from "../components/Breadcrumb.vue";
import AppHead from "../AppHead/AppHead.vue";
import Card from "../components/Card.vue";

const products = [
    {id:'id', title:'title'},
    {id:'id', title:'title'},
    {id:'id', title:'title'},
    {id:'id', title:'title'},
    {id:'id', title:'title'},
];

const click = () => {
    console.log('da')
}
// будущее взаимодействие с удалением сессии
</script>

<template>
    <AppHead title="Избранное | Интернет-магазин бытовой и цифровой техники ГиперКвант"/>
    <section class="container mx-auto mt-10">
        <Breadcrumb />
        <br>
        <h2 class="text-3xl mb-[30px] flex gap-3 items-center">
            Избранное (3)
            <span  @click="click" class="text-[18px] text-secondary-purple cursor-pointer hover:text-white-purple duration-200">
                очистить
            </span>
        </h2>
        <div class="flex flex-row flex-wrap gap-2">
            <div v-for="product in products" >
                <div class="w-[300px]">
                    <Card :product="product" />
                </div>
            </div>
        </div>


    </section>
</template>
<style scoped>

</style>
