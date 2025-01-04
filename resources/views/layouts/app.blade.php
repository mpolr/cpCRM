<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CRM Мастерская') }}</title>
    <link href="{{ asset('css/app.css', true) }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<nav class="bg-gray-800 p-4">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <a href="{{ route('index') }}" class="text-white">CRM Мастерская</a>
            <div>
                @if (Auth::check())
                    <a href="{{ route('clients.index') }}" class="text-white">
                        Клиенты
                    </a>
                    <a href="#" class="text-white ml-4">
                        Категории
                    </a>
                    <a href="#" class="text-white ml-4">
                        Персонал
                    </a>
                    <a href="#" class="text-white ml-4">
                        Отчёты
                    </a>
                    <a href="{{ route('logout') }}" class="text-white ml-4"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Выйти
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white">Войти</a>
                @endif
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto mt-6">
    @yield('content')
</div>
</body>
</html>