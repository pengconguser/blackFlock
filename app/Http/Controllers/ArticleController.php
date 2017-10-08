<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;

class ArticleController extends Controller
{
    public function __construct(){
            $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy('created_at','desc')->paginate(10);
        $data=[];
        $data['hits']=Article::orderBy('hits','desc')->paginate(5);
        return view('article.index')->withArticles($articles)->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required|max:20',
            'author'=>'required',
            'content'=>'required',
        ]);

        $articles= new Article($request->all());
        $articles->save();
        session()->flash('success','新的小博客已经创建成功！');
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
        $article=Article::find($id);
            if($article->hits)
            {  
            $hit=$article->hits;          //该方法被调用默认文章受到了一次点击.
            $hit++;
            $article->hits=$hit;
            $article->update();
            } 
        return view('article.show')->withArticle($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user=Auth::user();
         $reult=$id==$user->id;
         $admin=$user->is_admin;
          if($reult || $admin)
          {
             $article=Article::find($id);
             return view('article.edit')->withArticle($article);
          }
          else
          {
            session()->flash('warning','你没有权限编辑这篇文章');
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
        $article=Article::find($id);
        if($article)
        {
          $article->title=$request->title;
          $article->content=$request->content;
          $article->update();
          session()->flash('success','编辑成功!');
          return redirect('/article');
        }else
        {
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
         $user=Auth::user();
         $article=Article::find($id);
         $reult=$article->user_id==$user->id;
         $admin=$user->is_admin;
         if($admin || $reult)
         {
            $article->delete();
            session()->flash('success','删除成功！');
            return redirect('/article');
         }
         else
         {
            session()->flash('warning','删除失败,可能是权限问题');
            return redirect('/article');
         }

    }
}
