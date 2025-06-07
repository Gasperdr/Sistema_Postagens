<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Supporte\Facades\Gate;
use App\Models\User;
use App\Models\Post;

class AuthServiceProvaider extends ServiceProvider
{
   
    protected $policies = [
           'App\Models\Post' => 'App\Policies\PostPolicy',
    ];
   
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('ver-post', function(User $user, Post $post){
            return $user->id = $post->id_user;
        });
    }
}
