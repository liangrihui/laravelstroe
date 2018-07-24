<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/24
 * Time: 23:34
 */

namespace LRH\Models;


class Role
{

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // $role = Role::first(); $p = Permission::first();
    // $role->givePermission($p);
    public function givePermission(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }


}