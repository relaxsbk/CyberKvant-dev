<template>
    <div class="min-h-full relative w-full overflow-hidden">
        <div
            class="slider-track flex transition-transform duration-500"
            :style="{ transform: `translateX(-${currentSlide * 100}%)` }"
        >
            <div
                v-for="(slide, index) in slides"
                :key="index"
                class="slider-item flex-shrink-0 w-full"
            >
                <img :src="slide.image" alt="" class="w-full h-auto" />

            </div>
        </div>
        <button @click="prevSlide" class="absolute left-0 top-1/2 -translate-y-1/2">
            Prev
        </button>
        <button @click="nextSlide" class="absolute right-0 top-1/2 -translate-y-1/2">
            Next
        </button>
        <div class="flex justify-center">
            <div class="indicators absolute bottom-4 flex justify-center items-center w-auto bg-[#1E1E1E] rounded-[10px] py-1 px-3 mb-5">
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
