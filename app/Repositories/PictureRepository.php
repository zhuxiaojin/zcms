<?php

namespace App\Repositories;

use App\Modles\Picture;
use CrCms\Repository\AbstractRepository;

/**
 * Class PictureRepository
 * @package App\Repositories
 */
class PictureRepository extends AbstractRepository
{
    protected $scenes = [
        'create' => ['title', 'body']
    ];
    protected $guard = ['title', 'body'];

    /**
     * @return Picture
     */
    public function newModel(): Picture {
        return app(Picture::class);
    }
}
