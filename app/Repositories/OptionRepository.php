<?php

namespace App\Repositories;

use App\Models\Option;
use CrCms\Repository\AbstractRepository;

/**
 * Class OptionRepository
 * @package App\Repositories
 */
class OptionRepository extends AbstractRepository
{
    protected $scenes = [
        'create' => [
            'key', 'value', 'name', 'description'
        ],
    ];
    protected $guard = ['key', 'value', 'name', 'description'];

    /**
     * @return option
     */
    public function newModel(): option {
        return app(Option::class);
    }
}
