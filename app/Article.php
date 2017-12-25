<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'author',
        'user_id',
        'hits',
        'content',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

    public function description()
    {
        return $this->description ? $this->description : str_limit(strip_tags($this->content), 100);
    }
}
