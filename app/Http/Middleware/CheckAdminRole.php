<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('admin')->user();

        if ($user && $user->role == 1) {
            return $next($request);
        }

        // Nếu người dùng không có quyền, chuyển hướng hoặc từ chối truy cập
        return redirect()->route('admin.errors.no-role');
    
    }
}
