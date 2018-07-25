<?php

namespace LRH\Repository;

use LRH\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        return Role::all();
    }

    public function add($name)
    {
        $role = new Role();
        $role->name = $name;
        return $role->save();
    }

    public function addUserRole($user,$role)
    {
        //// 从指定用户中移除角色...
        //   $user->roles()->detach($roleId);

        // 从指定用户移除所有角色...
        //   $user->roles()->detach();
        //更新
        //$user->roles()->updateExistingPivot($roleId, $attributes);
        //$user->roles()->attach($roleId);
        return $user->roles()->save($role);
    }

    public function remove(){

    }

    public function check(){

    }
}