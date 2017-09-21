<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home(){
    	 return view('/home');
    }
    public function help(){
    	return view('/help');
    }
    public function about(){
    	return view('/about');
    }
}
