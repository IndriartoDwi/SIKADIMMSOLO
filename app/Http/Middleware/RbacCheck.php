<?php

namespace App\Http\Middleware;

use App\Model\MenuRole;
use Closure;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class RbacCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $slug, $action_id = 1)
    {
        // return $request->all();
        $check = $this->rbacCheck($slug, $action_id);
        if ($check == false)
            abort(403, 'Access Forbidden');
        return $next($request);
    }

    function rbacCheck($slug, $action_id)
    {
        $role_id = session('role_id');
        // $menu_id = Crypt::decryptString($menu_id);
        $check = MenuRole::where([
            'role_id' => $role_id,
            // 'menu_id' => $menu_id,
            'action_id' => $action_id,
        ])->whereHas('menu', function ($query) use ($slug) {
            $query->where('slug_name', $slug);
        })->first();

        if (empty($check)) {
            return false;
        }

        return true;
    }
}
