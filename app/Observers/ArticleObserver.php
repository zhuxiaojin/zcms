<?php

namespace App\Observers;

use App\Events\ArticleEvent;
use App\Models\Article;
use App\Notifications\ArticleNotification;
use App\Repositories\ManagerRepository;

class ArticleObserver
{
    protected $manager_repository;

    public function __construct() {
        $this->manager_repository = new ManagerRepository();
    }

    //创建文章触发
    public function created(Article $article) {
        event(new ArticleEvent($article));
        $managers = $this->manager_repository->where('id', '!=', auth('manager')->id())->get();
        foreach ($managers as $manager) {
            $manager->notify(new ArticleNotification($article));
        }
    }
}
