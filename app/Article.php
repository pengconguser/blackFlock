<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=[
           'title',
           'author',
           'usrs_id',
           'hits',
           'content',
    ];
}
