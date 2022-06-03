<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
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

    public function before(User $user, $ability)
    {
        $user_policy = new UserPolicy;
        if ($user_policy->isAdmin($user)) {
            return true;
        }
    }

    public function edit(User $user, Item $item)
    {
        return $user->id == $item->user_id;
    }
}
