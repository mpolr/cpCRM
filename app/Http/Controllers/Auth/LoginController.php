<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Куда перенаправлять пользователей после входа.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Создание экземпляра контроллера.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    /**
     * Обработка выхода пользователя из системы.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Переопределение метода для аутентификации по полю `email` вместо `name`.
     * Если тебе нужно логиниться по другому полю, например по имени пользователя:
     */
    public function username()
    {
        return 'email';  // Или другое поле для аутентификации
    }
}