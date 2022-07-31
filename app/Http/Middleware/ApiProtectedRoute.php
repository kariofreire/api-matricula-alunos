<?php

namespace App\Http\Middleware;

use App\Helpers\ReturnResponse;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\JWTAuth;

class ApiProtectedRoute extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = FacadesJWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            switch (true) {
                case $e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException:
                    return ReturnResponse::warning("Token inválido.");

                case $e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException:
                    return ReturnResponse::warning("Token expirado.");

                default:
                    return ReturnResponse::warning("Autorização não permitida.");
            }
        }

        return $next($request);
    }
}
