<script setup>
import { ref, watch, nextTick } from 'vue';
import { IMaskDirective } from 'vue-imask';  // Импортируем директиву

const model = ref('');

const onInput = (event) => {
    nextTick(() => {
        // Принудительно обновляем значение, чтобы маска применялась
        model.value = event.target.value;
    });
};

// Следим за изменениями модели, чтобы поддерживать корректную синхронизацию
watch(model, (newValue) => {
    if (newValue.length > 17) {
        model.value = newValue.slice(0, 17);  // Ограничиваем длину модели до 17 символов
    }
});
</script>

<template>
    <input
        v-mask="'+7 (000) 000-0000'"
        class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-primary-purple ease-out transition focus:outline-none focus:ring-0 peer"
        placeholder=" "
        v-model="model"
        @input="onInput"
        @change="onInput"
        maxlength="17"
        autocomplete="off"
    />
</template>
