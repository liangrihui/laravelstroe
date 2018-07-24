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

    public function remove(){

    }

    public function check(){

    }
}