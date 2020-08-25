<?php

namespace App\Http\Middleware;

use Closure;
use App;

class SetLocale
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
        if(session('locale'))
        {
            $locale = session('locale');
        }else{
            $locale = 'en';
            session(['locale' => 'en']);
        }

        \App::setLocale($locale);

        return $next($request);
    }
}
