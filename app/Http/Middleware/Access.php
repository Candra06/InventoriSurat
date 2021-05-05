<?php

namespace App\Http\Middleware;

use App\Helpers\Helper;
use Closure;

class Access
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
        if(Helper::AccessMenu()) {
            return redirect('/access/block');
        } else if(Helper::AccessSubmenu()) {
            return redirect('/access/block');
        }
        
        return $next($request);
    }
}
