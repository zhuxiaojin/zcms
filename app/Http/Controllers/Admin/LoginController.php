<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class LoginController
 * @package App\Http\Controllers\Admin
 * @author 朱晓进
 * @email qhj1989@qq.com
 * 2019/8/8
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * @var string
     */
    protected $redirectTo = '/admin/home';
    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    protected $username;

    /**
     * LoginController constructor.
     */
    public function __construct() {
//        $this->middleware('guest')->except('logout');
        $this->username = config('admin.global.username');
    }
    //

    /**
     * @name:loginForm
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author:Storm 朱晓进 <qhj1989@qq.com>
     */
    public function loginForm() {
        if (auth('manager')->check()){
            return redirect($this->redirectTo);
        }
        return view('admin.login.login_form');
    }

    /**
     * @name:login
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author:Storm 朱晓进 <qhj1989@qq.com>
     */
    public function login(LoginRequest $request) {
        $data = $request->only(['email', 'password']);
        if (auth('manager')->attempt($data, $request->has('remember'))) {
            return redirect($this->redirectTo);
        }
        return back()->withInput()->withErrors(['email' => '用户名或密码错误']);
    }

    public function logout() {
        $this->guard()->logout();
        return redirect(route('admin.login'));
    }

    /**
     * @name:guard
     * @return mixed
     * @author:Storm 朱晓进 <qhj1989@qq.com>
     */
    protected function guard() {
        return auth()->guard('manager');
    }
}
