<script>
import {defineComponent} from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import AppHead from "@/AppHead/AppHead.vue";
import Slider from "@/components/Slider.vue";

export default defineComponent({
    components: {Slider, AppHead},
    layout: MainLayout,

})

</script>

<template>
    <AppHead title="CyberKvant"/>

    <section>
        <Slider />

        <section class=" bg-[#1E1E1E] rounded-t-[40px] py-[30px] px-12 mt-[-40px] w-full relative z-10">
            <div class="container mx-auto mb-[30px]">
                <h2 class="text-2xl mb-[30px]">Хиты продаж</h2>
                <div class="bg-purple-600 h-[620px]">
                    Товары список
                </div>
            </div>

            <div class="container mx-auto flex  xs:flex-wrap xs:space-y-6 lg:flex-nowrap lg:justify-between mb-[30px] lg:space-y-0 lg:space-x-6">
                <div class="bg-purple-600 rounded-[10px] w-full h-[227px] ">реклама 1</div>
                <div class="bg-purple-600 rounded-[10px] w-full h-[227px]">реклама 2</div>
            </div>
            <div class="container mx-auto mb-[30px]">
                <h2 class="text-2xl mb-[30px]">Популярные категории</h2>
                <div class="bg-purple-600 h-[516px]">
                    Список категорий
                </div>
            </div>
            <div class="container mx-auto">
                <h2 class="text-2xl mb-[30px]">Популярные бренды</h2>
                <div class="bg-purple-600 h-[70px]">
                    Список брендов
                </div>
            </div>
        </section>



    </section>




</template>

<style scoped>

</style>

