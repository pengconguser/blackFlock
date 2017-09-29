<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
         $this->middleware('auth', [            
            'except' => ['show', 'create', 'store','index']
        ]);
          $this->middleware('is_admin', [            
            'except' => ['show', 'create', 'store','index','edit','update']
        ]);
    }
    public function index()
    {
         $users = User::paginate(10);
         return view('user.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name'     => 'required|min:3|max:50',
            'email'    => 'required|email|unique:users|max:255',
            'password' => 'confirmed',
        ]);

        $user           = new User($request->all());
        $user->password = bcrypt($user->password);
        $user->save();
        $id = $user->id;

        Auth::login($user);
        session()->flash('success', '恭喜你注册成功');
        return redirect()->route('users.show', [$id]);
    }
    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $users=User::find($id);
        if($users){
            $this->authorize('update', $users);
             return view('user.edit')->withUsers($users);
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
        $user=User::find($id);
        $this->validate($request,[
           'name'=>'required|max:50',
           'password' => 'nullable|confirmed|min:6',
        ]);

        $this->authorize('update', $user);
        if($request->password){
        $user->password=bcrypt($request->password);
          }
        $user->name=$request->name;
        $user->update();
          
        session()->flash('success','恭喜你,资料修改成功');
        return redirect()->route('users.show',$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if($user){
            $user->delete();
            return redirect()->to('/users');
        }
    }
}
