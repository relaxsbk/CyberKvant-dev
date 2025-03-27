<script setup>

import MyHeader from "@/components/MyHeader.vue";
import MyFooter from "@/components/MyFooter.vue";
import Drawer from "../components/Drawer/Drawer.vue";
import {provide, ref} from "vue";
import ToastAlertSuccess from "../components/Alerts/ToastAlertSuccess.vue";
import ToastAlertError from "../components/Alerts/ToastAlertError.vue";

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
    <ToastAlertError
        :errors="$page.props.errors"
        :message="'Исправьте ошибки в форме'"
    />
    <ToastAlertSuccess
        :success="$page.props.flash.success"
        :message="$page.props.flash.success"
    />
    <section class="flex flex-col min-h-screen">
        <header >
            <MyHeader @open-drawer="openDrawer" />
        </header>

<!--        <div v-if="$page.props.flash.success" class="bg-green-500 w-32 h-32">-->
<!--            <p class="text-2xl text-black">{{$page.props.flash.success}}</p>-->
<!--        </div>-->

        <main class="flex-grow mt-20">
            <slot />
        </main>

        <footer class="mt-auto z-10 bg-black">
            <MyFooter />
        </footer>

    </section>
</template>

<style scoped>

</style>
