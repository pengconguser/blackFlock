<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query    = $request->get('q');
        $articles = Article::where('title', 'like', '%' . $query . '%')
            ->orWhere('content', 'like', '%' . $query . '%')
            ->orderBy('id', 'desc')
            ->get();

        $total   = count($articles);
        $perPage = 10;
        if (request()->has('page')) {
            $current_page = request()->get('page');
            $current_page = $current_page <= 0 ? 1 : $current_page;
        } else {
            $current_page = 1;
        }
        $item     = $articles->slice(($current_page - 1) * $perPage, $perPage);
        $articles = new LengthAwarePaginator($item, $total, $perPage, null, [
            'path'     => url()->full(),
            'pageName' => 'page',
        ]);

        return view('article.search')
            ->withArticles($articles);
    }
}
