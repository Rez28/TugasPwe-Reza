<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Mengecek apakah user yang login memiliki role yang sesuai
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Jika tidak memiliki role yang sesuai, bisa redirect atau abort
        return redirect('/'); // Ganti dengan halaman yang diinginkan
    }
}
