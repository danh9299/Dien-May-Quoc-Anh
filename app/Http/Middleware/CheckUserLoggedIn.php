<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckUserLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Bạn cần đăng nhập để truy cập trang này.'], 401);
            } else {
                return redirect()->route('main.auth.login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
            }
        }
        
        return $next($request);
    }
}
