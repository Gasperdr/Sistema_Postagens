<?php



namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostagemPolicy
{
    use HandlesAuthorization;

    public function viewPost(?User $user, Post $postagem)
    {
        return $user !== null;
    }

    public function editPost(User $user, Post $postagem)
    {
        return $user->id === $postagem->id_user;
    }
}
