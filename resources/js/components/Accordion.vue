<script setup>
import { ref } from "vue";

// Принимаем массив секций
const props = defineProps({
    sections: {
        type: Array,
        required: true
    }
});

// Массив активных секций
const activeSections = ref([]);

// Логика переключения
const toggleSection = (index) => {
    if (activeSections.value.includes(index)) {
        // Если секция активна, удаляем её из массива
        activeSections.value = activeSections.value.filter((i) => i !== index);
    } else {
        // Если секция не активна, добавляем её
        activeSections.value.push(index);
    }
};
</script>

<template>
    <div class="xs:mt-5 sm:mt-0 space-y-2">
        <div
            v-for="(section, index) in props.sections"
            :key="index"
            class="border border-gray-200 rounded-xl dark:border-gray-700"
        >
            <!-- Заголовок секции -->
            <button
                @click="toggleSection(index)"
                :class="[
                    'w-full flex items-center rounded-xl justify-between p-5 font-medium gap-3 transition ease-in-out duration-200',
                    {
                        'bg-secondary-purple/50 text-white': activeSections.includes(index),
                        'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400': !activeSections.includes(index)
                    }
                ]"
            >
                <span class="text-lg">{{ section.title }}</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    :class="{ 'rotate-180': activeSections.includes(index) }"
                    class="w-3 h-3 shrink-0 transition-transform duration-300"
                    fill="none"
                    viewBox="0 0 10 6"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5 5 1 1 5"
                    />
                </svg>
            </button>

            <!-- Контент секции -->
            <div
                v-show="activeSections.includes(index)"
                :class="[
                    'p-5 border-t text-gray-500 dark:text-gray-400 rounded-b-xl',
                    'border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-900'
                ]"
            >
                <!-- Если контент — массив характеристик -->
                <div v-if="section.title === 'Характеристики' && Array.isArray(section.content)">
                    <div v-if="section.content" v-for="(group) in section.content" :key="group.group">
                        <h3 class="font-semibold text-white-purple text-xl mb-2">{{ group.group }}</h3>
                        <ul class="sm:px-6 flex flex-col">
                            <li
                                v-for="(attribute) in group.attributes"
                                :key="attribute.name"
                                class="flex justify-between  border-b border-gray-300 py-2 mb-2"
                            >
                                <span class="font-medium">{{ attribute.name }}</span>
                                <span>{{ attribute.value }}</span>
                            </li>
                        </ul>

                    </div>


                </div>

                <!-- Если контент — массив строк (например, отзывы) -->
<!--                <ul v-else-if="Array.isArray(section.content)">-->
<!--                    <li v-for="(item, idx) in section.content" :key="idx">{{ item }}</li>-->
<!--                </ul>-->

                <!-- Если отзывы -->
<!--                <div v-else-if="section.title === 'Отзывы'">-->
<!--                    <ul v-if="Array.isArray(section.content)">-->
<!--                        <li v-for="(item, idx) in section.content" :key="idx">{{ item }}</li>-->
<!--                    </ul>-->
<!--                    <div v-else>-->
<!--                        <p class="text-gray-400 mb-3">Пока что нет отзывов.</p>-->
<!--                        <button-->
<!--                            v-if="section.showReviewButton"-->
<!--                            @click="$emit('open-review-modal')"-->
<!--                            class="bg-secondary-purple text-white py-2 px-4 rounded hover:bg-secondary-purple/80 transition"-->
<!--                        >-->
<!--                            Написать отзыв-->
<!--                        </button>-->
<!--                        <p v-else class="text-gray-500">Только авторизованные пользователи могут оставить отзыв.</p>-->
<!--                    </div>-->
<!--                </div>-->


<!--                <div-->
<!--                    v-else-if="section.title === 'Отзывы' && !section.content"-->
<!--                    class="flex flex-col gap-4 items-start"-->
<!--                >-->
<!--                    <p class="text-gray-400">Отзывов пока нет.</p>-->
<!--                    <button-->
<!--                        v-if="$page.props.auth.user"-->
<!--                        @click="$emit('open-review-modal')"-->
<!--                        class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition"-->
<!--                    >-->
<!--                        Оставить отзыв-->
<!--                    </button>-->
<!--                    <p v-else class="text-sm text-gray-500">Только авторизованные пользователи могут оставить отзыв.</p>-->
<!--                </div>-->

                <div v-else-if="section.title === 'Отзывы'">
                    <ul v-if="Array.isArray(section.content) && section.content.length > 0" class="space-y-4">
                        <li
                            v-for="(review, idx) in section.content"
                            :key="idx"
                            class="border border-gray-300 dark:border-gray-700 rounded-lg p-4"
                        >
                            <div class="flex justify-between items-center mb-1">
                                <span class="font-semibold text-white-purple break-all">{{ review.userName }}</span>
                                <span class="text-secondary-purple font-medium">Оценка: {{ review.rating }}/5</span>
                            </div>
                            <p class="text-gray-600 dark:text-gray-300">{{ review.text }}</p>
                        </li>
                    </ul>

                    <!-- Если отзывов нет -->
                    <div v-else class="text-gray-400 mb-3">Пока что нет отзывов.</div>

                    <!-- Кнопка оставить отзыв -->
                    <button
                        v-if="$page.props.auth.user"
                        @click="$emit('open-review-modal')"
                        class="mt-4 bg-primary-purple text-white py-2 px-4 rounded hover:bg-dark-purple transition"
                    >
                        Написать отзыв
                    </button>
                    <p v-else class="mt-4 text-sm text-gray-500">Только авторизованные пользователи могут оставить отзыв.</p>
                </div>

                <!-- Если контент — строка -->
                <p v-else-if="typeof section.content === 'string'">
                    {{ section.content }}
                </p>

<!--                &lt;!&ndash; Если контент — объект &ndash;&gt;-->
<!--                <ul v-else-if="typeof section.content === 'string'">-->
<!--                    <li-->
<!--                        v-for="(value, key) in section.content"-->
<!--                        :key="key"-->
<!--                        class="flex justify-between border-b border-gray-300 py-2"-->
<!--                    >-->
<!--                        <span class="font-medium">{{ key }}</span>-->
<!--                        <span>{{ value }}</span>-->
<!--                    </li>-->
<!--                </ul>-->
                <!-- Если контент — объект (например, отзывы в формате { email: отзыв }) -->
                <ul v-else-if="typeof section.content === 'object'">
                    <li
                        v-for="(value, key) in section.content"
                        :key="key"
                        class="flex flex-col sm:flex-row justify-between border-b border-gray-300 py-2"
                    >
<!--                        <span class="font-medium break-all">{{ key }}</span>-->
                        <span class="text-gray-300">{{ value }}</span>
                    </li>
                </ul>
                <div v-else>
                    dada
                </div>
            </div>
        </div>
    </div>
</template>




