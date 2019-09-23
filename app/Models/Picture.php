<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

/**
 * App\Modles\Picture
 *
 * @property int $id
 * @property string $title 相册标题
 * @property string $body 相册简介
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture whereHasMedia($tags, $match_all = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture whereHasMediaMatchAll($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture withMedia($tags = array(), $match_all = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modles\Picture withMediaMatchAll($tags = array())
 * @property-read \Illuminate\Database\Eloquent\Collection|\Plank\Mediable\Media[] $media
 * @property-read int|null $media_count
 */
class Picture extends Model
{
    //
    use Mediable;
    protected $fillable = ['title', 'body'];



}
