
<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 mt-12 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-[#1E1E1E] space-y-6">

            {{-- Группа: Панель --}}
            <div>
                <h3 class="px-2 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wide dark:text-gray-500">Панель управления</h3>
                <ul class="space-y-2 font-medium">
                    <li>

                        <a href="{{route('admin.dashboard')}}"
                           class="flex items-center p-2 rounded-[10px] group
                           {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 dark:bg-[#2B2D2D] text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D]' }}">

                        <i data-lucide="chart-column"></i>
                            <span class="ms-3">Главная</span>
                        </a>
                    </li>
                    <li>

                        <a href="" class="flex items-center p-2 text-gray-900 dark:text-white dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 group
                        {{ request()->routeIs('') ? 'bg-gray-200 dark:bg-[#2B2D2D] text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D]' }}">
                            <i data-lucide="notebook"></i>
                            <span class="ms-3">Список заказов</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Группа: Модели --}}
            <div>
                <h3 class="px-2 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wide dark:text-gray-500">Модели</h3>
                <div class="space-y-4">
                    <!-- Каталоги -->
                    <div>
                        <button id="catalogButton"
                                class="w-full px-4 py-2 text-left text-gray-900 dark:text-white flex items-center justify-between dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300
                                {{ request()->routeIs('admin.catalogs*') ? 'bg-gray-200 dark:bg-[#2B2D2D] text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D]' }}"
                                onclick="toggleAccordion('catalogAccordion', 'catalogArrow', 'catalogButton')">

                            <div class="flex items-center">
                                <i data-lucide="book" class="w-5 h-5 inline-block mr-2"></i> Каталоги
                            </div>
                            <svg id="catalogArrow" class="w-4 h-4 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="catalogAccordion" class="hidden space-y-2 px-4 py-2">
                            <div class=" flex gap-2 items-center ml-2 p-2  text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 ">
                                <i data-lucide="eye" class="w-5 h-5 inline-block "></i>
                                <a href="{{route('admin.catalogs')}}"
                                   class="">
                                    Посмотреть всё
                                </a>
                            </div>
                            <div class=" flex gap-2 items-center ml-2 p-2  text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 ">
                                <i data-lucide="pen-line" class="w-5 h-5 inline-block "></i>
                                <a href="{{route('admin.catalogs.noPublished')}}" class="">Неопубликованное</a>
                            </div>
                        </div>
                    </div>

                    <!-- Категории -->
                    <div>
                        <button id="categoryButton" class="w-full px-4 py-2 text-left text-gray-900 dark:text-white flex items-center justify-between dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300
                        {{ request()->routeIs('admin.categories*') ? 'bg-gray-200 dark:bg-[#2B2D2D] text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D]' }}" onclick="toggleAccordion('categoryAccordion', 'categoryArrow', 'categoryButton')">
                            <div class="flex items-center">
                                <i data-lucide="layers" class="w-5 h-5 inline-block mr-2"></i> Категории
                            </div>
                            <svg id="categoryArrow" class="w-4 h-4 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="categoryAccordion" class="hidden space-y-2 px-4 py-2">
                            <div class=" flex gap-2 items-center ml-2 p-2  text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 ">
                                <i data-lucide="eye" class="w-5 h-5 inline-block "></i>
                                <a href="{{route('admin.categories')}}" class="">Посмотреть всё</a>
                            </div>
                            <div class=" flex gap-2 items-center ml-2 p-2   text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 ">
                                <i data-lucide="pen-line" class="w-5 h-5 inline-block "></i>
                                <a href="{{route('admin.categories.noPublished')}}" class="">Неопубликованное</a>
                            </div>
                        </div>
                    </div>

                    <!-- Бренды -->
                    <div>
                        <button id="brandButton" class="w-full px-4 py-2 text-left text-gray-900 dark:text-white flex items-center justify-between dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300
                        {{ request()->routeIs('admin.brands*') ? 'bg-gray-200 dark:bg-[#2B2D2D] text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D]' }}" onclick="toggleAccordion('brandAccordion', 'brandArrow', 'brandButton')">
                            <div class="flex items-center">
                                <i data-lucide="tag" class="w-5 h-5 inline-block mr-2"></i> Бренды
                            </div>
                            <svg id="brandArrow" class="w-4 h-4 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="brandAccordion" class="hidden space-y-2 px-4 py-2">
                            <div class=" flex gap-2 items-center ml-2 p-2  text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300  ">
                                <i data-lucide="eye" class="w-5 h-5 inline-block "></i>
                                <a href="{{route('admin.brands')}}" class="">Посмотреть всё</a>
                            </div>
                            <div class=" flex gap-2 items-center ml-2 p-2  text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 ">
                                <i data-lucide="pen-line" class="w-5 h-5 inline-block "></i>
                                <a href="{{route('admin.brands.noPublished')}}" class="">Неопубликованное</a>
                            </div>
                        </div>
                    </div>

                    <!-- Товары -->
                    <div>
                        <button id="productButton" class="w-full px-4 py-2 text-left text-gray-900 dark:text-white flex items-center justify-between dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300
                        {{ request()->routeIs('') ? 'bg-gray-200 dark:bg-[#2B2D2D] text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D]' }}" onclick="toggleAccordion('productAccordion', 'productArrow', 'productButton')">
                            <div class="flex items-center">
                                <i data-lucide="package" class="w-5 h-5 inline-block mr-2"></i> Товары
                            </div>
                            <svg id="productArrow" class="w-4 h-4 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="productAccordion" class="hidden space-y-2 px-4 py-2">
                            <div class=" flex gap-2 items-center ml-2 p-2  text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 ">
                                <i data-lucide="eye" class="w-5 h-5 inline-block "></i>
                                <a href="#" class="">Посмотреть всё</a>
                            </div>
                            <div class=" flex gap-2 items-center ml-2 p-2   text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 ">
                                <i data-lucide="pen-line" class="w-5 h-5 inline-block "></i>
                                <a href="#" class="">Неопубликованное</a>
                            </div>
                        </div>
                    </div>
            </div>


            {{-- Группа: Пользователи --}}
            <div class="mt-3">
                <h3 class="px-2 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wide dark:text-gray-500">Пользователи</h3>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900  dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 group
                        {{ request()->routeIs('') ? 'bg-gray-200 dark:bg-[#2B2D2D] text-gray-900 dark:text-white' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D]' }}" >
                            <i data-lucide="users"></i>
                            <span class="ms-3">Список пользователей</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Группа: Аутентификация --}}
            <div class="mt-3">
                <h3 class="px-2 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wide dark:text-gray-500">Другое</h3>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{route('home')}}" class="flex items-center p-2 text-gray-900  dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 group">
                            <i data-lucide="undo-2"></i>
                            <span class="ms-3">Перейти в магазин</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900  dark:text-white hover:bg-gray-100 dark:hover:bg-[#2B2D2D] rounded-[10px] duration-300 group">
                            <i data-lucide="log-out"></i>
                            <span class="ms-3">Выход</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>

<script>
    function toggleAccordion(accordionId, arrowId, buttonId) {
        const accordion = document.getElementById(accordionId);
        const arrow = document.getElementById(arrowId);
        const button = document.getElementById(buttonId);

        // Toggle visibility of the accordion
        accordion.classList.toggle('hidden');

        // Rotate the arrow (180 degrees)
        arrow.classList.toggle('rotate-180');

        // Toggle the active class on the button
        button.classList.toggle('bg-[#2B2D2D]');

    }
</script>

<style>
    /* Для корректного вращения стрелки */
    .rotate-180 {
        transform: rotate(180deg);
    }

    /* Добавляем стили для активной кнопки (когда аккордеон открыт) */

</style>

