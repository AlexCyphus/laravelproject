<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles {
    public function handle($request, Closure $next, $role) {
      $roles = array_slice(func_get_args(), 2);
      if(auth()->user()->hasRoles($roles)) {
          return $next($request);
        }
      return redirect('/');
    }
}
