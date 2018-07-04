<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    protected $fillable = [
    	  'chat_id',
    	  'content',
    	  'user_id',
    ];

    public function chat()
    {
        return $this->belongsTo(\App\Chat::class);
    }

    public function user()
    {
    	return $this->belongsTo(\App\User::class);
    }
}
