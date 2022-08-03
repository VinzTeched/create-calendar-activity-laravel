<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\admin\admin;
use App\Models\User;

class AuthResource
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
    /*
    if ($request->route('id')) {
        $company = admin::find($request->route('id'));
        if ($company && $company->id != Auth::user()->id) {
            return redirect(route('admin.home'))->with('wrong', 'Unable To Access Requested Page');
        }
        elseif (empty($company->id)) {
            return redirect(route('admin.home'))->with('wrong', 'Unable To Access Requested Page');
        }
    }

    if ($request->route('userid')) {
        $user = user::find($request->route('userid'));
        if ($user && $user->id != Auth::user()->id) {
            return redirect(route('home'))->with('wrong', 'Unable To Access Requested Page');
        }
        elseif (empty($user->id)) {
            return redirect(route('home'))->with('wrong', 'Unable To Access Requested Page');
        }
    }*/

    return $next($request);
}
}
