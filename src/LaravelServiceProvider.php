<?php

namespace Abellion\Cors;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
	public function boot(Kernel $kernel)
	{
		$kernel->pushMiddleware(Middleware\OriginsMiddleware::class);
		$kernel->pushMiddleware(Middleware\OptionsMiddleware::class);
	}

	public function register()
	{
	}
}
