<?php

namespace App\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Contracts\QueryRelate;

/**
 * Class ManagerMagic
 * @package App\Repositories\Magic
 */
class PermissionMagic extends AbstractMagic
{
    protected $guard = ['name', 'title'];

    public function byName(QueryRelate $queryRelate, string $keywords) {
        return $queryRelate->orWhere('name', 'like',"%$keywords%");
    }
    public function byTitle(QueryRelate $queryRelate, string $keywords) {
        return $queryRelate->orWhere('title', 'like',"%$keywords%");
    }

}
