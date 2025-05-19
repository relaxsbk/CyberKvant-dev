<script setup>
import {router, useForm, Link} from "@inertiajs/vue3";
import {computed} from "vue";

const props = defineProps({
    product: Object,
    cartProductIds:{
        type: Array
    },
    favoriteProductIds:{
        type: Array
    },
    compareProductIds:{
        type: Array
    }

})


const isInCart = computed(() => props.cartProductIds.includes(props.product.id));
const isInFavorite = computed(() => props.favoriteProductIds.includes(props.product.id));
const isInCompare = computed(() => props.compareProductIds.includes(props.product.id));

const form = useForm({
    product_id: props.product.id,
    quantity: 1
})

const addToCart = () => {
    form.post(route('cart.add'), {
        preserveScroll: true,
        onSuccess: () => {
        }
    });
}

const addToFavorite = () => {
    router.post(route('favorites.add'), {
        product_id: props.product.id,
    }, {
        preserveScroll: true,
        onSuccess: () => {
        }
    });
};

const addToCompare = () => {
    router.post(route('compare.add'), {
        product_id: props.product.id,
    }, {
        preserveScroll: true,
        onSuccess: () => {
        }
    });
};



const removeItem = (productId) => {
    router.delete(route('favorites.remove', productId), {
        data: {
            product_id: productId,
        },
        preserveScroll: true,
        onSuccess: () => {
        },
    });
};

const removeItemCompare = (productId) => {
    router.delete(route('compare.remove', productId), {
        data: {
            product_id: productId,
        },
        preserveScroll: true,
        onSuccess: () => {
        },
    });
};
</script>

<template>
    <!-- Правая часть с основной информацией -->
    <div class="bg-white-purple/85 text-black w-full p-6 rounded-[10px] lg:w-9/12 shadow-md">
        <div class="flex justify-between gap-4 mb-[10px]">
<!--            <h1 class="text-4xl font-bold mb-4">Смартфон Apple iPhone 16 128 ГБ чёрный </h1>-->
            <h1 class="text-4xl font-bold mb-4">{{props.product.title}}</h1>
            <div class="bg-white p-1.5 h-14 w-auto rounded-[10px] overflow-x-auto flex-shrink-0 xs:hidden sm:block">
                <img :src="props.product.brand" class="object-cover w-full h-full"
                     alt="brands">
            </div>
        </div>
        <div class="bg-white rounded-[10px] px-3 py-1.5 mb-[30px] w-fit flex justify-start gap-4">
            <div class="flex justify-center items-center text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>

                                    {{props.product.rating}}
            </div>
            <div class="flex justify-center items-center text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                    <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                </svg>

                                    {{props.product.reviewsCount}}
            </div>
            <div class="flex justify-center items-center text-md text-gray-600">
                В наличии: {{props.product.quantity}} шт.
            </div>
        </div>
        <div class="flex gap-4 mb-[30px] items-center">
            <div class="text-xl text-center font-medium bg-white w-fit rounded-[10px] py-1.5 px-4 text-dark flex-shrink-0">
                {{props.product.price}} ₽
            </div>
            <div v-if="isInCompare" @click="removeItemCompare(props.product.id)" class="text-xl text-center font-semibold bg-white w-fit rounded-[10px] py-2.5 px-4 text-dark-purple flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                    <path fill="#9701FE" class=" duration-200  transition-colors hover:fill-secondary-purple cursor-pointer" d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                </svg>
            </div>
            <div v-else @click="addToCompare" class="text-xl text-center font-semibold bg-white w-fit rounded-[10px] py-2.5 px-4 text-dark-purple flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-bar-chart duration-200 ease-in transition-colors hover:fill-primary-purple cursor-pointer" viewBox="0 0 16 16">
                    <path d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z"/>
                </svg>
            </div>
            <div v-if="isInFavorite" @click="removeItem(props.product.id)" class="text-xl text-center font-semibold bg-white w-fit rounded-[10px] py-2.5 px-4 text-dark-purple flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill " viewBox="0 0 16 16">
                    <path class=" duration-200  transition-colors hover:fill-secondary-purple cursor-pointer" fill="#9701FE" fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                </svg>
            </div>
            <div v-else @click="addToFavorite"  class="text-xl text-center font-semibold bg-white w-fit rounded-[10px] py-2.5 px-4 text-dark-purple flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-heart  duration-200 ease-in transition-colors hover:fill-primary-purple cursor-pointer" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                </svg>
            </div>

            <Link v-if="isInCart" :href="$route('basket')" class="text-xl text-center font-semibold bg-primary-purple text-white rounded-[10px] py-1.5 duration-300 hover:bg-dark-purple flex-grow">
                В корзине
            </Link>
            <button v-else @click="addToCart" :class="{'opacity-25': form.processing}" :disabled="form.processing" class="text-xl text-center font-semibold bg-primary-purple text-white rounded-[10px] py-1.5 duration-300 hover:bg-dark-purple flex-grow">
                Купить
            </button>

        </div>


        <div class="flex flex-col justify-between gap-40">
            <div class="py-4 mb-[15px]">
                <h2 class="text-xl font-bold mb-4">О товаре</h2>
                <div class="space-y-2">
                    <div v-if="props.product.short_characteristic !== null"
                        v-for="(item, index) in props.product.short_characteristic"
                        :key="index"
                        class="flex items-baseline"
                    >
                        <span class="text-gray-700 mr-3">{{ item.name }}</span>
                        <span class="flex-grow border-t border-dashed border-gray-400/50"></span>
                        <span class="text-gray-900 text-right ml-3">{{ item.value }}</span>
                    </div>
                    <div v-else>
                        Характеристик пока нет
                    </div>
                </div>
            </div>




            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bottom-0">

                <div class=" mb-3">
                    <h3 class="text-lg font-bold flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-current" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                        </svg>
                        Оплата
                    </h3>
                    <p class="text-gray-700 text-clip">
                        Принимаем к оплате как наличный,
                        так и безналичный расчёт. Возможна
                        оплата электронными кошельками.
                    </p>
                </div>
                <div class=" mb-3">
                    <h3 class="text-lg font-bold flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-current" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                        </svg>
                        Доставка
                    </h3>
                    <p class="text-gray-700 text-clip">
                        Доставим по всей России в течение
                        нескольких дней. Стоимость доставки
                        в свой город уточняйте у менеджера.
                    </p>
                </div>
            </div>
        </div>


    </div>
</template>

<style scoped>

</style>
