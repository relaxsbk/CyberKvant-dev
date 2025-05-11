@extends('layout.admin')

@section('adminMain')

    <x-breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-500">Категории</span>
            </div>
        </li>
    </x-breadcrumb>

    <div class="p-4">


       @if($category->category_characteristic->isEmpty())
           Нет атрибутов
       @else
           @foreach($category->category_characteristic as $attribute)
                <p>{{$attribute->attribute_characteristic}}</p>
           @endforeach
       @endif

        <h2 class="text-xl font-semibold mb-4">Добавить характеристики для категории <span class="text-secondary-purple">{{$category->title}}</span></h2>

        <form method="POST" action="{{ route('admin.category-characteristics.store') }}">
            @csrf

            <input type="hidden" name="category_id" value="{{ $category->id }}">

            <div id="attributes-wrapper">
                <div class="flex mb-2">
                    <input type="text" name="attributes[]" class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple" placeholder="Введите характеристику">
                    <button type="button" onclick="addAttributeField()" class="ml-2 px-3 py-1 bg-primary-purple text-white rounded">+</button>
                </div>
            </div>

            <button type="submit" class="mt-4 px-4 py-2 bg-primary-purple hover:bg-dark-purple duration-300 text-white rounded">Сохранить</button>
        </form>
    </div>

    <script>
        function addAttributeField() {
            const wrapper = document.getElementById('attributes-wrapper');
            const div = document.createElement('div');
            div.classList.add('flex', 'mb-2');
            div.innerHTML = `
            <input type="text" name="attributes[]" class="w-full px-4 py-2 border border-none rounded-md dark:bg-[#464646]/50 dark:text-white duration-300 ease-in-out focus:ring-primary-purple" placeholder="Введите характеристику">
            <button type="button" onclick="this.parentElement.remove()" class="ml-2 px-3 py-1 bg-red-500 text-white rounded">−</button>
        `;
            wrapper.appendChild(div);
        }
    </script>

@endsection

