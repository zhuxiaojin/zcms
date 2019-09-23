<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * App\Models\Notice
 *
 * @property int $id
 * @property int $manager_id 发布人
 * @property string $title 标题
 * @property string $body 内容
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Manager $manager
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notice whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notice whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notice whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Notice whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 */
class Notice extends Model
{
    //
    use
        Notifiable {
        notify as protected laravelNotify;
    }
    protected $fillable = ['title', 'manager_id', 'body'];

    public function notify($instance) {
        // 如果要通知的人是当前用户，就不必通知了！
        if ($this->manager->id == auth('manager')->id()) {
            return;
        }
//        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }

    public function manager() {
        return $this->belongsTo(Manager::class);
    }
}
