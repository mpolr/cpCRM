@extends('layouts.app')

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Информация о клиенте</h2>

        <div class="mb-4">
            <strong>Имя:</strong> {{ $client->name }}
        </div>

        <div class="mb-4">
            <strong>Email:</strong> {{ $client->email }}
        </div>

        <div class="mb-4">
            <strong>Телефон:</strong> {{ $client->phone }}
        </div>

        <a href="{{ route('clients.edit', $client->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Редактировать</a>
        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Удалить</button>
        </form>
    </div>
@endsection