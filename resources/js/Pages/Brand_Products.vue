<script setup>
import Breadcrumb from "@/components/Breadcrumb.vue";
import CartSlider from "@/components/CartSlider.vue";
import BrandCartSlider from "@/components/BrandCartSlider.vue";
import AccordionFilters from "@/components/AccordionFilters.vue";
import ProductGrid from "@/components/ProductGrid.vue";
import Card from "@/components/Card.vue";
import {Link} from "@inertiajs/vue3";

const products = [
    {
      title: 'test',
    },
    {
      title: 'test',
    },
    {
      title: 'test',
    },
    {
      title: 'test',
    },
    {
      title: 'test',
    },
    {
      title: 'test',
    },
    {
      title: 'test',
    },

]
</script>

<template>
    <section class="container mx-auto mt-10 ">
        <Breadcrumb />
        <br>
        <h2 class="text-4xl text-center">Бренд название </h2>

        <section class=" w-full h-auto flex gap-4 py-3">

            <div class="w-80 ">
<!--                <h2 class="text-white text-lg py-4 ">Каталог</h2>-->
<!--                <p>В аккордеоне будут категории</p>-->
                <AccordionFilters />
            </div>
            <div class=" flex-1 py-4">
                <div v-for="category in 3">
                    <div class="flex justify-between items-center mb-[14px]">
                        <h2 class="xs:text-xl sm:text-2xl">Название категории</h2>
                        <Link  class="text-[16px] text-white-purple duration-200 ease-linear hover:text-secondary-purple ">Показать все</Link>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-[15px]">
                        <Card
                            v-for="product in 4"
                            :product=product
                        />
                    </div>
                </div>

                <p>Текст описания бренда</p>
            </div>
        </section>
    </section>
</template>

<style scoped>

</style>
