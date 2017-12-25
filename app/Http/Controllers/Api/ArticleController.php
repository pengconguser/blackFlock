<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function commend(Request $request)
    {
        $articles = Article::orderBy('hits', 'desc')->take(3)->get();
        foreach($articles as $article){
        	 $article->description=$article->description();
        }
        return $articles;
    }
}
