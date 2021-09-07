<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Check
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
        if (Auth::check()) {

            $routename = Route::currentRouteName();

            // $char = 'list';
            $char1 = 'detail';

            // if (strpos($routename, $char) !== false || strpos($routename, $char1) !== false) {
            //     return $next($request);
            // }

            // mac dinh vi tri dau tien la 0 => false
            // $pos = strpos($routename, $char);
            // if ($pos !== false) {
            //     return $next($request);
            // }
            // $pos = strpos($routename, $char1);
            // if ($pos !== false) {
            //     return $next($request);
            // }

            $user = Auth::user();
            $per = Permission::query()
                ->join('permission_role', 'permission.id', 'permission_role.id_permission')
                ->join('role', 'role.id', 'permission_role.id_role')
                ->where('id_role', $user->id_role)
                ->select('permission.*', 'permission_role.*')
                ->pluck('name')->toArray();

            if (in_array($routename, $per)) {

                // return redirect('admin/category/lis');
                return $next($request);

            } else {

                $alert = "you don't have this right";

                return redirect()->back()->with('messenger', $alert);

            }

        } else {
            $alert = "you don't have this right";

            return redirect()->back()->with('messenger', $alert);
        }

    }
}
