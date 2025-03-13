<script setup>
import Breadcrumb from "@/components/Breadcrumb.vue";
import CategoryCard from "../components/CategoryCard.vue";

defineProps({
    products: Array,
    brand: Object,
})

const categories = [
    {id: 1, title: "da", image:null},
    {id: 2, title: "da", image:null},
    {id: 3, title: "da", image:null},
    {id: 4, title: "da", image:null},
    {id: 4, title: "da", image:null},


]

</script>

<template>
    <section class="container mx-auto mt-10 ">
        <Breadcrumb />
        <br>
        <h2 class="text-4xl text-center mb-[30px]">Бренд название {{brand.title}} </h2>

        <section>
            <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 py-1 mb-[30px]">
                <CategoryCard
                    v-for="category in categories"
                    :key="category.id"
                    :id="category.id"
                    :title="category.title"
                    :image="category.image"
                />
            </div>
            <p>{{brand.description}}</p>
        </section>

<!--        <section class=" w-full h-auto flex gap-4 py-3">-->

<!--            <div class="w-80 ">-->
<!--&lt;!&ndash;                <h2 class="text-white text-lg py-4 ">Каталог</h2>&ndash;&gt;-->
<!--&lt;!&ndash;                <p>В аккордеоне будут категории</p>&ndash;&gt;-->

<!--&lt;!&ndash;                <Accordion />&ndash;&gt;-->
<!--            </div>-->
<!--            <div class=" flex-1 py-4">-->
<!--                <div v-for="category in 4">-->
<!--                    <div class="flex justify-between items-center mb-[14px]">-->
<!--                        <h2 class="xs:text-xl sm:text-2xl">Название категории {{category.title}}</h2>-->
<!--                        <Link  class="text-[16px] text-white-purple duration-200 ease-linear hover:text-secondary-purple ">Показать все</Link>-->
<!--                    </div>-->
<!--                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-[15px]">-->
<!--                        <Card-->
<!--                            v-for="product in products"-->
<!--                            :product=product-->
<!--                        />-->
<!--                    </div>-->
<!--                </div>-->

<!--                <p>{{brand.description}}</p>-->
<!--            </div>-->
<!--        </section>-->
    </section>
</template>

<style scoped>

</style>
