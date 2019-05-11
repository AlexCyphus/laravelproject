<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles {
    // takes last arg and checks if user has the roles
    public function handle($request, Closure $next, $role) {
      $roles = array_slice(func_get_args(), 2);
      if(auth()->user()->hasRoles($roles)) {
          return $next($request);
        }
      return redirect('/');
    }
}
