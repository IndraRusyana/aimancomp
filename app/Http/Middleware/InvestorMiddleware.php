<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvestorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'investor') {
            // Check if the route is one of the restricted admin routes
            if ($request->is('/admin/layanan/*', '/admin/pekerjaan/*', '/admin/laporan/*', '/admin/pengeluaran/*', '/admin/store/*')) {
                return redirect('/admin/home');
            }
        }
        return $next($request);
    }
}
