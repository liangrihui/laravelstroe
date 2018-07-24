<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 15:32
 */
namespace Liang\ShangPi;

interface Shangpi{

    //获取物品数量
    public function qty();

//    物品的名字
    public function name();

//    物品的价格
    public function price();

    public function id();
}