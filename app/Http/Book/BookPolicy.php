<?php

namespace App\Http\Book;

use App\Http\Policy;
use App\Models\Book;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * If the current user is super admin then allow.
     *
     * @param User $user
     *
     * @return bool
     */
    public function ifSuperAdmin(User $user)
    {
        return $user->level_id == 'SuperAdmin';
    }

    /**
     * Determine if the given user can create the given resource.
     *
     * @param User $user
     * @param Book $book
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $this->ifAdmin($user);
    }

    /**
     * Determine if the given user can edit the given resource.
     *
     * @param User $user
     * @param Book $book
     *
     * @return bool
     */
    public function edit(User $user, Book $book)
    {
        return $this->ifAdmin($user);
    }

    /**
     * Determine if the given user can destroy the given resource.
     *
     * @param User $user
     * @param Book $book
     *
     * @return bool
     */
    public function destroy(User $user, Book $book)
    {
        return $this->ifAdmin($user);
    }
}
