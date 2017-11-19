<?php

namespace App\Http\Controllers;
use Auth;

class NotificationsController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	//获取该用户所有的通知
	public function index() {
		$notifications = Auth::user()->notifications()->paginate(10);
		//该方法被调用,默认用户已经读过消息清空notification_count字段的数量
		Auth::user()->markAsRead();
		return view('notifications.index')->withNotifications($notifications);
	}
}
