<?php
/**
 * Created by PhpStorm.
 * User: JHC
 * Date: 2018-09-06
 * Time: 14:43
 */

namespace App\Http\Middleware;

class EnvCheck
{


    public function handle($request, \Closure $next, $guard = null)
    {

        // 环境检测
        if (app()->environment() !== 'production') {

            if (!\Auth::check()) {
                \Auth::loginUsingId(10486);
            }

        }

        return $next($request);
    }
}