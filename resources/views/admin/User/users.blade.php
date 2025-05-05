@extends('layout.admin')

@section('adminMain')

    <x-breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-500">Пользователи</span>
            </div>
        </li>
    </x-breadcrumb>

    <h1 class="text-4xl mt-3 ">Список всех пользователей</h1>

    @if($users->isEmpty())
        <h2 class="text-3xl mt-12 mb-6">К сожалению пользователей нет...</h2>
    @else
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-[#464646] dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">№</th>
                    <th class="px-6 py-3">Имя</th>
                    <th class="px-6 py-3">Фамилия</th>
                    <th class="px-6 py-3">Почта</th>
                    <th class="px-6 py-3">Номер</th>
                    <th class="px-6 py-3">Роль</th>
                    <th class="px-6 py-3">День рождение</th>
                    <th class="px-6 py-3">Дата регистрации</th>
                    <th class="px-6 py-3">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="border-b border-gray-950 dark:bg-[#2B2D2D] hover:bg-gray-50 dark:hover:bg-[#2B2D2D]/50 duration-300">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->id }}
                        </td>

                        <td class="px-6 py-4">{{ $user->firstName }}</td>
                        <td class="px-6 py-4">{{ $user->lastName }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->phone }}</td>
                        <td class="px-6 py-4">{{ $user->role }}</td>
                        <td class="px-6 py-4">{{ $user->dob}}</td>
                        <td class="px-6 py-4">{{ $user->created_at->format('d.m.Y') }}</td>
                        <td class="flex items-center px-6 py-4 gap-3">

                            {{-- Delete Modal --}}
                            <div x-data="{ showDelete{{ $user->id }}: false }">
                                <button @click="showDelete{{ $user->id }} = true"
                                        class="duration-300 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg px-3 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <i class="w-5 h-5" data-lucide="trash-2"></i>
                                </button>

                                <div x-show="showDelete{{ $user->id }}"
                                     x-transition
                                     class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm"
                                     style="display: none;">
                                    <div @click.away="showDelete{{ $user->id }} = false"
                                         class="bg-white dark:bg-[#1e1e1e] p-6 rounded-lg shadow-xl w-full max-w-md">
                                        <h2 class="text-lg mb-4">Удалить пользователя "{{ $user->email }}"?</h2>
                                        <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">Это действие необратимо.</p>
                                        <form method="POST" action="{{ route('admin.catalogs.destroy', $user) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex justify-end gap-2">
                                                <button type="submit" class="px-4 py-2 bg-red-700 hover:bg-red-900 duration-300 text-white rounded-md">
                                                    Удалить
                                                </button>
                                                <button type="button" @click="showDelete{{ $user->id }} = false"
                                                        class="px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-500 duration-300 dark:text-white">
                                                    Отмена
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $users->links() }}
            </div>
        </div>
    @endif

@endsection
