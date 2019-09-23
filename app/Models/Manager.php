<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Manager
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $old_token 上次登录jwt token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $avatar
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager whereOldToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Manager onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Manager whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Manager withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Manager withoutTrashed()
 * @property-read int|null $notifications_count
 * @property-read int|null $permissions_count
 * @property-read int|null $roles_count
 */
class Manager extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getAvatarAttribute() {
//        if (empty($avatar)) {
            $word = app('pinyin')->sentence($this->name);
            return \Avatar::create($word)->toBase64();
//        }
//        return $avatar;
    }
}
