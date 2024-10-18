<script setup>

import MyHeader from "@/components/MyHeader.vue";
import MyFooter from "@/components/MyFooter.vue";
</script>

<template>
    <section class="flex flex-col min-h-screen">
        <header >
            <MyHeader />
        </header>

        <main class="flex-grow mt-20">
            <slot />
        </main>

        <footer class="mt-auto z-10">
            <MyFooter />
        </footer>
    </section>
</template>

<style scoped>

</style>
