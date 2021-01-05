<?php

namespace App\Http\Middleware;

use Closure;

class CustomerAuth
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
        $customer = \App\Customer::where('api_token', $request->header('Authorization'))->first();

        if($request->header('Authorization') === $customer->api_token) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Not valid Api Request'
        ]);
    }
}
