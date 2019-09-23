<?php

namespace App\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Drivers\QueryRelate;

/**
 * Class ProductMagic
 * @package App\Repositories\Magic
 */
class ProductMagic extends AbstractMagic
{
    public function byName(QueryRelate $queryRelate, String $keyword) {
        return $queryRelate->where('name', 'like', "%$keyword%");
    }
}
