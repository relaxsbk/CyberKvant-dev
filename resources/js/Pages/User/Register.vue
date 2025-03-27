<script setup>
import {inject, ref} from 'vue';
import {useForm} from "@inertiajs/vue3";
import InputLabel from "../../components/Forms/InputLabel.vue";
import GroupInputLabel from "../../components/Forms/GroupInputLabel.vue";
import Breadcrumb from "../../components/Breadcrumb.vue";
import FormButton from "../../components/Forms/FormButton.vue";
import DatePicker from "../../components/Forms/DatePicker.vue";
import TextInput from "../../components/Forms/TextInput.vue";
import NumberInput from "../../components/Forms/NumberInput.vue";
import InputError from "../../components/Forms/InputError.vue";
import ToastAlertError from "../../components/Alerts/ToastAlertError.vue";

const {openDrawer} = inject('drawerActions')

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
    form.post(route('register.store'), {
        onSuccess: () => {
            form.reset('firstName', 'lastName', 'email', 'dob', 'phone', 'password', 'password_confirmation');
        },
        onError: (errors) => {

        },
    });
};

const isFocused = ref(false);
</script>

<template>
    <section class="container mx-auto">
        <Breadcrumb class="mt-[40px]" />

        <ToastAlertError :errors="$page.props.errors" :message="'Исправьте ошибки в форме'"/>

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
                                        :class="{'border-red-600': form.errors.firstName}"
                                    />
                                    <InputLabel
                                        for="firstName"
                                        value="Имя"
                                        :class="{'text-red-600': form.errors.firstName}"
                                    />
                                    <InputError
                                        :message="form.errors.firstName"
                                        class="mt-2"
                                    />
                                </GroupInputLabel>

                                <GroupInputLabel>
                                    <TextInput
                                        id="lastName"
                                        type="text"
                                        v-model="form.lastName"
                                        :class="{'border-red-600': form.errors.lastName}"
                                    />
                                    <InputLabel
                                        for="lastName"
                                        value="Фамилия"
                                        :class="{'text-red-600': form.errors.lastName}"
                                    />
                                    <InputError
                                        :message="form.errors.lastName"
                                        class="mt-2"
                                    />
                                </GroupInputLabel>
                            </div>

                            <GroupInputLabel>
                                <TextInput
                                    id="email"
                                    type="email"
                                    v-model="form.email"
                                    :class="{'border-red-600': form.errors.email}"
                                />
                                <InputLabel
                                    for="email"
                                    value="Адрес электронной почты"
                                    :class="{'text-red-600': form.errors.email}"
                                />
                                <InputError
                                    :message="form.errors.email"
                                    class="mt-2"
                                />
                            </GroupInputLabel>

                            <GroupInputLabel class="mb-0">
                                <DatePicker
                                    v-model="form.dob"
                                    :class="{'border-red-600': form.errors.dob}"
                                />
                                <InputError
                                    :message="form.errors.dob"
                                    class="mt-2"
                                />
                            </GroupInputLabel>

                            <GroupInputLabel>
                                <NumberInput
                                    id="phone"
                                    type="text"
                                    v-model="form.phone"
                                    :class="{'border-red-600': form.errors.phone}"
                                    readonly="readonly"
                                    onfocus="this.removeAttribute('readonly');"
                                />
                                <InputLabel
                                    for="phone"
                                    value="Номер телефона"
                                    :class="{'text-red-600': form.errors.phone}"
                                />
                                <InputError
                                    :message="form.errors.phone"
                                    class="mt-2"
                                />
                            </GroupInputLabel>

                            <GroupInputLabel>
                                <TextInput
                                    id="password"
                                    type="password"
                                    v-model="form.password"
                                    :class="{'border-red-600': form.errors.password}"
                                />
                                <InputLabel
                                    for="password"
                                    value="Пароль"
                                    :class="{'text-red-600': form.errors.password}"
                                />
                                <InputError
                                    :message="form.errors.password"
                                    class="mt-2"
                                />
                            </GroupInputLabel>

                            <GroupInputLabel>
                                <TextInput
                                    id="password_confirmation"
                                    type="password"
                                    v-model="form.password_confirmation"
                                    :class="{'border-red-600': form.errors.password_confirmation}"
                                />
                                <InputLabel
                                    for="password_confirmation"
                                    value="Подтверждение пароля"
                                    :class="{'text-red-600': form.errors.password_confirmation}"
                                />
                                <InputError :message="form.errors.password_confirmation" class="mt-2"/>

                            </GroupInputLabel>

                            <FormButton :class="{'opacity-25': form.processing}" :disabled="form.processing" value="Зарегистрироваться" />
                        </form>
                        <p
                            class="text-center text-sm"
                        >
                            Есть аккаунт?
                            <span
                                @click="openDrawer"
                                class="text-secondary-purple cursor-pointer duration-200 hover:text-primary-purple"
                            >
                                Войти
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

