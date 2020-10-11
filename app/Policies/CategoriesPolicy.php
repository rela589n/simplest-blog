<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriesPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can view any categories.
     *
     * @param  User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return bool
     */
    public function view(User $user, Category $category)
    {
        return true;
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return bool
     */
    public function update(User $user, Category $category)
    {
        return $user->isAdmin()
            || $category->user_id===$user->id;
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return bool
     */
    public function delete(User $user, Category $category)
    {
        return $user->isAdmin()
            || $category->user_id===$user->id;
    }

}
