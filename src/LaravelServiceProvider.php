<?php

namespace Abellion\Cors;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
	public function boot(Kernel $kernel)
	{
		$kernel->pushMiddleware(Middleware\OptionsMiddleware::class);
		$kernel->pushMiddleware(Middleware\OriginsMiddleware::class);
	}

	public function register()
	{
	}
}
