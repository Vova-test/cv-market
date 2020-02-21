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
        return $user->type === "Manager";
    }

    public function view(User $user, CV $cv)
    {
        return $user->type === "Employer" && $user->premium
            || $user->id === $cv->user_id
            || $user->type === "Manager";
    }

    public function create(User $user)
    {
        return $user->type === "Job seeker";
    }

    public function update(User $user, CV $cv)
    {
        return $user->id === $cv->user_id;
    }

    public function check(User $user)
    {
        return $user->type === "Manager";
    }
}
