<script setup>
import { ref, watch } from "vue";

const props = defineProps({
    modelValue: Boolean, // v-model для управления состоянием
});

const emit = defineEmits(["update:modelValue"]);

const isVisible = ref(false);
const isOpen = ref(false);
const animationSpeed = 300; // Время анимации в мс

watch(
    () => props.modelValue,
    (newVal) => {
        if (newVal) {
            isVisible.value = true;
            setTimeout(() => (isOpen.value = true), 10);
        } else {
            isOpen.value = false;
            setTimeout(() => (isVisible.value = false), animationSpeed);
        }
    },
    { immediate: true }
);

const close = () => {
    isOpen.value = false;
    setTimeout(() => emit("update:modelValue", false), animationSpeed);
};
</script>

<template>
    <Teleport to="body">
        <div
            v-if="isVisible"
            class="fixed inset-0 flex items-center justify-center z-50"
        >
            <!-- Затемненный фон -->
            <div
                class="absolute inset-0 bg-black transition-opacity"
                :class="{ 'opacity-50': isOpen, 'opacity-0': !isOpen }"
                :style="{ transitionDuration: animationSpeed + 'ms' }"
                @click="close"
            ></div>

            <!-- Контейнер модалки -->
            <div
                class="bg-[#1E1E1E] p-6 rounded-lg shadow-lg transform transition-transform max-w-lg w-full relative z-10"
                :class="{ 'scale-100 opacity-100': isOpen, 'scale-95 opacity-0': !isOpen }"
                :style="{ transitionDuration: animationSpeed + 'ms' }"
            >
                <button
                    @click="close"
                    class="mt-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white duration-200"
                >
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <slot />
            </div>
        </div>
    </Teleport>
</template>
