<script setup>
import Category from "@/components/Category.vue";

defineProps({
    'catalog': {
        type: Object,
        required: true
    },
    'categories': Array
})
</script>

<template>
    <section class="container mx-auto mt-12 mb-[30px]">
        <h1 class="text-3xl mb-[30px]">{{catalog.title}}</h1>
        <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 py-1">
            <Category
                v-for="category in categories"
                :key="category.id"
                :title="category.title"
                :image=null
            />

        </div>
<!--        потом удалить-->
        <span class="text-[12px] text-gray-400">Тут описание каталога</span>

        <p class="mt-[30px]">
            {{catalog.description}}
        </p>
    </section>
</template>

<style scoped>

</style>
