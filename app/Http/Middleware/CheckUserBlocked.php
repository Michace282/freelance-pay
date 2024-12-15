<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Проверяем, заблокирован ли пользователь
        if ($user && $user->is_blocked) {
            // Перенаправляем на маршрут messages
            return redirect()->route('messages')->with('error', 'Ваш аккаунт заблокирован.');
        }

        return $next($request);
    }
}