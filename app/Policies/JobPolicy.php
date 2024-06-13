<?php

namespace App\Policies;

use App\Models\Career;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Career $career): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;           // Not allow for user not logged in to create a job
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Career $career): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Career $career): bool
    {
        return false;
    }

    public function apply(User $user, Career $job): bool
    {
        // return false;
        return !$job->hasUserApplied($user);
    }
}
