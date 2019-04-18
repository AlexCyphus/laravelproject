<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles {
    public function handle($request, Closure $next) {
      if(auth()->user()->role === 'admin') {
        return $next($request);
      }
      return redirect('/');
    }


}
