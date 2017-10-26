<?php

namespace App\Http\Controllers;

use App\Status;
use Auth;
use Illuminate\Http\Request;

class StatusesController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function store(Request $request) {
		$this->validate($request, [
			'content' => 'required|max:140',
		]);

		Auth::user()->statuses()->create([
			'content' => $request->content,
		]);

		session()->flash('success', '添加成功!');

		return redirect()->back();
	}

	public function destroy($id) {
		$status = Status::find($id);
		if ($status) {
			$status->delete();
			session()->flash('success', '删除成功!');
			return redirect()->back();
		}
	}
}
