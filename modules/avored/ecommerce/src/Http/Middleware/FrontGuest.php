<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/18
 * Time: 11:09
 */

namespace AvoRed\Ecommerce\Http\Middleware;



use Closure;

class FrontGuest
{
    public function handle($request,Closure $next){

    return $next($request);
    }

}