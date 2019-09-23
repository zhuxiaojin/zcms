<?php

namespace App\Observers;


class MenuObserver
{
    /**
     * 同步删除缓存menus
     */
    public function saved() {
        \Cache::delete('menus');
    }

    public function created() {
        \Cache::delete('menus');
    }

    public function deleted() {
        \Cache::delete('menus');
    }
}
