<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ArticleNotification extends Notification
{
    use Queueable;
    public $article;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Article $article) {
        //
        $this->article = $article;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            //
            'id' => $this->article->id,
            'title' => $this->article->title,
            'created_at' => $this->article->created_at->toDateTimeString(),
        ];
    }
}
