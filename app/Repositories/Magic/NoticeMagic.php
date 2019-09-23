<?php

namespace App\Repositories\Magic;

use CrCms\Repository\AbstractMagic;
use CrCms\Repository\Drivers\QueryRelate;

/**
 * Class NoticeMagic
 * @package App\Repositories\Magic
 */
class NoticeMagic extends AbstractMagic
{

    public function byTitle(QueryRelate $queryRelate, $keywords) {
        return $queryRelate->orWhere('title', 'like', "%$keywords%");
    }

    public function byManagerName(QueryRelate $queryRelate, $keywords) {
        return $queryRelate->orWhereClosure(function ($query) use ($keywords) {
            $query->whereHas('manager', function ($query) use ($keywords) {
                $query->where('name', 'like', "%$keywords%");
            });
        });
    }

}
