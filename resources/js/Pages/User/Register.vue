<script setup>
import TextInput from "../../components/Forms/TextInput.vue";
import {useForm} from "@inertiajs/vue3";
import InputLabel from "../../components/Forms/InputLabel.vue";
import GroupInputLabel from "../../components/Forms/GroupInputLabel.vue";



const form = useForm({
    firstName: '',
    lastName: '',
    surname: '',
    dob: '',
    phone: '',
    email: '',
    password: '',
    password_confirm: '',
});


</script>

<template>
    <section class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div class="w-full rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 bg-[#1E1E1E] ">
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

<!--                            TODO: что-то придумать с +7 и иконкой-->
                            <span class="absolute start-0 bottom-2 text-gray-500 dark:text-gray-400">
                                +7
                            </span>
                            <TextInput
                                id="phone"
                                type="text"
                                v-model="form.phone"
                                required
                                class="block py-2.5 pb-2.5 ps-6 pe-0 w-full text-sm bg-transparent border-0 border-b-2  appearance-none " pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                            />
                            <InputLabel
                                for="phone"
                                value="Номер телефона"
                                class="absolute text-sm  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:start-6 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto"
                            />
                        </GroupInputLabel>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
