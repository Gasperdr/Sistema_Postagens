<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Policies\PostagemPolicy;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Post::class => PostagemPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }

}