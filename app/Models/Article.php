<?php

namespace App\Models;

use App\ES\SourceIndexConf;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title 标题
 * @property string $body 内容
 * @property int $user_id 发布人
 * @property \Illuminate\Support\Carbon|null $published_at 发布时间
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUserId($value)
 * @mixin \Eloquent
 * @property int $manager_id 发布人
 * @property int $type 内容格式，1 ，markdown,2 富文本
 * @property-read \App\Models\Manager $manager
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereType($value)
 */
class Article extends Model
{
    //
    use Searchable;
    protected $fillable = ['title', 'body', 'manager_id', 'published_at', 'type'];
    protected $dates = ['published_at'];

    public function manager() {
        return $this->belongsTo(Manager::class);
    }

    public function searchableAs() {
        return 'source';
    }

    protected $indexConfigurator = SourceIndexConf::class;
    protected $searchRules = [];
    protected $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword',
                        'ignore_above' => 256
                    ]
                ]
            ],
            'body' => [
                'type' => 'text',
            ],
        ]
    ];
}
