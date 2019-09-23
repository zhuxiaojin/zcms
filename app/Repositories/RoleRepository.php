<?php

namespace App\Repositories;

use CrCms\Repository\AbstractRepository;
use Spatie\Permission\Models\Role;

/**
 * Class RoleRepository
 * @package App\Repositories
 */
class RoleRepository extends AbstractRepository
{
    public $guard = ['name', 'title', 'guard_name'];

    /**
     * @return Role
     */
    public function newModel(): Role {
        return app(Role::class);
    }

    /**
     * @param $role 查找满足条件的用户
     * @param string $keywords
     * @param int $page_size
     * @return mixed
     */
    public function members($role, $keywords = '', $page_size = 15) {
        return $this->findByInt($role->id)->users()->when($keywords, function ($query) use ($keywords) {
            $query->where('name', 'like', '%' . $keywords . '%')->orWhere('email', 'like', '%' . $keywords . '%');
        })->with(['media', 'roles'])->paginate($page_size);
    }
}
