<script setup>
defineProps({
    title:String,
    rating:Number,
    reviews_count:Number,
    price:Number
})
</script>

<template>
    <!-- Правая часть с основной информацией -->
    <div class="bg-white-purple/85 text-black w-full p-6 rounded-[10px] lg:w-9/12 shadow-md">
        <div class="flex justify-between gap-4 mb-[10px]">
<!--            <h1 class="text-4xl font-bold mb-4">Смартфон Apple iPhone 16 128 ГБ чёрный </h1>-->
            <h1 class="text-4xl font-bold mb-4">{{title}}</h1>
            <div class="bg-white p-1.5 h-14 w-auto rounded-[10px] overflow-x-auto flex-shrink-0 xs:hidden sm:block">
                <img src="/resources/images/static/Brands/logo%20samsung.png" class="object-cover w-full h-full"
                     alt="brands">
            </div>
        </div>
        <div class="bg-white rounded-[10px] px-3 py-1.5 mb-[30px] w-fit flex justify-start gap-4">
            <div class="flex justify-center items-center text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>

                                    {{rating}}
            </div>
            <div class="flex justify-center items-center text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                    <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                </svg>

                                    {{reviews_count}}
            </div>
        </div>
        <div class="flex gap-4 mb-[30px] items-center">
            <div class="text-xl text-center font-medium bg-white w-fit rounded-[10px] py-1.5 px-4 text-dark flex-shrink-0">
                {{price}} P
            </div>
            <div class="text-xl text-center font-semibold bg-white w-fit rounded-[10px] py-1.5 px-4 text-dark-purple flex-shrink-0">
                С
            </div>
            <div class="text-xl text-center font-semibold bg-white w-fit rounded-[10px] py-1.5 px-4 text-dark-purple flex-shrink-0">
                И
            </div>
            <button class="text-xl text-center font-semibold bg-white rounded-[10px] py-1.5 text-dark-purple flex-grow">
                Купить
            </button>
        </div>

        <!--            Блоки с вариантами цветов-->

        <p class="mb-[15px]"><span class="font-bold ">Цвет: </span> Чёрный</p>
        <div class="flex gap-4 overflow-x-auto w-full  max-w-md flex-shrink-0 mb-[15px]">
            <div
                class="border-2 border-white-purple transition duration-200 ease-linear cursor-pointer xs:h-16 xs:w-16  p-1.5 rounded-[10px] flex-shrink-0">
                <!--                    <img src="https://via.placeholder.com/100x100" alt="Preview 1" class="object-cover w-full h-full rounded-md">-->
                <img src="/resources/images/static/Category/1_758129.png" alt="Preview 1"
                     class="object-cover w-full h-full rounded-md">
            </div>
            <div
                class="border-2 border-gray-400 transition duration-200 ease-linear cursor-pointer hover:border-white-purple p-1.5  xs:h-16 xs:w-16  rounded-[10px]  flex-shrink-0">
                <!--                    <img src="https://via.placeholder.com/100x100" alt="Preview 2" class="object-cover w-full h-full rounded-md">-->
                <img src="/resources/images/static/Category/1_758129.png" alt="Preview 2"
                     class="object-cover w-full h-full rounded-md">
            </div>
            <div
                class="border-2 border-gray-400 transition duration-200 ease-linear cursor-pointer hover:border-white-purple p-1.5  xs:h-16 xs:w-16  rounded-[10px]  flex-shrink-0">
                <!--                    <img src="https://via.placeholder.com/100x100" alt="Preview 2" class="object-cover w-full h-full rounded-md">-->
                <img src="/resources/images/static/Category/1_758129.png" alt="Preview 2"
                     class="object-cover w-full h-full rounded-md">
            </div>


        </div>

        <div class="py-4 mb-[15px]">
            <h2 class="text-xl font-bold mb-4">О товаре</h2>
            <div class="space-y-2">
                <div class="flex items-baseline">
                    <span class="text-gray-700 mr-3 ">Экран</span>
                    <span class="flex-grow border-t border-dashed border-gray-400/50"></span>
                    <span class="text-gray-900 text-right ml-3">6.1"</span>
                </div>
                <div class="flex items-baseline">
                    <span class="text-gray-700 mr-3 ">Модель процессора</span>
                    <span class="flex-grow border-t border-dashed border-gray-400/50"></span>
                    <span class="text-gray-900  text-right ml-3">A18</span>
                </div>
                <div class="flex items-baseline">
                    <span class="text-gray-700 mr-3 ">Встроенная память</span>
                    <span class="flex-grow border-t border-dashed border-gray-400/50"></span>
                    <span class="text-gray-900 text-right ml-3">128 Гб</span>
                </div>
            </div>
        </div>




        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div class=" mb-3">
                <h3 class="text-lg font-bold flex items-center gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-current" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                    </svg>
                    Оплата
                </h3>
                <p class="text-gray-700 text-clip">
                    Принимаем к оплате как наличный,
                    так и безналичный расчёт. Возможна
                    оплата электронными кошельками.
                </p>
            </div>
            <div class=" mb-3">
                <h3 class="text-lg font-bold flex items-center gap-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-current" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                    </svg>
                    Доставка
                </h3>
                <p class="text-gray-700 text-clip">
                    Доставим по всей России в течение
                    нескольких дней. Стоимость доставки
                    в свой город уточняйте у менеджера.
                </p>
            </div>
        </div>


    </div>
</template>

<style scoped>

</style>
