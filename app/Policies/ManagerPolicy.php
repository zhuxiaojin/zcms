<?php

namespace App\Policies;

use App\Models\Manager;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManagerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function destroy(Manager $manager) {
        return $manager->id !== 1;
    }
}
