<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Carbon::setLocale('zh');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
			require_once $filename;
		}

		foreach (glob(app_path() . '/Helpers/*/*.php') as $filename) {
			require_once $filename;
		}
	}
}
