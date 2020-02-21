<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CvPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->type === "Manager";
    }

    public function view(User $user)
    {
        return $user->type === "Employer" && $user->premium || $user->type === "Manager";
    }

    public function create(User $user)
    {
        return $user->type === "Job seeker";
    }

    public function check(User $user)
    {
        return $user->type === "Manager";
    }
}
