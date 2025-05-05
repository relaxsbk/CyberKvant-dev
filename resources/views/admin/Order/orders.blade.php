@extends('layout.admin')

@section('adminMain')

    <x-breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-500">Заказы</span>
            </div>
        </li>
    </x-breadcrumb>

    <h1 class="text-4xl mt-3 mb-3">Список всех заказов</h1>

    @if($orders->isEmpty())
        <h2 class="text-3xl mt-12 mb-6">К сожалению заказов нет...</h2>
    @else
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-[#464646] dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">№</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Предметы</th>
                    <th class="px-6 py-3">Сумма</th>
                    <th class="px-6 py-3">Статус</th>
                    <th class="px-6 py-3">Дата создания</th>
                    <th class="px-6 py-3">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr class="border-b border-gray-950 dark:bg-[#2B2D2D] hover:bg-gray-50 dark:hover:bg-[#2B2D2D]/50 duration-300">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->id }}
                        </td>
                        <td class="px-6 py-4">{{ $order->user->email }}</td>
                        <td class="px-6 py-4">
                            @foreach($order->items as $item)
                                <div>{{ $item->product->title }} ({{ $item->quantity }})</div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">{{ $order->total }} ₽</td>
                        <td class="px-6 py-4">{{ $order->orderStatus->label }}</td>
                        <td class="px-6 py-4">{{ $order->created_at->format('d.m.Y') }}</td>
                        <td class="flex items-center px-6 py-4 gap-3">
                            {{-- View Modal --}}
                            <div x-data="{ showView{{ $order->id }}: false }">
                                <button @click="showView{{ $order->id }} = true"
                                        class="duration-300 text-white dark:bg-secondary-purple dark:hover:bg-primary-purple focus:ring-4 rounded-lg px-3 py-2.5 ">
                                    <i class="w-5 h-5" data-lucide="eye"></i>
                                </button>

                                <div x-show="showView{{ $order->id }}"
                                     x-transition
                                     class="fixed inset-0 flex items-center justify-center z-50 bg-black/50 backdrop-blur-sm"
                                     style="display: none;">
                                    <div @click.away="showView{{ $order->id }} = false"
                                         class="bg-white dark:bg-[#1e1e1e] p-6 rounded-lg shadow-xl w-full max-w-xl overflow-y-auto max-h-[90vh]">
                                        <h2 class="text-xl font-bold mb-4">Содержимое заказа #{{ $order->id }}</h2>
                                        <ul class="text-sm dark:text-white">
                                            @foreach($order->items as $item)
                                                <li class="mb-2">{{ $item->product->title }} — {{ $item->quantity }} шт. × {{ number_format($item->total_price, 2) }} ₽</li>
                                            @endforeach
                                        </ul>
                                        <div class="text-right mt-4">
                                            <button @click="showView{{ $order->id }} = false"
                                                    class="px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-500 duration-300 dark:text-white">
                                                Закрыть
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Status Update --}}
                            <form method="POST" action="{{ route('admin.orders.updateStatus', $order) }}">
                                @csrf
                                @method('PUT')
                                <select name="status_id"
                                        onchange="this.form.submit()"
                                        class="px-2 py-1 rounded bg-white dark:bg-[#464646] dark:text-white border border-gray-300 dark:border-gray-600">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" @selected($order->order_status_id == $status->id)>{{ $status->label }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $orders->links() }}
            </div>
        </div>
    @endif

@endsection
