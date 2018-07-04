<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable=[
    	 'name',
    	 'userIds',
    	 'lastMassage',
    ];

    public function massages()
    {
    	return $this->hasMany(\App\Massage::class);
    }
}
