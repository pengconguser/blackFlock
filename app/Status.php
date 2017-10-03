<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Status extends Model
{
    protected $fillable = [
        'content', 
        'user_id', 
    ];
    
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
