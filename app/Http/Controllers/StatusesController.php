<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Status;

class StatusesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function store(Request $request)
    {
       $this->validate($request,[
          'content'=>'required|max:140'
       ]);

       Auth::user()->statuses()->create([
          'content'=>$request->content
       ]);

       session()->flash('status','aaaa');

       return redirect()->back();
    }

    public function destroy($id)
    {
      $status=Status::find($id);
      if($status){
        $status->delete();
        session()->flash('success','删除成功!');
        return redirect()->back();
      }
    }
}
