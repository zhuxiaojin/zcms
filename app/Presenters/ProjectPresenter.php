<?php
/**
 * Created by PhpStorm.
 * User: storm 朱晓进 qhj1989@qq.com
 * Date: 2019/4/11
 * Time: 9:13 PM
 */

namespace App\Presenters;


use App\Project;
use Illuminate\Http\Request;
use Spatie\Menu\Link;
use Spatie\Menu\Menu;

class ProjectPresenter
{
    public function status(Project $project) {
        switch ($project->status) {
            case '1':
                return '审核中';
                break;
            case '2':
                return '进行中';
                break;
            case '3':
                return '已完成';
                break;
            case '4':
                return '已上线';
                break;
            default:
                return '';
        }
    }
}