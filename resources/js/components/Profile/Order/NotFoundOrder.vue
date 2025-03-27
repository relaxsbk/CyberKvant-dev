<script setup>

import {Link} from "@inertiajs/vue3";
</script>

<template>
    <div class="flex flex-col gap-5 mb-3 items-center">
        <p class="text-2xl">К сожалению у вас ещё не было заказов </p>
        <Link :href="$route('catalog')" class="w-56 mt-4 text-sm text-center text-white bg-primary-purple py-2 rounded-lg  duration-200 hover:bg-dark-purple/80">
            Перейти в каталог
        </Link>
    </div>
</template>

<style scoped>

</style>
