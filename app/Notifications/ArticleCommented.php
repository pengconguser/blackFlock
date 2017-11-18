<?php

namespace App\Notifications;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleCommented extends Notification {
	use Queueable;

	public $comment;
	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct(Comment $comment) {
		$this->comment = $comment;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable) {
		return ['database'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toDatabase($notifiable) {
		$article = $this->comment->article;

		//return json
		return [
			'comment_id' => $this->comment->id,
			'comment_content' => $this->comment->body,
			'user_id' => $this->comment->user->id,
			'user_name' => $this->comment->user->name,
			'user_avatar' => $this->comment->user->avatar,
			'article_id' => $article->id,
			'article_title' => $article->title,
		];
	}
}
