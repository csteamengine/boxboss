<?php

namespace App\Http\Middleware;

use App\Models\Facades\FeatureFlag;
use Closure;

class FeatureFlags
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $featureName)
    {
        if(auth()->user() == null && !FeatureFlag::isActive($featureName)){
            return redirect()->route('frontend.index')->withFlashError('You do not have access to that feature.');
        }
        if(!auth()->user()->isAdmin() && !FeatureFlag::isActive($featureName)){
            return redirect()->route('admin.dashboard')->withFlashWarning('You do not have access to that feature.');
        }
        return $next($request);
    }
}
