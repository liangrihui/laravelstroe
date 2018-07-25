<?php
namespace LRH\Models;

class User extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['id'];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        // intersect 移除任何指定 数组 或集合内所没有的数值。最终集合保存着原集合的键：
        return !!$role->intersect($this->roles)->count();
    }

}