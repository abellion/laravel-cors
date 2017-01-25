<?php

namespace Abellion\Cors\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OptionsMiddleware
{
	/**
	 * Headers to add to requests
	 *
	 * @var array
	 */
	public static $OPTIONS = [
		"Access-Control-Allow-Methods" => "POST, PUT, DELETE, GET, OPTIONS, PATCH, HEAD",
		"Access-Control-Allow-Headers" => "Location, Content-Type, Accept, Authorization"
	];

    /**
     * Add the options headers and handle preflight requests
     *
     * @param  Request  $request
     * @param  \Closure $next
     * @return Illuminate\Http\Response
     */
	public function handle(Request $request, \Closure $next)
	{
		try {
		    $response = $next($request);
		} catch (HttpException $e) {
			if ($request->isMethod('OPTIONS')) {
			    $response = new Response();
			} else {
				throw $e;
			}
		}

	    $response->headers->add(self::$OPTIONS);

	    if ($request->isMethod('OPTIONS')) {
	    	return $response->setContent('OK')->setStatusCode(200);
	    } else {
	    	return $response;
	    }
	}
}
