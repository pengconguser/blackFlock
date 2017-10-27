<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class GamesController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$user = Auth::user();
		return view('five')->withUser($user);
	}

	public function store(Request $request) {
		$user = Auth::user();
		if ($request->winner) {
			$user->mark += 100;
			$user->save();
			return redirect()->to('/game');
		}
	}
}
