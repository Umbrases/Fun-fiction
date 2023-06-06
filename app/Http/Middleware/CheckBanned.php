<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInDays(auth()->user()->banned_until);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Ваша учетная запись была заблокирована. Пожалуйста, свяжитесь с администратором.';
            } else {
                $message = 'Ваша учетная запись была заблокирована на '.$banned_days. ' дней'.'. Пожалуйста, свяжитесь с администратором.';
            }

            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}
