<?php

namespace App\Policies;

use App\Models\Manga;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MangaPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    //access all to admin
    public function before(User $user)
    {
        if($user->role === 'admin') {
            return true;
        }
    }


    public function viewAny(User $user, Manga $manga): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Manga $manga): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Manga $manga): bool
    {
        return $manga->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Manga $manga): bool
    {
        return $this->update($user, $manga);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Manga $manga): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Manga $manga): bool
    {
        //
    }
}
