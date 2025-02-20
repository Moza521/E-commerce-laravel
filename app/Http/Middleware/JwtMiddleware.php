<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
       try {
       $user = JWTAuth::parseToken()->authenticate();
    } catch (Exception $e) {
        if ($e instanceof TokenInvalidException) {
            return response()->json(['status' => 'Token is Expired']);
        } else {
        return response()->json(['status' => 'Authorization Token not found']);
        }
    }
    return $next($request);
    }

}
