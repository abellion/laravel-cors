<?php

namespace Abellion\Cors\Middleware;

use Illuminate\Http\Request;

class OptionsMiddleware
{
	public static $OPTIONS = [
		"Access-Control-Allow-Methods" => "POST, PUT, DELETE, GET, OPTIONS, PATCH, HEAD",
		"Access-Control-Allow-Headers" => "Location, Content-Type, Accept, Authorization"
	];

	public function handle(Request $request, \Closure $next)
	{
	    $response = $next($request);

	    $response->headers->add(self::$OPTIONS);

	    if ($request->isMethod('OPTIONS')) {
	    	return $response->setContent('OK')->setStatusCode(200);
	    } else {
	    	return $response;
	    }
	}
}
