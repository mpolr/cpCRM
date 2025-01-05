@extends('layouts.app')

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Редактирование клиента</h2>

        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-4">
                <strong>Телефон:</strong>
                <input id="phone" name="phone" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value=" {{ $client->phone }}">
            </div>

            <div class="mb-4">
                <strong>Email:</strong>
                <input id="email" name="email" type="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value=" {{ $client->email }}">
            </div>

            <div class="mb-4">
                <strong>Имя:</strong>
                <input id="name" name="name" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value=" {{ $client->name }}">
            </div>

            <div class="mb-4">
                <strong>Фамилия:</strong>
                <input id="surname" name="surname" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value=" {{ $client->surname }}">
            </div>

            <div class="mb-4">
                <strong>Дата создания:</strong>
                {{ $client->created_at }}
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                Сохранить
            </button>
        </form>
    </div>
@endsection