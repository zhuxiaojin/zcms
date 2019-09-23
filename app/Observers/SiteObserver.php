<?php

namespace App\Observers;

use App\Models\Site;

class SiteObserver
{
    /**
     *  检查是否上传了ico和png
     */
    public function saved(Site $site) {
//        dd(request()->file('ico')->getClientOriginalExtension());
        if (request()->file('ico')) {
//        dd($site);
            $site->addMedia(request()->file('ico'))->toMediaCollection('ico');
        }
    }
}
