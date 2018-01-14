<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SearchController extends Controller
{
    public function search(Request $request)
    {
       	 $query =request()->get('q');

       	  dd($query);
       	 
         $articles =Article::where('title','like',%.$query.%)
         ->orWhere('content','like',%.$query.%)
         ->orderBy('id','desc')
         ->paginate(10);

         return $articles;
    }
}
