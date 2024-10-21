<template>
    <div class="xs:mb-[55px] xs:rounded-[10px] xs:mt-7 xs:mx-2 md:mx-auto md:mt-0 md:mb-0 lg:min-h-full relative lg:w-full overflow-hidden">
        <div
            class="slider-track flex transition-transform duration-500"
            :style="{ transform: `translateX(-${currentSlide * 100}%)` }"
        >
            <div
                v-for="(slide, index) in slides"
                :key="index"
                class="slider-item flex-shrink-0 w-full "
            >
                <img :src="slide.image" alt="" class="w-full h-auto aspect-auto" />

            </div>
        </div>
        <button @click="prevSlide" class="absolute left-4 top-1/2 -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-caret-left-fill duration-200 ease-in transition-colors hover:fill-primary-purple" viewBox="0 0 16 16">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
            </svg>
        </button>
        <button @click="nextSlide" class="absolute right-4 top-1/2 -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray" class="bi bi-caret-right-fill duration-200 ease-in transition-colors hover:fill-primary-purple" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
            </svg>
        </button>
        <div class="flex justify-center ">
            <div class="indicators absolute bottom-4 flex justify-center items-center w-auto bg-[#1E1E1E] rounded-[10px] py-1 px-3 xs:mb-0 md:mb-10">
      <span
          v-for="(slide, index) in slides"
          :key="index"
          class="indicator w-3 h-3 mx-1 rounded-full"
          :class="currentSlide === index ? 'bg-[#9701FE]' : 'bg-[#303131]'"
          @click="goToSlide(index)"
      ></span>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const currentSlide = ref(0)
const slides = [
    {
        image: 'https://via.placeholder.com/1920x620',
        title: 'Realme 10 Pro+ 5G',

    },
    {
        image: 'https://via.placeholder.com/1920x620',
        title: 'Another Product',

    },
    {
        image: 'https://via.placeholder.com/1920x620',
        title: 'Another Product',

    },
    {
        image: 'https://via.placeholder.com/1920x620',
        title: 'Another Product',

    },
    {
        image: 'https://via.placeholder.com/1920x620',
        title: 'Another Product',

    },
    // Add more slides as needed
]

const nextSlide = () => {
    currentSlide.value = (currentSlide.value + 1) % slides.length
}

const prevSlide = () => {
    currentSlide.value =
        (currentSlide.value - 1 + slides.length) % slides.length
}

const goToSlide = (index) => {
    currentSlide.value = index
}
</script>

<style scoped>

.slider-track {
    display: flex;
    width: 100%;
}
.slider-item {
    width: 100%;
    flex-shrink: 0;
}
.indicator {
    cursor: pointer;
}
</style>
