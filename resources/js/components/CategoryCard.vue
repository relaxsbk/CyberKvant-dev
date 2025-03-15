<script setup>
import {Link} from "@inertiajs/vue3";
import { computed } from 'vue';

const props = defineProps({
    id: Number,
    key: Number,
    title: String,
    image: String,
    brand: {
        type: String,
        default: null
    }
})

const categoryLink = computed(() => {
    let params = { category: props.id };
    if (props.brand) {
        params['brands[]'] = props.brand;
    }
    return route('category.show', params);
});


</script>

<template>
    <Link :href="categoryLink"  class="bg-[#383A3A]/65 w-full h-[213px] flex flex-col justify-center items-center space-y-4 rounded-[10px] duration-200 ease-linear hover:bg-[#494A4A] hoverText cursor-pointer">
        <img class="max-h-[125px] max-w-[175px]" src="/resources/images/static/Category/1_758129.png" :alt="props.title">
        <p class="text-[18px] text-center">{{ props.title }}</p>
    </Link>
</template>

<style scoped>

</style>
