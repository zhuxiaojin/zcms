<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Site
 *
 * @property int $id
 * @property string|null $url 网站域名
 * @property string|null $title 网站标题
 * @property string|null $keywords 网站关键字
 * @property string|null $description 网站描述
 * @property string|null $num 备案号
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUrl($value)
 * @mixin \Eloquent
 */
class Site extends Model
{

    //
    protected $fillable = ['url','title','keywords','description','num'];


}
