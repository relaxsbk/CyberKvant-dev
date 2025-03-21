<script setup>

import DrawerHead from "./DrawerHead.vue";
import {useForm, Link} from "@inertiajs/vue3";
import InputLabel from "../Forms/InputLabel.vue";
import GroupInputLabel from "../Forms/GroupInputLabel.vue";
import TextInput from "../Forms/TextInput.vue";
import FormButton from "../Forms/FormButton.vue";
import {inject, ref, watchEffect} from "vue";

const { closeDrawer } = inject('drawerActions')

const isOpen = ref(false);


watchEffect(() => {
    isOpen.value = true;
});

const form = useForm({
    email: '',
    password: '',
})
</script>

<template>
    <div
        @click="closeDrawer"
        class="fixed w-full h-full top-0 left-0 z-40 bg-black transition-opacity duration-300 ease-out"
        :class="{ 'opacity-80': isOpen, 'opacity-0': !isOpen }"
    ></div>
    <div
        class="fixed top-0 right-0 z-50 h-full p-4 overflow-y-auto  w-96 bg-[#1E1E1E] transform transition-transform duration-300 ease-out"
        :class="{ 'translate-x-0': isOpen, 'translate-x-full': !isOpen }"
    >
        <DrawerHead/>
        <form>
            <GroupInputLabel class="mb-6">

                <TextInput
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                />
                <InputLabel
                    class=""
                    for="email"
                    value="Адрес электронной почты"
                />
            </GroupInputLabel>
            <GroupInputLabel class="">
                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                />
                <InputLabel
                    for="password"
                    value="Пароль"
                />
            </GroupInputLabel>
            <FormButton value="Войти"/>
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

</style>
