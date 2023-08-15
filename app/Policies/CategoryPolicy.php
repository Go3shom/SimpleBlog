<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    public function update(User $user, Category $category)
    {
        return
            $user->is_admin
            || (auth()->check()
                && $category->user_id === auth()->id());
    }

    public function delete(User $user, Category $category)
    {
        return
            $user->is_admin
            || (auth()->check()
                && $category->user_id === auth()->id());
    }
}