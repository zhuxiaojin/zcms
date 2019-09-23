<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string $title 菜单名称
 * @property string|null $url 链接
 * @property string|null $class 样式
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Menu[] $children
 * @property-read \App\Models\Menu|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|\App\Models\Menu newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|\App\Models\Menu newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|\App\Models\Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUrl($value)
 * @mixin \Eloquent
 * @property int $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereOrder($value)
 * @property-read int|null $children_count
 */
class Menu extends Model
{
    use NodeTrait, SortableTrait;
    //
    protected $fillable = ['title', 'url', '_lft', '_rgt', 'class', 'parent_id','order'];
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
}
