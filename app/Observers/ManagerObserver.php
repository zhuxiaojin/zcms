<?php

namespace App\Observers;

use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerObserver
{
    //
    public function created(Manager $manager) {
        if (request()->get('roles') && auth('manager')->user()->hasRole('super-admin')) {
            $manager->syncRoles(request()->get('roles'));
        }
    }
    public function saved(Manager $manager) {
        if (request()->get('roles') && auth('manager')->user()->hasRole('super-admin')) {
            $manager->syncRoles(request()->get('roles'));
        }
    }
}
