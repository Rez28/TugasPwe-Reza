<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class CheckForMaintenanceMode
{
    public function handle(Request $request, Closure $next)
    {
        if (App::isDownForMaintenance()) {
            return response()->view('errors.503', [], 503);
        }

        return $next($request);
    }
}
