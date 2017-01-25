<?php

namespace Abellion\Cors;

use Illuminate\Support\ServiceProvider;

class LumenServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->app->middleware([
			Middleware\OriginsMiddleware::class,
			Middleware\OptionsMiddleware::class
		]);
	}

	public function register()
	{
	}
}
