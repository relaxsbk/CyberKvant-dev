<script>
import {defineComponent} from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import AppHead from "@/AppHead/AppHead.vue";
import Slider from "@/components/Slider.vue";

export default defineComponent({
    components: {Slider, AppHead},
    layout: MainLayout,

})

</script>

<template>
    <AppHead title="CyberKvant"/>

    <section>
        <Slider />
    </section>

    <section>
        хиты продаж
    </section>
    <section>
       два банера
    </section>
    <section>
       Категории
    </section>
    <section>
       Бренд
    </section>


</template>

<style scoped>

</style>

