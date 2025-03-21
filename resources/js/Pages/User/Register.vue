<script setup>
import { ref } from "vue";
import TextInput from "../../components/Forms/TextInput.vue";
import {useForm, Link} from "@inertiajs/vue3";
import InputLabel from "../../components/Forms/InputLabel.vue";
import GroupInputLabel from "../../components/Forms/GroupInputLabel.vue";
import Breadcrumb from "../../components/Breadcrumb.vue";
import FormButton from "../../components/Forms/FormButton.vue";



const form = useForm({
    firstName: '',
    lastName: '',
    email: '',
    dob: '',
    phone: '',
    password: '',
    password_confirm: '',
});


const isFocused = ref(false);

</script>

<template>
    <section class="container mx-auto">

        <Breadcrumb class="mt-[40px]"/>

        <div class="py-8 mx-auto xs:h-screen lg:py-0 mb-[-100px]">
            <div class="flex w-full items-center justify-between">
                <div class="xs:hidden md:block w-[50rem] ">
                    <img class="h-full scale-x-[-1]" src="https://english-time.org/storage/uploads/a1tp733ANqkuRvAUxhLVsrJlQ71hSdmnsTIAD6Il.png" alt="da">
                </div>
                <div class="w-full rounded-lg shadow  md:mt-0 xs:max-w-md xl:p-0 bg-[#1E1E1E] ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl text-center font-bold leading-tight tracking-tight md:text-2xl text-white">
                            Регистрация
                        </h1>

                        <form class="max-w-md mx-auto">
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <GroupInputLabel>
                                    <TextInput
                                        id="firstName"
                                        type="text"
                                        v-model="form.firstName"
                                        required
                                    />
                                    <InputLabel
                                        for="firstName"
                                        value="Имя"
                                    />
                                </GroupInputLabel>

                                <GroupInputLabel>
                                    <TextInput
                                        id="lastName"
                                        type="text"
                                        v-model="form.lastName"
                                        required
                                    />
                                    <InputLabel
                                        for="lastName"
                                        value="Фамилия"
                                    />
                                </GroupInputLabel>
                            </div>

                            <GroupInputLabel>

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

                            <GroupInputLabel>

                                <TextInput
                                    datepicker
                                    id="date"
                                    type="text"
                                    v-model="form.dob"
                                    required

                                />
                                <InputLabel
                                    for="date"
                                    value="Дата рождения"
                                />
                            </GroupInputLabel>

                            <GroupInputLabel>
                            <span class="absolute start-0 bottom-2 text-gray-500 dark:text-gray-400">
                                <span v-if="isFocused">
                                    +7
                                </span>
                                <svg v-else class="w-4 h-4 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                                </svg>
                            </span>
                                <TextInput
                                    id="phone"
                                    type="text"
                                    v-model="form.phone"
                                    required
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                    class="block py-2.5 pb-2.5 ps-6 pe-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none " pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                />
                                <InputLabel
                                    for="phone"
                                    value="Номер телефона"
                                    class="absolute text-sm  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:start-6 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto"
                                />
                            </GroupInputLabel>

                            <GroupInputLabel>
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

                            <GroupInputLabel>
                                <TextInput
                                    id="password_confirm"
                                    type="password"
                                    v-model="form.password_confirm"
                                    required
                                />
                                <InputLabel
                                    for="password_confirm"
                                    value="Подтверждение пароля"
                                />
                            </GroupInputLabel>
                            <FormButton
                                value="Зарегистрироваться"
                            />
                        </form>
                        <p class="text-center text-sm">
                            Есть аккаунт?
                            <Link class="text-secondary-purple">
                                Войти
                            </Link>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>

<style scoped>

</style>
