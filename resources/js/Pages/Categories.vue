<script setup>

import Category from "@/components/Category.vue";
</script>

<template>
    <section class="container mx-auto mt-12 mb-[30px]">
        <h1 class="text-3xl mb-[30px]">SLUG SLUG</h1>
        <div class="h-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 py-1">
            <Category />
            <Category />
            <Category />

        </div>
    </section>
</template>

<style scoped>

</style>
