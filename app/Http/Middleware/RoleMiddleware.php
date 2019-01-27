<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $adminData = $request->session()->get('admindata');
        if ($adminData) {
            return $next($request);
        } else {
            return redirect('admin/login');
        }
    }

}
