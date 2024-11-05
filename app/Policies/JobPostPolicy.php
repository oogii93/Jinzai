<?php

namespace App\Policies;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'company']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobPost $jobPost): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'company']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobPost $jobPost): bool
    {
        return $user->role ==='admin' ||
                    ($user->role === 'company' && $user->id === $jobPost->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobPost $jobPost): bool
    {
        return $user->role ==='admin' ||
        ($user->role === 'company' && $user->id === $jobPost->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobPost $jobPost)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobPost $jobPost)
    {
        //
    }
}
