<script setup>
import { ref, watch, nextTick } from 'vue';
import { IMaskDirective } from 'vue-imask';

const model = ref('');

const onInput = (event) => {
    nextTick(() => {
        model.value = event.target.value;
    });
};
</script>

<template>
    <input
        v-mask="'+7 (000) 000-0000'"
        autocomplete="off"
        class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-white border-gray-600 focus:border-primary-purple ease-out transition focus:outline-none focus:ring-0 peer"
        placeholder=" "
        v-model="model"
        @input="onInput"
        maxlength="17"
    />
</template>
