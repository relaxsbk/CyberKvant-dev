<script setup>
import Breadcrumb from "../components/Breadcrumb.vue";
import AppHead from "../AppHead/AppHead.vue";
import CartItem from "../components/Basket/CartItem.vue";
import CartSummary from "../components/Basket/CartSummary.vue";
import {router} from "@inertiajs/vue3";
import {ref} from "vue";

const props = defineProps({
    cart: Array,
});

const cart = ref(props.cart);

const removeAll = () => {
    router.post(route('cart.removeAll'), {
        // product_id: props.product.id,
        // quantity: 1
    }, {
        preserveScroll: true,
        onSuccess: () => {
            cart.value = [];
            console.log('Корзина очищена');
        }
    });
};

const removeItem = (productId) => {
    router.delete(route('cart.remove', productId), {
        // data:
        data: {
            product_id: productId,
        },
        preserveScroll: true,
        onSuccess: () => {
            cart.value = cart.value.filter(item => item.id !== productId);
            console.log('Товар удалён из корзины');
        },
    });
};


// Обновление количества
const updateQuantity = ({ id, quantity }) => {
    const product = cart.value.find((item) => item.id === id);
    if (product && quantity >= 1) {
        product.quantity = quantity;
    }
};


const click = () => {
    console.log('da')
}
// будущее взаимодействие с удалением сессии
</script>

<template>
    <AppHead title="Корзина | Интернет-магазин бытовой и цифровой техники ГиперКвант"/>
    <section class="container mx-auto mt-10">
        <Breadcrumb class="mt-8 mb-5">
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Корзина</span>
                </div>
            </li>
        </Breadcrumb>

        <br>
        <h2 class="text-3xl mb-[30px] flex gap-3 items-center">
            Корзина <span v-if="cart?.length > 0">( {{cart?.length}} )</span>
            <span v-if="cart?.length > 0"   @click="removeAll" class="text-[18px] text-secondary-purple cursor-pointer hover:text-white-purple duration-200">
                очистить
            </span>
        </h2>

        <div v-if="cart?.length > 0" class="grid lg:grid-cols-3 gap-6" >
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
            <CartSummary :cart="cart"  @clearCart="cart = []" />
        </div>
        <div v-else>
            Товаров в корзине нет...
        </div>
    </section>
</template>
<style scoped>

</style>
