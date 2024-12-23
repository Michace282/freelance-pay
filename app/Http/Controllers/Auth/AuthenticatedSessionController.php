<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
    // Получаем данные из запроса
        $credentials = $request->only('login', 'password');

    // Проверяем учетные данные
        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')->withErrors([
                'email' => __('Authentication failed. Please check your credentials.'),
            ]);
        }

    // Успешный вход: регенерируем сессию для предотвращения фиксации сеанса
        $request->session()->regenerate();

    // Проверяем, вошел ли пользователь
        if (!Auth::check()) {
            return redirect()->route('login');
        }

    // Проверяем роль пользователя
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('moderator')) {
        // Перенаправление на панель администратора
            return redirect()->route('worker.index');
        }

    // Перенаправление по умолчанию, если у пользователя нет роли admin/moderator
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
