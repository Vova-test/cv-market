<?php

namespace App\Policies;

use App\Models\CV;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CvPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->type == User::MANAGER_TYPE;
    }

    public function view(User $user, CV $cv)
    {
        return $user->type == User::EMPLOYER_TYPE && $user->premium
            || $user->id === $cv->user_id
            || $user->type == User::MANAGER_TYPE;
    }

    public function create(User $user)
    {
        return $user->type == User::JOB_SEEKER_TYPE;
    }

    public function update(User $user, CV $cv)
    {
        return $user->id === $cv->user_id;
    }

    public function check(User $user, CV $cv)
    {
        return $user->type == User::MANAGER_TYPE && !$cv->checked;
    }
}
