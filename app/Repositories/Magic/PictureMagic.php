<?php

namespace App\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Drivers\QueryRelate;

/**
 * Class PictureMagic
 * @package App\Repositories\Magic
 */
class PictureMagic extends AbstractMagic
{
    protected $guard = ['title'];
    public function byTitle(QueryRelate $queryRelate, string $keyword) {
        return $queryRelate->where('title', 'like', "%$keyword%");
    }
}
