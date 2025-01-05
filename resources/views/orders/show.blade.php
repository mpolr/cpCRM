@extends('layouts.app')

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Информация о заявке</h2>

        <div class="mb-4">
            <strong>Телефон:</strong> {{ $client->phone }}
        </div>

        <div class="mb-4">
            <strong>Обращение:</strong>
            {{ $order->description }}
        </div>

        <div class="mb-4">
            <strong>Решение:</strong>
            {{ $order->solution }}
        </div>

        <div class="mb-4">
            <strong>Дата создания:</strong>
            {{ $order->created_at }}
        </div>

        <div class="mb-4">
            <strong>Дата закрытия:</strong>
            {{ $order->closed_at }}
        </div>

        <a href="{{ route('orders.edit', $order->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Редактировать</a>
        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Удалить</button>
        </form>
    </div>
@endsection