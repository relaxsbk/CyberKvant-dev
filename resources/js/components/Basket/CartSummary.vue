<script setup>
import {computed, ref} from 'vue';
import {router} from "@inertiajs/vue3";

const props = defineProps({
    cart: Array,
});

const emit = defineEmits(['clearCart']);

const totalPrice = computed(() => {
    return props.cart.reduce((sum, item) => {
        return sum + item.price * item.quantity;
    }, 0);
});

const placeOrder = () => {
    if (!isChecked.value) return;

    router.post(route('orders.store'), {
        cart: props.cart,
        total: totalPrice.value
    }, {
        onSuccess: () => {
            emit('clearCart');
        }
    });
};

const isChecked = ref(false);
</script>

<template>
    <div class="p-6 h-min bg-white rounded-lg text-black">
        <h3 class="text-2xl mb-4 font-bold">Итого</h3>
        <div class="mb-5 flex flex-row justify-between items-center">
            <p class="text-[14px] text-gray-500">Товаров на сумму</p>
            <p class="font-bold text-[20px]">{{ totalPrice }} ₽</p>
        </div>
        <hr class="mb-5">
        <div class="mb-3 flex flex-row justify-between items-center">
            <p class="text-xl font-bold">К оплате </p>
            <p class="font-bold text-2xl">{{ totalPrice }} ₽</p>
        </div>

        <!-- Чекбокс согласия -->
        <div class="mt-4 flex items-start gap-x-2">
            <input type="checkbox" id="agree" v-model="isChecked" class="mt-1 rounded text-primary-purple focus:ring-0">
            <label for="agree" class="text-sm text-gray-700">
                Я согласен с условиями использования<br>
                пользовательского соглашения
            </label>
        </div>

        <!-- Кнопка оформления -->
        <button
            @click="placeOrder"
            class="mt-4 w-full text-white bg-primary-purple py-2 rounded-lg transition-opacity duration-200"
            :class="{ 'opacity-50 cursor-not-allowed': !isChecked }"
            :disabled="!isChecked"
        >
            Оформить заказ
        </button>
    </div>
</template>
