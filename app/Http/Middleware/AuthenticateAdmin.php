<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Fetch user data
        $admin = Auth::guard('panel')->user();
        // Check if the user is authenticated
        if( ! $admin ) { // Not Authenticated admin User
            return redirect()
                    ->route('admin.login')
                    ->with('error', 'Only admin users can access the control panel');
        }
        // Check if user is an admin [group_id == 1] and not prevented form accessing the control panel
        if ($admin->group_id != 1 || $admin->approvent != 1) {
            abort(403, 'Unautherized Access.');
        }
        // If Authenticated User
        return $next($request);
    }
}
