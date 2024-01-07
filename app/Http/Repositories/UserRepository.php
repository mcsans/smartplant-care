<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\UserContract;
use App\Models\User;

class UserRepository extends BaseRepository implements UserContract
{
    protected $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }
}
