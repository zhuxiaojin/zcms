<?php

namespace App\Repositories;

use App\Models\Notice;
use CrCms\Repository\AbstractRepository;

/**
 * Class NoticeRepository
 * @package App\Repositories
 */
class NoticeRepository extends AbstractRepository
{
    protected $scenes = [];
    protected $guard = ['title', 'manager_id', 'body'];

    /**
     * @return Notice
     */
    public function newModel(): Notice {
        return app(Notice::class);
    }
}
