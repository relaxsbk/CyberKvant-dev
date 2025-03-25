<script setup>

import MyHeader from "@/components/MyHeader.vue";
import MyFooter from "@/components/MyFooter.vue";
import Drawer from "../components/Drawer/Drawer.vue";
import {provide, ref} from "vue";
import ToastAlert from "../components/Alerts/ToastAlert.vue";

const drawerOpen = ref(false)

const openDrawer = () => {
    drawerOpen.value = true
}

const closeDrawer = () => {
    drawerOpen.value = false
}

provide('drawerActions', {
    openDrawer,
    closeDrawer
})

</script>

<template>
    <Drawer v-if="drawerOpen"/>
    <section class="flex flex-col min-h-screen">
        <header >
            <MyHeader @open-drawer="openDrawer" />
        </header>

        <main class="flex-grow mt-20">
            <slot />
        </main>

        <footer class="mt-auto z-10 bg-black">
            <MyFooter />
        </footer>
        <ToastAlert :errors="$page.props.errors" />
    </section>
</template>

<style scoped>

</style>
