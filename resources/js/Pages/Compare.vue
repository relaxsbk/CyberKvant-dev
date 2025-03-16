<script setup>
import Breadcrumb from "../components/Breadcrumb.vue";
import AppHead from "../AppHead/AppHead.vue";

const click = () => {
    console.log('da')
}
// будущее взаимодействие с удалением сессии
</script>

<template>
    <AppHead title="Корзина | Интернет-магазин бытовой и цифровой техники ГиперКвант"/>
    <section class="container mx-auto mt-10">
        <Breadcrumb />
        <br>
        <h2 class="text-3xl mb-[30px] flex gap-3 items-center">
            Сравнить (3)
            <span  @click="click" class="text-[18px] text-secondary-purple cursor-pointer hover:text-white-purple duration-200">
                очистить
            </span>
        </h2>
        <div class="h-auto grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 py-4">

        </div>
    </section>
</template>
<style scoped>

</style>
