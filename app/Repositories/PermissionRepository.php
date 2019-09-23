<?php

namespace App\Repositories;

use CrCms\Repository\AbstractRepository;
use \Spatie\Permission\Models\Permission;

/**
 * Class PermissionRepository
 * @package App\Repositories
 */
class PermissionRepository extends AbstractRepository
{
    protected $scenes = [
        'create' => [
            'name', 'title', 'guard_name','group'
        ],
    ];
    protected $guard = ['name', 'title', 'guard_name','group'];

    /**
     * @return Permission
     */
    public function newModel(): Permission {
        return app(Permission::class);
    }
}
