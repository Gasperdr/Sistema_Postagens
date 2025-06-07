<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostagemPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function verPosts(User $user, Post $post){
        return $user->id = $post->id_user;
    }
}
