<?php

namespace App\Policies;

use App\Models\Career;
use App\Models\User;
// use Illuminate\Auth\Access\Response;
use Illuminate\Http\Response;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAnyEmployer(?User $user): bool
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
        return $user->employer !== null;           // Not allow for user not logged in to create a job
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Career $job): bool|Response
    {
        if ($job->employer->user_id !== $user->id) {
            return false;
        }

        if ($job->jobApplications()->count() > 0) {
            return Response::deny('Cannot change the job with applications');
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Career $job): bool
    {
        return $job->employer->user_id === $user->id;
    }

    public function apply(User $user, Career $job): bool
    {
        // return false;
        return !$job->hasUserApplied($user);
    }

    public function restore(User $user, Career $job): bool
    {
        return $job->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Career $job): bool
    {
        return $job->employer->user_id === $user->id;
    }
}
