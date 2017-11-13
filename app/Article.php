<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
	protected $fillable = [
		'title',
		'author',
		'user_id',
		'hits',
		'content',
		'category_id',
	];

	public function category() {
		return $this->belongsTo(\App\Category::class);
	}
	public function user() {
		return $this->belongsTo(\App\User::class);
	}
	public function comment(){
		return $this->hasMany(\App\User::class);
	}
}
