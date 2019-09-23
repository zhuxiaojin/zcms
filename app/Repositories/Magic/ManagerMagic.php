<?php

namespace App\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Contracts\QueryRelate;

/**
 * Class ManagerMagic
 * @package App\Repositories\Magic
 */
class ManagerMagic extends AbstractMagic
{
    protected $guard = ['name', 'email'];

    public function byName(QueryRelate $queryRelate, string $keywords) {
        return $queryRelate->where('name', 'like',"%$keywords%");
    }

    public function byEmail(QueryRelate $queryRelate, string $keywords) {
        return $queryRelate->orWhere('email', 'like',"%$keywords%");
    }

}
