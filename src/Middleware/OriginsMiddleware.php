<?php

namespace Abellion\Cors\Middleware;

use Illuminate\Http\Request;

class OriginsMiddleware
{
	public static $ORIGINS = [
		"/.+/"
	];

    private function getOrigin(Request $request)
    {
    	$origin = $request->headers->get('Origin');

    	foreach (self::$ORIGINS as $allowedOrigin) {
    		if (preg_match_all($allowedOrigin, $origin) === 1) {
    			return $origin;
    		}
    	}

    	return null;
    }

	public function handle(Request $request, \Closure $next)
	{
	    $response = $next($request);

	    if (($origin = $this->getOrigin($request))) {
		    $response->headers->add([
		    	"Access-Control-Allow-Origin" => $origin
		    ]);
	    }

	    return $response;
	}
}
