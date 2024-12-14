<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
         $validator = Validator::make($request->all(), [
        'login' => 'required|unique:users,login|max:255',
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'string', 'min:8'], // Минимальная длина пароля для безопасности
    ]);

    if ($validator->fails()) {
        // Явно перенаправляем на маршрут регистрации с ошибками
        return redirect()->route('register')
            ->withErrors($validator)
            ->withInput();
    }

    // Создание нового пользователя
        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    // Назначение роли пользователю
        $user->assignRole('user');

    // Триггер события регистрации
        event(new Registered($user));

    // Попытка входа с учетными данными
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
        // Если вход не удался, перенаправить на страницу логина
            return redirect()->route('login')->withErrors([
                'email' => __('Registration successful, but login failed. Please try to log in.'),
            ]);
        }

    // Регенерация сессии для безопасности
        $request->session()->regenerate();

    // Перенаправление на домашнюю страницу
        return redirect(RouteServiceProvider::HOME);
    }
}
