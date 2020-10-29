<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;

class Website
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
        $agent = new Agent();

        $browser = $agent->browser();
        $version = $agent->version($browser);

        if($browser == 'IE' && $version < 11) {
            return redirect(url('https://browsehappy.com/.'));
        }
        
        return $next($request);


    }
}
