<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->type == User::MANAGER_TYPE;
    }

    public function view(User $user)
    {
        return $user->type == User::EMPLOYER_TYPE && $user->premium || $user->type == User::MANAGER_TYPE;
    }

    public function create(User $user)
    {
        return $user->type == User::JOB_SEEKER_TYPE;
    }
}
