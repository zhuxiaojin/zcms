<?php

namespace App\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Drivers\QueryRelate;

/**
 * Class MenuMagic
 * @package App\Repositories\Magic
 */
class MenuMagic extends AbstractMagic
{
    protected $guard = ['title', 'url'];

    public function byTitle(QueryRelate $queryRelate, string $keywords) {
        return $queryRelate->orWhere('title', 'like', "%$keywords%");
    }

    public function byUrl(QueryRelate $queryRelate, string $keywords) {
        return $queryRelate->orWhere('url', 'like', "%$keywords%");
    }
}
