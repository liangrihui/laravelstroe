<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 16:42
 */

namespace Liang\ShangPi;


class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
//        parent::getFacadeAccessor(); // TODO: Change the autogenerated stub
        return 'shangpi';
    }

}