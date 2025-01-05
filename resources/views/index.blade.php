@extends('layouts.app')

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Список заявок</h2>

        <a href="{{ route('orders.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">
            Добавить заявку
        </a>

        <table class="min-w-full mt-4">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2">Обращение</th>
                <th class="px-4 py-2">Решение</th>
                <th class="px-4 py-2">Статус</th>
                <th class="px-4 py-2">Дата</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($orders as $order)
                <tr>
                    <td class="px-4 py-2">{{ $order->description }}</td>
                    <td class="px-4 py-2">{{ $order->solution }}</td>
                    <td class="px-4 py-2">{{ $order->getStatus() }}</td>
                    <td class="px-4 py-2">{{ $order->created_at }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('orders.show', $order->id) }}" class="text-indigo-600">Просмотр</a> |
                        <a href="{{ route('orders.edit', $order->id) }}" class="text-yellow-500">Редактировать</a> |
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection