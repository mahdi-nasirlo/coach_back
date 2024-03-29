<?php

namespace App\Policies\Blog;

use App\Models\Blog\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_blog::category');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function view(User $user, Category $category): bool
    {
        return $user->can('view_blog::category');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_blog::category');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function update(User $user, Category $category): bool
    {
        return $user->can('update_blog::category');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->can('delete_blog::category');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param User $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_blog::category');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function forceDelete(User $user, Category $category): bool
    {
        return $user->can('force_delete_blog::category');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param User $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_blog::category');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function restore(User $user, Category $category): bool
    {
        return $user->can('restore_blog::category');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param User $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_blog::category');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function replicate(User $user, Category $category): bool
    {
        return $user->can('replicate_blog::category');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param User $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_blog::category');
    }

}
