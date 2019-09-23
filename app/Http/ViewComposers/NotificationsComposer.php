<?php
/**
 * Created by PhpStorm.
 * User: zhuxiaojin
 * Date: 2019/8/15
 * Time: 1:31 PM
 */

namespace App\Http\ViewComposers;


use App\Repositories\RoleRepository;
use Illuminate\View\View;

class NotificationsComposer
{


    public function compose(View $view) {
        $notifications = auth('manager')->user()->unreadNotifications;
        $rows = count($notifications)?:0;
        $view->with('notifications', $notifications);
        $view->with('rows', $rows);
    }
}
