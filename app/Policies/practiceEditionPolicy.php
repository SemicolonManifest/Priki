<?php

namespace App\Policies;

use App\Models\Practice;
use App\Models\User;
use App\Models\Role;
use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class practiceEditionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Practice $practice)
    {
        return $user->role_id == Role::idFromSlug("MOD") || $practice->user == $user;
    }
}
