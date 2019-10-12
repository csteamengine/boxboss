<?php

namespace App\Http\Middleware;

use App\Models\Facades\FeatureFlag;
use Closure;

class FeatureFlags
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $featureName
     * @return mixed
     */
    public function handle($request, Closure $next, $featureName)
    {
        if (!FeatureFlag::isActive($featureName)) {
            if (auth()->user() != null && auth()->user()->can('view backend')) {
                return redirect()->back()->withFlashWarning('You do not have access to that feature.');
            } else {
                return redirect()->back()->withFlashWarning('You do not have access to that feature.');
            }
        }

        return $next($request);
    }
}
