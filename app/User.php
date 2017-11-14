<?php

namespace App;

use App\Status;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

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

	public function gravatar($id) {
		// $hash = md5(strtolower(trim($this->attributes['email'])));
		// return "http://www.gravatar.com/avatar/$hash?s=$size";
		$user = User::findOrFail($id);
		if ($user->avatar) {
			return $user->avatar;
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
}
