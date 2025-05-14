<script>
import {defineComponent} from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import AppHead from "@/AppHead/AppHead.vue";
import Slider from "@/components/Slider.vue";
// import Category from "@/components/Category.vue";
import Brand from "@/Brand/Brand.vue";
import Card from "@/components/Card.vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";
import CartSlider from "@/components/CartSlider.vue";
import CategoryCard from "@/components/CategoryCard.vue";
import {Link} from "@inertiajs/vue3";


export default defineComponent({
    components: {CategoryCard, CartSlider, Card, Brand, Slider, AppHead, Swiper, SwiperSlide, Link},
    layout: MainLayout,
    props: {
        'categories': Array,
        'products': Array,
        'brands': Array,
        'cartProductIds': Array
    }

})

</script>

<template>
    <AppHead title="Интернет-магазин бытовой и цифровой техники ГиперКвант"/>

    <section>
        <Slider />

        <section class=" bg-[#1E1E1E] rounded-t-[40px] py-[30px] px-12 mt-[-40px] w-full relative z-10">
            <div class="container mx-auto mb-[30px]">
                <div class="flex justify-between items-center mb-[30px]">
                    <h2 class="xs:text-xl sm:text-2xl">Хиты продаж</h2>
                </div>

                <CartSlider
                    :products="products"
                    :cart-product-ids="cartProductIds"
                />
            </div>

            <div class="container mx-auto flex  xs:flex-wrap xs:space-y-6 lg:flex-nowrap lg:justify-between mb-[30px] lg:space-y-0 lg:space-x-6">
                <div class=" rounded-[10px] w-full h-auto ">
                    <img class="w-full flex-shrink-0" src="/resources/images/static/advertisement/Реклама%201png.png" alt="advertisement">
                </div>
                <div class=" rounded-[10px] w-full h-auto ">
                    <img class="w-full flex-shrink-0" src="/resources/images/static/advertisement/реклама2.png" alt="advertisement">
                </div>
            </div>
            <div class="container mx-auto mb-[30px]">
                <div class="flex justify-between items-center mb-[30px]">
                    <h2 class="xs:text-xl sm:text-2xl">Популярные категории</h2>
                </div>

                <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 py-1">
                    <CategoryCard
                        v-for="category in categories"
                        :key="category.id"
                        :id="category.id"
                        :slug="category.slug"
                        :title="category.title"
                        :image="category.image"
                    />
<!--                    <Category />-->
<!--                    <Category />-->
<!--                    <Category />-->
<!--                    <Category />-->
<!--                    <Category />-->
<!--                    <Category />-->
<!--                    <Category />-->
<!--                    <Category />-->
<!--                    <Category />-->
<!--                    <Category />-->
<!--                    <Category />-->

                </div>

            </div>
            <div class="container mx-auto">
                <div class="flex justify-between items-center mb-[14px]">
                    <h2 class="xs:text-xl sm:text-2xl">Популярные бренды</h2>
                    <Link :href="$route('brands')" class="text-[16px] text-white-purple duration-200 ease-linear hover:text-secondary-purple ">Показать все</Link>
                </div>
                <div class="h-auto grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 py-4">
                    <Brand
                        v-for="brand in brands"
                        :key="brand.id"
                        :id="brand.id"
                        :slug="brand.slug"
                        :title="brand.title"
                        :image="brand.image"
                    />

                </div>
            </div>
        </section>



    </section>




</template>

<style scoped>

</style>

