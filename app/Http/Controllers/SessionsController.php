<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {

    }
    public function create()
    {
        return view('sessions.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|max:50',
            'password' => 'required',
        ]);
        $credent = [
            'email'    => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credent,$request->has('remember'))) {
              session()->flash('success','欢迎回来!');
              return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger','很抱歉你的邮箱和密码不匹配');
            return redirect()->back();
        }

    }
    public function destroy()
    {
        Auth::logout();
        session()->flash('success','您已成功退出');
        return redirect('login');
    }
}
