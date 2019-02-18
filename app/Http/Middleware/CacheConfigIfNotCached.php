<?php

namespace FleetCart\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Artisan;

class CacheConfigIfNotCached
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

        if ($this->shouldCache()) {
            Artisan::call('config:cache');
        }

        return $response;
    }

    private function shouldCache()
    {
        return ! app()->environment('local') && ! app()->configurationIsCached();
    }
}
