<script setup>
import {Link} from "@inertiajs/vue3";
defineProps({
    links: Array
})
</script>

<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap justify-end -mb-1">
            <template v-for="(link, key) in links">
                <div v-if="link.url === null" :key="key" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400  rounded-[10px]" v-html="link.label" />
                <Link v-else  class="mr-1 mb-1 px-4 py-3 text-sm leading-4  rounded-[10px] hover:bg-dark-purple focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-dark-purple': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>

<style scoped>

</style>
