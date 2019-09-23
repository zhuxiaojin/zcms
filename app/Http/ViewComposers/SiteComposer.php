<?php
/**
 * Created by PhpStorm.
 * User: zhuxiaojin
 * Date: 2019/8/15
 * Time: 1:31 PM
 */

namespace App\Http\ViewComposers;


use App\Models\Site;
use Illuminate\View\View;

class SiteComposer
{
    protected $site;

    public function __construct(Site $site) {
        $this->site = $site;
    }

    public function compose(View $view) {
        $site = $this->site->first();
        $view->with('site', $site);
    }
}
