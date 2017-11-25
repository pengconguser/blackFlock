<?php

namespace App\Http\Controllers;

use App\Comment;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\CommentRequest $request)
    {
        $comment             = new Comment($request->all());
        $comment->user_id    = $request->user_id;
        $comment->article_id = $request->article_id;
        $comment->save();
        session()->flash('success', '回复成功！');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment         = Comment::findOrFail($id);
        $user            = Auth::user();
        $comment_user_id = $comment->user_id;
        $result          = $comment_user_id == $user->id;
        $admin           = $user->is_admin;
        if ($result || $admin) {
            $comment->delete();
            session()->flash('success', '删除成功!');
            return redirect()->back();
        } else {
            session()->flash('danger', '您没有权限删除这篇评论！');
            return redirect()->back();
        }
    }
}
