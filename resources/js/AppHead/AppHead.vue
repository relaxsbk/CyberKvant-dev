<script setup>

import { Head } from '@inertiajs/vue3'

defineProps({ title: String })

</script>

<template>
    <Head :title="title ? `${title}` : 'CyberKvant no title'">
        <slot />
    </Head>
</template>

<style scoped>

</style>
