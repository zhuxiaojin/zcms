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

class RolesComposer
{
    protected $repository;

    public function __construct(RoleRepository $role) {
        $this->repository = $role;
    }

    public function compose(View $view) {
        $roles = $this->repository->all();
        $view->with('roles', $roles);
    }
}
