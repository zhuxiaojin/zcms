<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name 产品名称
 * @property string $body 产品简介
 * @property float $price 价格
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $type 内容格式，1 markdown,2 富文本
 * @property-read \Illuminate\Database\Eloquent\Collection|\Plank\Mediable\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereHasMedia($tags, $match_all = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereHasMediaMatchAll($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product withMedia($tags = array(), $match_all = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product withMediaMatchAll($tags = array())
 * @mixin \Eloquent
 */
class Product extends Model
{
    //
    use Mediable;
    protected $fillable = ['name', 'body', 'price', 'cover'];
    protected $appends = ['cover'];

    public function getCoverAttribute() {
        if (null !== $this->getMedia('pictures')->first()) {
            return $this->getMedia('pictures')->first()->getUrl();
        }
        return '';
    }


}
