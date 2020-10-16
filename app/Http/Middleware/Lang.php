<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Config;
use Illuminate\Http\Request;
use Session;

class Lang
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
        if (!Session::has('locale')) {
            Session::put('locale', Config::get('app.locale'));
        }
        App::setLocale(session('locale'));
        return $next($request);
    }
}
