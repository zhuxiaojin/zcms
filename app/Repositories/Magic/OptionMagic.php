<?php

namespace App\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Drivers\QueryRelate;

/**
 * Class OptionMagic
 * @package App\Repositories\Magic
 */
class OptionMagic extends AbstractMagic
{
    protected $guard = ['name', 'key'];
    public function byKey(QueryRelate $queryRelate, string $keyword) {
        return $queryRelate->orWhere('key', 'like', "%$keyword%");
    }

    public function byName(QueryRelate $queryRelate, string $keyword) {
        return $queryRelate->orWhere('key', 'like', "%$keyword%");
    }
}
