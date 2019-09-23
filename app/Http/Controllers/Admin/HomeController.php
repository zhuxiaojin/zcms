<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct() {
        $this->middleware('auth:manager');
        view()->share('title', '主页');
    }

    //
    public function index() {
        return view('admin.home.index');
    }
}
