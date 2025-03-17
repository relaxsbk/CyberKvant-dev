<script setup>
import Breadcrumb from "../components/Breadcrumb.vue";
import AppHead from "../AppHead/AppHead.vue";
import CartItem from "../components/Basket/CartItem.vue";
import CartSummary from "../components/Basket/CartSummary.vue";

const cart = [
    { id: 1, name: "iPhone 15 128 ГБ", price: 50000, quantity: 1, image: "/images/iphone15.png" },
    { id: 2, name: "MacBook Air M2", price: 75000, quantity: 1, image: "/images/macbook.png" },
    { id: 3, name: "AirPods Pro 2", price: 20000, quantity: 1, image: "/images/airpods.png" },
];

// Обновление количества
const updateQuantity = ({ id, quantity }) => {
    const product = cart.value.find((item) => item.id === id);
    if (product) {
        product.quantity = quantity;
    }
};

// Удаление товара
const removeItem = (id) => {
    cart.value = cart.value.filter((item) => item.id !== id);
};

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
            Корзина (3)
            <span  @click="click" class="text-[18px] text-secondary-purple cursor-pointer hover:text-white-purple duration-200">
                очистить
            </span>
        </h2>
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Товары -->
            <div class="lg:col-span-2 space-y-4">
                <CartItem
                    v-for="item in cart"
                    :key="item.id"
                    :item="item"
                    @updateQuantity="updateQuantity"
                    @removeItem="removeItem"
                />
            </div>

            <!-- Итоговый блок -->
            <CartSummary />
        </div>
    </section>
</template>
<style scoped>

</style>
