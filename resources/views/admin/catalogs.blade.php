@extends('layout.admin')

@section('adminMain')

<x-breadcrumb>
{{--    <li>--}}
{{--        <div class="flex items-center">--}}
{{--            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">--}}
{{--                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>--}}
{{--            </svg>--}}
{{--            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>--}}
{{--        </div>--}}
{{--    </li>--}}
    <li aria-current="page">
        <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Каталоги</span>
        </div>
    </li>
</x-breadcrumb>

<h1 class="text-4xl mt-3 mb-6">Список всех каталогов</h1>



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-[#464646] dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                №
            </th>
            <th scope="col" class="px-6 py-3">
                Картинка
            </th>
            <th scope="col" class="px-6 py-3">
                Название
            </th>
            <th scope="col" class="px-6 py-3">
                Описание
            </th>
            <th scope="col" class="px-6 py-3">
                Статус
            </th>
            <th scope="col" class="px-6 py-3">
                Дата создания
            </th>
            <th scope="col" class="px-6 py-3">
                Действия
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($catalogs as $catalog)
            <tr class=" border-b border-gray-950 dark:bg-[#2B2D2D]  hover:bg-gray-50 dark:hover:bg-[#2B2D2D]/50  duration-300">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$catalog->id}}
                </th>
                <td class="px-6 py-4">
                    <img src="{{asset($catalog->image)}}" alt="{{$catalog->title}}">
                </td>
                <td class="px-6 py-4">
                    {{$catalog->title}}
                </td>
                <td class="px-6 py-4">
                    {{$catalog->description}}
                </td>
                <td class="px-6 py-4">
                    {{$catalog->published}}
                </td>
                <td class="px-6 py-4">
                    {{$catalog->created_at}}
                </td>
                <td class="flex items-center px-6 py-4 gap-3">
                    <button type="button" class="duration-300  focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300  rounded-lg  px-3 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        <i class="w-5 h-5" data-lucide="pencil"></i>
                    </button>
                    <button type="button" class="duration-300  focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg  px-3 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <i class="w-5 h-5" data-lucide="trash-2"></i>
                    </button>

                </td>
            </tr>

        @endforeach

        </tbody>
        <div class="mb-3">
            {{$catalogs->links() }}
        </div>
    </table>

    <div class="mt-3">
        {{$catalogs->links() }}
    </div>
</div>


@endsection
