<script>
import {defineComponent} from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import AppHead from "@/AppHead/AppHead.vue";

export default defineComponent({
    components: {AppHead},
    layout: MainLayout,

})

</script>

<template>
    <AppHead title="CyberKvant"/>

    <h1 class="text-3xl font-bold ">Home page</h1>
</template>

<style scoped>

</style>

