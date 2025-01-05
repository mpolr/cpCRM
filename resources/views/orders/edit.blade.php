@extends('layouts.app')

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Редактирование заявки</h2>

        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-4">
                <strong>Телефон:</strong> {{ $client->phone }}
            </div>

            <div class="mb-4">
                <strong>Обращение:</strong>
                <textarea id="description" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    {{ $order->description }}
                </textarea>
            </div>

            <div class="mb-4">
                <strong>Решение:</strong>
                <textarea id="solution" name="solution" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    {{ $order->solution }}
                </textarea>
            </div>

            <div class="mb-4">
                <strong>Дата создания:</strong>
                {{ $order->created_at }}
            </div>

            <div class="mb-4">
                <strong>Дата закрытия:</strong>
                {{ $order->closed_at }}
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                Сохранить
            </button>
        </form>
    </div>
@endsection