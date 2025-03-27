<script setup>
import { ref, defineExpose, onMounted } from "vue";
import { useForm, usePage } from "@inertiajs/vue3";
import Modal from "../Modal/Modal.vue";
import TextInput from "../Forms/TextInput.vue";
import GroupInputLabel from "../Forms/GroupInputLabel.vue";
import InputLabel from "../Forms/InputLabel.vue";
import InputError from "../Forms/InputError.vue";
import DatePicker from "../Forms/DatePicker.vue";
import FormButton from "../Forms/FormButton.vue";

const isModalOpen = ref(false);

const open = () => {
    isModalOpen.value = true;
};
const close = () => {
    isModalOpen.value = false;
};

// Делаем методы доступными извне
defineExpose({ open, close });

const page = usePage();

const form = useForm({
    firstName: "",
    lastName: "",
    email: "",
    dob: "",
    // phone: "",
});

onMounted(() => {
    const user = page.props.auth.user;
    if (user) {
        form.firstName = user.firstName || "";
        form.lastName = user.lastName || "";
        form.email = user.email || "";
        form.dob = user.dob || "";
        // form.phone = user.phone || "";
    }
});

const submit = () => {
    form.patch(route("profile.update"), {
        onSuccess: () => {
            close();
        },
    });
};
</script>

<template>
    <Modal v-model="isModalOpen">
        <h2 class="text-lg font-semibold text-center mb-4">Редактирование профиля</h2>
        <form @submit.prevent="submit" class="max-w-md mx-auto">
            <div class="grid md:grid-cols-2 md:gap-6">
                <GroupInputLabel>
                    <TextInput id="firstName" type="text" v-model="form.firstName" />
                    <InputLabel for="firstName" value="Имя" />
                    <InputError :message="form.errors.firstName" />
                </GroupInputLabel>

                <GroupInputLabel>
                    <TextInput id="lastName" type="text" v-model="form.lastName" />
                    <InputLabel for="lastName" value="Фамилия" />
                    <InputError :message="form.errors.lastName" />
                </GroupInputLabel>
            </div>

            <GroupInputLabel>
                <TextInput id="email" type="email" v-model="form.email" />
                <InputLabel for="email" value="Адрес электронной почты" />
                <InputError :message="form.errors.email" />
            </GroupInputLabel>

            <GroupInputLabel>
                <DatePicker v-model="form.dob" />
                <InputError :message="form.errors.dob" />
            </GroupInputLabel>
<!--            <GroupInputLabel>-->
<!--                <NumberInput-->
<!--                    id="phone"-->
<!--                    type="text"-->
<!--                    v-model="form.phone"-->
<!--                    :class="{'border-red-600': form.errors.phone}"-->

<!--                />-->
<!--                <InputLabel-->
<!--                    for="phone"-->
<!--                    value="Номер телефона"-->
<!--                    :class="{'text-red-600': form.errors.phone}"-->
<!--                />-->
<!--                <InputError-->
<!--                    :message="form.errors.phone"-->
<!--                    class="mt-2"-->
<!--                />-->
<!--            </GroupInputLabel>-->

            <FormButton value="Редактировать" :disabled="form.processing" />
        </form>
    </Modal>
</template>
