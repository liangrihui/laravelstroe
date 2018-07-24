<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/25
 * Time: 0:10
 */

namespace LRH\Repository;


interface RoleRepositoryInterface
{
    public function all();

    public function add($name);

    public function remove();

    public function check();

}