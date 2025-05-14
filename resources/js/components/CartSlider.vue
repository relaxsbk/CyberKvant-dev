<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";
import Card from "@/components/Card.vue";
import { Navigation } from "swiper/modules";
import { ref} from "vue";

const swiperInstance = ref(null);
const isBeginning = ref(true);
const isEnd = ref(false);
const prevButton = ref(null);
const nextButton = ref(null);

defineProps({
    products: {
        type: Array,
        required: true
    },
    cartProductIds: {
        type: Array,
    }

});

// Функция обновления состояния кнопок
const updateButtonsState = () => {
    if (swiperInstance.value) {
        isBeginning.value = swiperInstance.value.isBeginning;
        isEnd.value = swiperInstance.value.isEnd;
    }
};

// Инициализация Swiper и привязка кнопок
const onSwiperInit = (swiper) => {
    swiperInstance.value = swiper;
    swiper.navigation.init();
    swiper.navigation.update();

    updateButtonsState();
    swiper.on('slideChange', updateButtonsState);
    swiper.on('reachEnd', updateButtonsState);
    swiper.on('reachBeginning', updateButtonsState);
};
</script>

<template>
    <div class="relative">
        <!-- Кастомные кнопки -->
        <button ref="prevButton"
                class="custom-prev absolute left-0 top-1/2 transform -translate-y-1/2"
                :class="{ 'disabled': isBeginning }"
                :disabled="isBeginning">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                 class="icon duration-200 ease-in transition-colors hover:fill-primary-purple"
                 viewBox="0 0 16 16">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
            </svg>
        </button>
        <button ref="nextButton"
                class="custom-next absolute right-0 top-1/2 transform -translate-y-1/2"
                :class="{ 'disabled': isEnd }"
                :disabled="isEnd">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                 class="icon duration-200 ease-in transition-colors hover:fill-primary-purple"
                 viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
            </svg>
        </button>

        <swiper
            :modules="[Navigation]"
            :slides-per-view="5"
            :space-between="12"
            :navigation="{
                nextEl: nextButton,
                prevEl: prevButton
            }"
            :breakpoints="{
                320: { slidesPerView: 1, spaceBetween: 6 },
                640: { slidesPerView: 2, spaceBetween: 6 },
                768: { slidesPerView: 2, spaceBetween: 6 },
                1024: { slidesPerView: 3, spaceBetween: 12 },
                1280: { slidesPerView: 4, spaceBetween: 12 },
                1536: { slidesPerView: 5, spaceBetween: 12 },
            }"
            class="mySwiper"
            @swiper="onSwiperInit"
        >
            <swiper-slide v-for="(product, index) in products" :key="index">
                <Card :product="product" :cart-product-ids="cartProductIds" />
            </swiper-slide>
        </swiper>
    </div>
</template>

<style scoped>
.mySwiper {
    width: 100%;
}


.custom-prev,
.custom-next {
    background: none;
    padding: 10px;
    border: none;
    cursor: pointer;
    z-index: 10;
}


.icon {
    fill: gray;
}


.custom-prev:hover .icon,
.custom-next:hover .icon {
    fill: #9701FE;
}


.custom-prev.disabled .icon,
.custom-next.disabled .icon {
    opacity: 0.5;
    fill: lightgray;
    cursor: not-allowed;
}
</style>
