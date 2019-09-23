<?php

namespace App\Repositories;

use CrCms\Repository\AbstractRepository;
use App\Models\Article;

class ArticleRepository extends AbstractRepository
{
    protected $guard = ['title', 'body', 'manager_id', 'published_at','type'];
    /**
     * @return Article
     */
    public function newModel(): Article
    {
        return new Article();
    }
}
