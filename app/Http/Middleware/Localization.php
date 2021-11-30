<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('locale')){
            $currentLocale= Session::get('locale');//get saved session locale value
            // App::setLocale($currentLocale); // set app localization with locale value session
            app()->setLocale($currentLocale); // you can use it as getLocale() rather than to check session in your process
            Carbon::setLocale($currentLocale); //set carbon localization for date/time system with locale value session
        }
        else{
           $appLocale = session('locale', config('app.locale')); // set session locale with app localization setting & return the locale value
            // App::setLocale($appLocale); // set app localization with locale value session
            app()->setLocale($appLocale);  // you can use it as getLocale() rather than to check session in your process
            Carbon::setLocale($appLocale);//set carbon localization with current app localization configuration
        }
        return $next($request);
    }
}

