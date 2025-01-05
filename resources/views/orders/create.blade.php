@extends('layouts.app')

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Добавить заявку</h2>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="py-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">
                    Телефон
                </label>
                <input id="phone" name="phone" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('phone') }}">
                @error('phone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="py-4">
                <label for="description" class="block text-sm font-medium text-gray-700">
                    Обращение
                </label>
                <textarea id="description" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    {{ trim(old('description')) }}
                </textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="py-4">
                <label for="solution" class="block text-sm font-medium text-gray-700">
                    Решение
                </label>
                <textarea id="solution" name="solution" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    {{ trim(old('solution')) }}
                </textarea>
                @error('solution')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-4 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Добавить заявку
            </button>
        </form>
    </div>
@endsection