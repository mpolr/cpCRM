@extends('layouts.app')

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Список клиентов</h2>

        <a href="{{ route('clients.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">Добавить клиента</a>

        <table class="min-w-full mt-4">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2">Имя</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Телефон</th>
                <th class="px-4 py-2">Адрес</th>
                <th class="px-4 py-2">Действия</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($clients as $client)
                <tr>
                    <td class="px-4 py-2">{{ $client->name }}</td>
                    <td class="px-4 py-2">{{ $client->email }}</td>
                    <td class="px-4 py-2">{{ $client->phone }}</td>
                    <td class="px-4 py-2">{{ $client->address }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('clients.show', $client->id) }}" class="text-indigo-600">Просмотр</a> |
                        <a href="{{ route('clients.edit', $client->id) }}" class="text-yellow-500">Редактировать</a> |
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
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