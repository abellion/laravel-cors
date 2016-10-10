<?php

namespace Abellion\Cors;

use Illuminate\Support\ServiceProvider;

class LumenServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->app['router']->pushMiddleware(Middleware\OptionsMiddleware::class);
		$this->app['router']->pushMiddleware(Middleware\OriginsMiddleware::class);
	}

	public function register()
	{
	}
}
