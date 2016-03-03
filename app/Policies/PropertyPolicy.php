<?php

namespace App\Policies;

use App\Property;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
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

    public function edit(User $user, Property $property)
    {
        return $user->id === $property->user_id;
    }
}
