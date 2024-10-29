<script setup>

import {Swiper, SwiperSlide} from "swiper/vue";
import "swiper/swiper-bundle.css";
import Card from "@/components/Card.vue";
import {Navigation} from "swiper/modules";

const products = [
    { id: 1, name: "Product 1", category: "Category 1", price: "100 000", rating: "4.53",  reviews: "5", labels: ["Новинка"], imageUrl: "" },
    { id: 2, name: "Product 2", category: "Category 2", price: "150 000", rating: "4.02", reviews: "5", labels: ["Акция"], imageUrl: "" },
    { id: 3, name: "Product 3", category: "Category 3", price: "200 000", rating: "5.0", reviews: "5", labels: ["Новинка", "Акция"], imageUrl: "" },
    { id: 4, name: "Product 4", category: "Category 4", price: "250 000", rating: "3.5", reviews: "5", labels: ["Акция"], imageUrl: "" },
    { id: 5, name: "Product 5", category: "Category 5", price: "300 000", rating: "4.8", reviews: "5", labels: ["Новинка"], imageUrl: "" },
    { id: 6, name: "Product 5", category: "Category 5", price: "300 000", rating: "4.8", reviews: "5", labels: ["Новинка"], imageUrl: "" },
    { id: 7, name: "Product 5", category: "Category 5", price: "300 000", rating: "4.8", reviews: "5", labels: ["Новинка"], imageUrl: "" },
    // Добавьте больше элементов по мере необходимости
];
</script>

<template>
    <div class="">
        <swiper
            :modules="[Navigation]"
            :slides-per-view="5"
            :space-between="12"
            navigation
            :breakpoints="{
                430: { slidesPerView: 1, spaceBetween: 6 },
                640: { slidesPerView: 2, spaceBetween: 6 },
                768: { slidesPerView: 2, spaceBetween: 6 },
                1024: { slidesPerView: 3, spaceBetween: 12 },
                1280: { slidesPerView: 4, spaceBetween: 12 },
                1536: { slidesPerView: 5, spaceBetween: 12 },
            }"
            class="mySwiper"
        >
            <swiper-slide v-for="(product, index) in products" :key="index">
                <Card :product="product" />
            </swiper-slide>
        </swiper>
    </div>
</template>

<style scoped>

.mySwiper {
    width: 100%;
}
</style>
