<?php
/**
 * Created by PhpStorm.
 * User: JHC
 * Date: 2018-07-31
 * Time: 15:07
 */

namespace App\Http\Middleware;


class MustBeAdmin
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        // 验证是否是后台管理员

        return $next($request);
    }
}