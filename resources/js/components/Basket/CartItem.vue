<script setup>

const props = defineProps(["item"]);
const emit = defineEmits(["updateQuantity", "removeItem"]);

// Функция для изменения количества
const changeQuantity = (amount) => {
    const newQuantity = props.item.quantity + amount;
    if (newQuantity >= 1) {
        emit("updateQuantity", { id: props.item.id, quantity: newQuantity });
    }
};
</script>

<template>
    <div class="flex items-center justify-between p-4 bg-white rounded-lg">
        <!-- Изображение товара -->
        <img
            src="/resources/images/static/Category/1_758129.png"
            :alt="item.name"
            class="w-32 h-32 object-cover rounded-lg"
        />

        <!-- Название и управление количеством -->
        <div class="flex-1 flex justify-between items-center px-4">
            <h3 class="text-black text-lg">{{ item.name }}</h3>
            <div class="flex items-center mt-2">
                <button
                    @click="changeQuantity(-1)"
                    class="text-xl px-2 py-1 text-black  rounded-md"
                >
                    -
                </button>
                <span class="mx-3 text-black ">{{ item.quantity }}</span>
                <button
                    @click="changeQuantity(1)"
                    class="text-xl px-2 py-1 rounded-md text-black"
                >
                    +
                </button>
            </div>
        </div>

        <!-- Цена -->
        <div class="text-black  text-lg mt-2">
            {{ item.price * item.quantity }} ₽
        </div>

        <!-- Кнопка удаления -->
        <button @click="emit('removeItem', item.id)" class="ml-4 mt-2 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>
        </button>
    </div>
</template>
