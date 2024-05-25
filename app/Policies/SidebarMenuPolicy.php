<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class SidebarMenuPolicy
{
    public function viewUserMenu(User $user)
    {
        return true;
    }
}
