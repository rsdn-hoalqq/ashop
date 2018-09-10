<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $arUser=Auth::user(); // lấy user vừa đăng nhập
        $useranme=$arUser->id_level;
        if(strpos($role,$useranme)===false){ // tìm kiếm 1 chuổi trong chuổi lớn
            return redirect('noaccess');
        }
        return $next($request);
    }
}
