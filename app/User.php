<?php

namespace App;

use App\Status;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable {
		notify as protected laravelNotify;
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'avatar',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function gravatar($avatar) {
		if ($avatar) {
			return $avatar;
		} else {
			return "https://fsdhubcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png";
		}
	}

	public function statuses() {
		return $this->hasMany(Status::class);
	}

	public function feed() {
		$user_ids = Auth::user()->followings->pluck('id')->toArray();
		array_push($user_ids, Auth::user()->id);

		return Status::whereIn('user_id', $user_ids)
			->with('user')
			->orderBy('created_at', 'desc');
	}

	//当前模型用户被谁关注了
	public function followers() {
		return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
	}
	//当前模型用户关注的人有谁
	public function followings() {
		return $this->belongsToMany(User::Class, 'followers', 'follower_id', 'user_id');
	}

	//关注的逻辑
	public function follow($user_ids) {
		if (!is_array($user_ids)) {
			$user_ids = compact('user_ids');
		}
		$this->followings()->sync($user_ids, false);
	}

	//取消关注的逻辑
	public function unfollow($user_ids) {
		if (!is_array($user_ids)) {
			$user_ids = compact('user_ids');
		}
		$this->followings()->detach($user_ids);
	}

	public function isFollowing($user_id) {
		return $this->followings->contains($user_id);
	}
	public function comments() {
		return $this->hasMany(\App\Comment::class);
	}
	public function articles() {
		return $this->hasMany(\App\Article::class);
	}
	public function notify($instance) {
		// 如果要通知的人是当前用户，就不必通知了！
		if ($this->id == Auth::id()) {
			return;
		}
		$this->increment('notification_count');
		$this->laravelNotify($instance);
	}

	public function isAuthorOf($model) {
		return $this->id == $model->user_id;
	}

}
