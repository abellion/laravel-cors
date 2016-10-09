<?php

namespace Abellion\Cors;

use Illuminate\Support\ServiceProvider;

class LumenServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->app->middleware([
			Middleware\OptionsMiddleware::class,
			Middleware\OriginsMiddleware::class
		]);
	}

	public function register()
	{
	}
}
