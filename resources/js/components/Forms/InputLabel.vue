<script setup>


defineProps({
    value: {
        type: String,
    },
});


</script>

<template>
    <label
        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4  peer-focus:text-secondary-purple peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
    >
        {{ value }}
    </label>
</template>

<style scoped>

</style>
