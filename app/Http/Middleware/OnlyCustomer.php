<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // jika bukan customer redirect ke halaman utama
        if (Auth::user()->role_id != 2) {
            return redirect('/');
        }

        // jika yang login adalah customer maka akan menjalankan perintah dibawah ini
        return $next($request);
    }
}
