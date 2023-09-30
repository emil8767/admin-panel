<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
   
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Пользователь авторизован, разрешаем доступ
            return $next($request);
        } else {
            // Пользователь не авторизован, перенаправляем его на страницу входа
            return redirect('/login');
        }
    }
}
