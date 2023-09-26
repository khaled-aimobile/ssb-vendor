<?php

namespace App\Http\Middleware;

use Closure;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;

class JwtAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $token = JWTAuth::getToken();
            JWTAuth::checkOrFail($token);
            $response = $next($request);
            return $response;
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                return abort(403);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['message' => 'Invalid token'], 401);
        }catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['message' => 'Invalid token'], 401);
        }
    }
}