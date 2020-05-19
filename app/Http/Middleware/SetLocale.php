<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $langs = explode(',', env('MIX_APP_I18N_SUPPORTED_LOCALE'));
//        dd('ddd');
        $locale = $request->segment(2);
//        if (!array_search($locale, $langs)) {
//            $locale = 'en';
//        }
        app()->setLocale($locale);
        return $next($request);
    }
}
