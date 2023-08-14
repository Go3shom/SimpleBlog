<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    public function update(User $user, Post $post)
    {
        return
            $user->is_admin
            || (auth()->check()
                && $post->user_id === auth()->id());
    }

    public function delete(User $user, Post $post)
    {
        return
            $user->is_admin
            || (auth()->check()
                && $post->user_id === auth()->id());
    }

}
