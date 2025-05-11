<script setup>
import CategoryCard from "@/components/CategoryCard.vue";
import AppHead from "@/AppHead/AppHead.vue";
import Breadcrumb from "../components/Breadcrumb.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    'catalog': {
        type: Object,
        required: true
    },
    'categories': Array
})
</script>

<template>
    <AppHead :title="catalog.title + ' ' + 'Купить в интернет-магазине ГиперКвант'"/>
    <section class="container mx-auto  mb-[30px]">
          <Breadcrumb class="mt-8 mb-5">
              <li>
                  <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <Link :href="$route('catalog')" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white duration-200">Каталог</Link>
                  </div>
              </li>
              <li aria-current="page">
                  <div class="flex items-center">
                      <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                      </svg>
                      <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Категории {{catalog.title}}</span>
                  </div>
              </li>
          </Breadcrumb>
        <h1 class="text-3xl mb-[30px]">{{catalog.title}}</h1>
        <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 py-1">
            <CategoryCard
                v-for="category in categories"
                :key="category.id"
                :id="category.id"
                :slug="category.slug"
                :title="category.title"
                :image=null
            />

        </div>


        <p class="mt-[30px]">
            {{catalog.description}}
        </p>
    </section>
</template>

<style scoped>

</style>
