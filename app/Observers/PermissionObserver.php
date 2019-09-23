<?php

namespace App\Observers;

use App\Models\Manager;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionObserver
{
    //
    public function created(Permission $permission) {
         Role::first()->givePermissionTo($permission);

    }
}
