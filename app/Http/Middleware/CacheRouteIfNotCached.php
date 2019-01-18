<?php

namespace FleetCart\Http\Middleware;

use Closure;
use Modules\Support\Locale;
use Illuminate\Support\Facades\Artisan;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CacheRouteIfNotCached
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($this->shouldCache($request)) {
            $this->setSupportedLocales($request);

            Artisan::call('route:trans:cache');
        }

        return $response;
    }

    private function shouldCache($request)
    {
        if ($request->is('install/*')) {
            return false;
        }

        return ! app()->environment('local') && ! app()->routesAreCached();
    }

    private function setSupportedLocales($request)
    {
        if (! is_array($request->supported_locales)) {
            return;
        }

        LaravelLocalization::setSupportedLocales(
            $this->getSupportedLocales($request)
        );
    }

    private function getSupportedLocales($request)
    {
        $supportedLocales = [];

        foreach ($request->supported_locales as $locale) {
            $supportedLocales[$locale]['name'] = Locale::name($locale);
        }

        return $supportedLocales;
    }
}
