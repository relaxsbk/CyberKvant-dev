<script setup>
import Accordion from "@/components/Accordion.vue";
import {computed, ref, watch} from "vue";
import Modal from "../Modal/Modal.vue";
import GroupInputLabel from "../Forms/GroupInputLabel.vue";
import TextInput from "../Forms/TextInput.vue";
import InputLabel from "../Forms/InputLabel.vue";
import InputError from "../Forms/InputError.vue";
import FormButton from "../Forms/FormButton.vue";
import {useForm} from "@inertiajs/vue3";
import TextAreaInput from "../Forms/TextAreaInput.vue";
import Select from "../Forms/Select.vue";

const props = defineProps({
    product:{type: Object},
    reviews: { type: Array, default: () => [] },
    characteristic: { type: Array },
    authUser: { type: Object, default: null }
});



const showModal = ref(false);

const close = () => {
    showModal.value = false
}

const sections = computed(() => [
    {
        title: "Характеристики",
        content: props.characteristic
    },
    {
        title: "Отзывы",
        content: props.reviews

    }
]);

const form = useForm({
    rating: '',
    text: '',

});



const submit = () => {

    form.post(route('products.reviews.store', props.product ), {
        onSuccess: () => {
            form.reset('rating', 'area');
            close()
        },
        onError: () => {}
    });
};


</script>

<template>
    <section class="bg-[#1E1E1E] rounded-t-[40px] py-[30px] sm:px-12 mt-[-40px] w-full relative z-10">
        <div class="container mx-auto">

            <!-- Аккордион -->
            <Accordion
                :sections="sections"
                :auth-user="props.authUser"
                @open-review-modal="showModal = true"
            />

            <Modal v-model="showModal">
                <!-- Тут размести форму отзыва -->
                <h2 class="text-white text-xl mb-4">Оставить отзыв</h2>
                <form @submit.prevent="submit" class="max-w-md mx-auto">

                    <GroupInputLabel>
                        <label class="mb-5">
                            Выберите оценку
                        </label>
                        <Select v-model="form.rating"/>

                    </GroupInputLabel>

                    <GroupInputLabel>
                        <label class="mb-5">
                            Введите текст отзыва
                        </label>
                        <TextAreaInput v-model="form.text"/>


                        <InputError
                            :message="form.errors.text"
                            class="mt-2"
                        />
                    </GroupInputLabel>


                    <FormButton :class="{'opacity-25': form.processing}" :disabled="form.processing" value="Отправить" />
                </form>

            </Modal>
        </div>
    </section>
</template>

<style scoped>
</style>
