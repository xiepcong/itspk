<?php

namespace App\Http\Middleware;

use App\Common\Auth\JwtAuth;
use App\Common\Err\ApiErr;
use App\Exceptions\ApiException;
use App\Http\Response\ResponseJson;
use Closure;

class JwtMiddleware
{
    use ResponseJson;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->input('token');
        if ($token) {
            $jwt = JwtAuth::getInstance();
            $jwt->setToken($token);

            if ($jwt->validate() && $jwt->verify()) {
                return $next($request);
            }
            throw new ApiException(ApiErr::ERR_EXPIRE);
        }
        throw new ApiException(ApiErr::ERR_PARAMS);
    }
}
