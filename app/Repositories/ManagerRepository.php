<?php

namespace App\Repositories;

use App\Models\Manager;
use CrCms\Repository\AbstractMagic;
use CrCms\Repository\AbstractRepository;

class ManagerRepository extends AbstractRepository
{
    protected $scenes = [
        'create' => [
            'name', 'email', 'password'
        ],
    ];
    protected $guard = ['name', 'email', 'password'];

    /**
     * @return Manager|object
     */
    public function newModel() {
        return app(Manager::class);
    }
}
