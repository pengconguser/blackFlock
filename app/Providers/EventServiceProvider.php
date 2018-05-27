<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider {
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		// 'App\Events\Event' => [
		// 	'App\Listeners\EventListener',
		// ],
		'App\Comment' => [
			'App\Observer\CommentObserver',
		],
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot() {
		parent::boot();

		Event::listen('laravels.received_request', function (\Illuminate\Http\Request $req, $app) {
			    $req->query->set('get_key', 'peng');// 修改querystring
			    $req->request->set('post_key', 'peng'); // 修改post body
		});

		Event::listen('laravels.generated_response', function (\Illuminate\Http\Request $req, \Symfony\Component\HttpFoundation\Response $rsp, $app) {
			    $rsp->headers->set('header-key', 'peng');// 修改header
		});
	}
}
