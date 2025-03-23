<script setup>
import DrawerHead from "./DrawerHead.vue";
import { useForm, Link } from "@inertiajs/vue3";
import InputLabel from "../Forms/InputLabel.vue";
import GroupInputLabel from "../Forms/GroupInputLabel.vue";
import TextInput from "../Forms/TextInput.vue";
import FormButton from "../Forms/FormButton.vue";
import {inject, ref, onMounted, provide} from "vue";

// Получаем функцию закрытия из провайдера
const { closeDrawer: externalCloseDrawer } = inject('drawerActions');

// Длительность анимации в мс
const animationSpeed = 300;

// Два состояния для анимации:
// isVisible управляет наличием компонента в DOM (v-show)
// isOpen отвечает за CSS-анимацию (сдвиг и прозрачность)
const isVisible = ref(false);
const isOpen = ref(false);

// Функция открытия: сначала отображаем компонент, потом запускаем анимацию
const open = () => {
    isVisible.value = true;
    // Небольшая задержка, чтобы Vue успел применить стили
    setTimeout(() => {
        isOpen.value = true;
    }, 10);
};

// Функция закрытия: сначала запускаем анимацию закрытия, а затем скрываем компонент
const close = () => {
    isOpen.value = false;
    setTimeout(() => {
        isVisible.value = false;
        externalCloseDrawer();
    }, animationSpeed);
};

onMounted(() => {
    open();
});


// Пример использования useForm, если он вам нужен для формы
const form = useForm({
    email: '',
    password: '',
    remember: '',
});
</script>

<template>
    <!-- Overlay с затемнением фона -->
    <div
        @click="close"
        class="fixed w-full h-full top-0 left-0 z-40 bg-black transition-opacity"
        :style="{ transitionDuration: animationSpeed + 'ms' }"
        :class="{ 'opacity-80': isOpen, 'opacity-0': !isOpen }"
        v-show="isVisible"
    ></div>

    <!-- Контент дравера -->
    <div
        class="fixed top-0 right-0 z-50 h-full p-4 overflow-y-auto w-96 bg-[#1E1E1E] transform transition-transform"
        :style="{ transitionDuration: animationSpeed + 'ms' }"
        :class="{ 'translate-x-0': isOpen, 'translate-x-full': !isOpen }"
        v-show="isVisible"
    >
        <DrawerHead @close-drawer="close"/>
        <form>
            <GroupInputLabel class="mb-6">
                <TextInput
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                />
                <InputLabel for="email" value="Адрес электронной почты" />
            </GroupInputLabel>
            <GroupInputLabel>
                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                />
                <InputLabel for="password" value="Пароль" />
            </GroupInputLabel>
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <input
                        id="remember"
                        type="checkbox"
                        v-model="form.remember"
                        class="mb-2 cursor-pointer text-primary-purple  rounded focus:ring-purple-600  ring-offset-gray-800 focus:ring-2 bg-gray-600 border-gray-600"
                    />
                    <label class="mb-2">Запомнить меня</label>
                </div>
                <Link class="text-gray-500 hoverText duration-200 ease-out">
                    Забыли пароль?
                </Link>
            </div>
            <FormButton value="Войти" />
        </form>
        <p class="text-center flex justify-center gap-2 mt-5">
            Нет аккаунта?
            <Link class="text-secondary-purple hover:text-primary-purple duration-200 ease-out">
                Зарегистрироваться
            </Link>
        </p>
    </div>
</template>

<style scoped>
/* При необходимости добавьте дополнительные стили */
</style>
