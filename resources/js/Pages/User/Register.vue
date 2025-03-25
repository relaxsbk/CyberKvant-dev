<script setup>
import { ref } from 'vue';
// import PhoneInput from "../../components/Forms/PhoneInput.vue"; // импорт компонента
import { useForm, Link } from "@inertiajs/vue3";
import InputLabel from "../../components/Forms/InputLabel.vue";
import GroupInputLabel from "../../components/Forms/GroupInputLabel.vue";
import Breadcrumb from "../../components/Breadcrumb.vue";
import FormButton from "../../components/Forms/FormButton.vue";
import DatePicker from "../../components/Forms/DatePicker.vue";
import AlertError from "../../components/Alerts/AlertError.vue";
import TextInput from "../../components/Forms/TextInput.vue";
import NumberInput from "../../components/Forms/NumberInput.vue";

const form = useForm({
    firstName: '',
    lastName: '',
    email: '',
    dob: null,
    phone: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register.store'));
};

const isFocused = ref(false);
</script>

<template>
    <section class="container mx-auto">
        <Breadcrumb class="mt-[40px]" />
        <div class="py-8 mx-auto xs:h-screen lg:py-0 mb-[-100px]">
            <div class="flex w-full items-center justify-between">
                <div class="xs:hidden md:block w-[50rem]">
                    <img class="h-full scale-x-[-1]" src="https://english-time.org/storage/uploads/a1tp733ANqkuRvAUxhLVsrJlQ71hSdmnsTIAD6Il.png" alt="da" />
                </div>
                <div class="w-full rounded-lg shadow md:mt-0 xs:max-w-md xl:p-0 bg-[#1E1E1E]">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl text-center font-bold leading-tight tracking-tight md:text-2xl text-white">Регистрация</h1>

                        <form @submit.prevent="submit" class="max-w-md mx-auto">
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <GroupInputLabel>
                                    <TextInput
                                        id="firstName"
                                        type="text"
                                        v-model="form.firstName"
                                        required
                                    />
                                    <InputLabel for="firstName" value="Имя" />
                                </GroupInputLabel>

                                <GroupInputLabel>
                                    <TextInput
                                        id="lastName"
                                        type="text"
                                        v-model="form.lastName"
                                        required
                                    />
                                    <InputLabel for="lastName" value="Фамилия" />
                                </GroupInputLabel>
                            </div>

                            <GroupInputLabel>
                                <TextInput
                                    id="email"
                                    type="email"
                                    v-model="form.email"
                                    required
                                />
                                <InputLabel for="email" value="Адрес электронной почты" />
                            </GroupInputLabel>
                            <GroupInputLabel class="mb-0">
                                <DatePicker class="" v-model="form.dob" />
                            </GroupInputLabel>

                            <GroupInputLabel>
                                <NumberInput
                                    id="phone"
                                    type="text"
                                    v-model="form.phone"
                                    required
                                />
                                <InputLabel for="phone" value="Номер телефона" />
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

                            <GroupInputLabel>
                                <TextInput
                                    id="password_confirmation"
                                    type="password"
                                    v-model="form.password_confirmation"
                                    required
                                />
                                <InputLabel for="password_confirmation" value="Подтверждение пароля" />
                            </GroupInputLabel>
                            <FormButton value="Зарегистрироваться" />
                        </form>
                        <p class="text-center text-sm">
                            Есть аккаунт?
                            <Link class="text-secondary-purple">Войти</Link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
