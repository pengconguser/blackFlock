<?php

namespace App\Observer;

use App\Comment;
use App\Notifications\ArticleCommented;

class CommentObserver {
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */

	/**
	 * Handle the event.
	 *
	 * @param  Comment  $event
	 * @return void
	 */
	public function created(Comment $comment) {
		$article = $comment->article;

		// 如果评论的作者不是话题的作者，才需要通知
		if (!$comment->user->isAuthorOf($article)) {
			$article->user->notify(new ArticleCommented($comment));
		}
	}
}
