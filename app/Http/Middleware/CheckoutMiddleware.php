<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\BusinessSetting;

class CheckoutMiddleware
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
        if (BusinessSetting::valueOf('guest_checkout_active', 0) != 1) {
            if(Auth::check()){
                return $next($request);
            }
            else {
                session(['link' => url()->current()]);
                return redirect()->route('user.login');
            }
        }
        else{
            return $next($request);
        }
    }
}
