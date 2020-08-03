<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class LoginPeriod
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
        $date = Carbon::parse('2020-08-02');

        if(now() > $date)
        {
            return redirect('/unit')->with('message','You are not allow to create unit during these days');
        }

        return $next($request);
    }
}
