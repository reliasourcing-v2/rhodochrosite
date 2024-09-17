<?php

namespace App\Http\Middleware;

use App\Models\CmsPage;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmsApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        view()->share('api_keys', CmsPage::where('slug', 'api_keys')->first());

        return $next($request);
    }
}
