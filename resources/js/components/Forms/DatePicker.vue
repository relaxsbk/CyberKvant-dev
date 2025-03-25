<script setup>
import { ref, computed } from 'vue';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';

const rawDate = ref(null);

// Преобразуем дату в нужный формат
const formattedDate = computed({
    get: () => rawDate.value ? new Intl.DateTimeFormat('ru-RU').format(new Date(rawDate.value)) : '',
    set: (value) => rawDate.value = value // Устанавливаем значение при изменении
});
</script>

<template>
    <Datepicker
        v-model="formattedDate"
        :format="'dd.MM.yyyy'"
        :dark="true"
        :enable-time-picker="false"
        :clearable="false"
        :teleport="true"
        auto-apply
        locale="ru"
        placeholder="Дата рождения"
        class="py-2.5 px-0 w-full text-sm bg-transparent appearance-none text-white border-gray-600 focus:border-primary-purple ease-out transition focus:outline-none focus:ring-0 peer"
    />
</template>

<style>
.dp__theme_dark {
    --dp-background-color: #1E1E1E; /* Сделаем фон темно-серым */
    --dp-text-color: #fff;
    --dp-border-color: #4b5563;
    --dp-primary-color: #9333ea;
    --dp-border-color-hover:#9333ea;
    --dp-border-color-focus:#9333ea ;

        /* Исправляем прозрачность */
    --dp-menu-border-radius: 8px;
    --dp-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
}

/* Устанавливаем высший z-index и убираем прозрачность */
.dp__menu {
    background-color: #1E1E1E !important; /* Темно-серый фон */
    z-index: 9999 !important; /* Поднимаем над всеми элементами */
    border: 1px solid #9333ea !important; /* Фиолетовая граница */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5) !important; /* Улучшаем тень */
}

/* Исправляем проблему с тем, что элементы формы просвечиваются */
.dp__menu * {
    backdrop-filter: none !important; /* Убираем размытие, если есть */
}
</style>

