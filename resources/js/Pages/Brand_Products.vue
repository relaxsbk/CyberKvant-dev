<script setup>
import Breadcrumb from "@/components/Breadcrumb.vue";
import CategoryCard from "../components/CategoryCard.vue";

const props = defineProps({
    brand: Object,
    categories: Object
})

</script>

<template>
    <section class="container mx-auto mt-10 ">
        <Breadcrumb />
        <br>
        <h2 class="text-4xl text-center mb-[30px]">Бренд название {{props.brand.title}} </h2>

        <section>
            <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 py-1 mb-[30px]">
                <CategoryCard
                    v-for="category in props.categories"
                    :key="category.id"
                    :id="category.id"
                    :title="category.title"
                    :image="category.image"
                    :brand="props.brand.title"
                />
            </div>
            <p class="text-xl mb-[30px]">{{props.brand.description}}</p>
        </section>

    </section>
</template>

<style scoped>

</style>
