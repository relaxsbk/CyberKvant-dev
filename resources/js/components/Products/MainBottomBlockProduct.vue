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
<!--                        <select v-model="form.rating" class="py-2.5 px-3 w-full mt-3 text-sm rounded border-none bg-[#2B2D2D] focus:border-primary-purple ease-out transition focus:outline-none focus:ring-0 peer">-->
<!--                            <option value="5" class="bg-[#1e1e1e]/70">5</option>-->
<!--                            <option value="4" class="bg-[#1e1e1e]/70">4</option>-->
<!--                            <option value="3" class="bg-[#1e1e1e]/70">3</option>-->
<!--                            <option value="2" class="bg-[#1e1e1e]/70">2</option>-->
<!--                            <option value="1" class="bg-[#1e1e1e]/70">1</option>-->



<!--                        </select>-->
                    </GroupInputLabel>

                    <GroupInputLabel>
                        <label class="mb-5">
                            Введите текст отзыва
                        </label>
                        <TextAreaInput v-model="form.text"/>
<!--                        <textarea-->
<!--                            v-model="form.area"-->
<!--                            rows="12"-->
<!--                            class="py-2.5 px-3 w-full text-sm rounded border-none mt-3 bg-[#2B2D2D] focus:border-primary-purple ease-out transition focus:outline-none focus:ring-0 peer"-->

<!--                        ></textarea>-->

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
