<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    //
    public function allRead() {
        auth('manager')->user()->unreadNotifications->markAsRead();
        return back();
    }

    public function index() {
    }
}
