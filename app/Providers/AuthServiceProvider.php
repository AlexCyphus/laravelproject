<?php

namespace App\Providers;

use App\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
      User::class => UserPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
