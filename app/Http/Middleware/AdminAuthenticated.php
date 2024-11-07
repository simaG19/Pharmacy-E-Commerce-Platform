<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the 'username' session variable is set
        if (!session('username')) {
            return redirect('/login')->with('error', 'Please log in first');
        }

        return $next($request);
    }
}
