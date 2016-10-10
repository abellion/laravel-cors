<?php

namespace Abellion\Cors\Middleware;

use Illuminate\Http\Request;

class OriginsMiddleware
{
	/**
	 * Origins patterns
	 *
	 * @var array
	 */
	public static $ORIGINS = [
		"/.+/"
	];

	/**
	 * Get the origin depending of the conf
	 *
	 * @param  Request $request
	 * @return mixed
	 */
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

    /**
     * Add the `Access-Control-Allow-Origin` if the origin match one of the patterns
     *
     * @param  Request  $request
     * @param  \Closure $next
     * @return Illuminate\Http\Response
     */
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
