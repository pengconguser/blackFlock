<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->with('category')->with('user')->paginate(10);
        $data     = [];
        // $data['hits'] = Article::orderBy('hits', 'desc')->paginate(5);
        return view('article.index')->withArticles($articles)->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all()->pluck('name', 'id');
        return view('article.create')
            ->withCategorys($categorys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title'   => 'required|max:40',
            'author'  => 'required',
            'content' => 'required',
        ]);

        $articles = new Article($request->all());
        $articles->save();
        session()->flash('success', '新的小博客已经创建成功！');
        return redirect('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::with('user')->findOrFail($id);
        //该方法被调用默认文章受到了一次点击.
        $article->hits++;
        $article->save(['timestamp' => false]);
        //取出该文章的所有评论
        $comments = $article->comments()->with('user')->orderBy('id', 'desc')->paginate(10);

        return view('article.show')
            ->withComments($comments)
            ->withArticle($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user  = Auth::user();
        $reult = $id == $user->id;
        $admin = $user->is_admin;
        if ($reult || $admin) {
            $article   = Article::findOrFail($id);
            $categorys = Category::all()->pluck('name', 'id');
            if ($request->get('clear')) {
                $article->content = "";
            }
            return view('article.edit')
                ->withArticle($article)
                ->withCategorys($categorys)
            ;
        } else {
            session()->flash('warning', '你没有权限编辑这篇文章');
            return redirect('/article');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        if ($article) {
            $article->title       = $request->title;
            $article->content     = $request->content;
            $article->category_id = $request->category_id;
            $article->update();
            session()->flash('success', '编辑成功!');
            return redirect('/article');
        } else {
            return redirect('/aritlce');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user    = Auth::user();
        $article = Article::find($id);
        $reult   = $article->user_id == $user->id;
        $admin   = $user->is_admin;
        if ($admin || $reult) {
            //文章关联的评论也必须全部删除
            $comments = $article->comments;
            foreach ($comments as $comment) {
                $comment->delete();
            }
            $article->delete();
            session()->flash('success', '删除成功！');
            return redirect('/article');
        } else {
            session()->flash('warning', '删除失败,可能是权限问题');
            return redirect('/article');
        }

    }

    public function show_user()
    {
        $user = Auth::user();
        return view('article.article_user')->withUser($user);

    }
}
