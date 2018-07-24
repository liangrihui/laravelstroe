<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/24
 * Time: 23:36
 */

namespace LRH\Models;


class Permission
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}