<?php

namespace App\Repositories;

use App\Models\Site;
use CrCms\Repository\AbstractRepository;

/**
 * Class SiteRepository
 * @package App\Repositories
 */
class SiteRepository extends AbstractRepository
{
    public $guard = ['url', 'title', 'keywords', 'description', 'num'];

    /**
     * @return Site
     */
    public function newModel(): Site {
        return app(Site::class);
    }
}
