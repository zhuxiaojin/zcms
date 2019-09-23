<?php

namespace App\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Drivers\QueryRelate;

/**
 * Class RoleMagic
 * @package App\Repositories\Magic
 */
class RoleMagic extends AbstractMagic
{
    protected $guard = ['name','title'];

    public function byName(QueryRelate $queryRelate, string $keywords) {
        return $queryRelate->orWhere('name', 'like',"%$keywords%");
    }
    public function byTitle(QueryRelate $queryRelate, string $keywords) {
        return $queryRelate->orWhere('title', 'like',"%$keywords%");
    }
}
