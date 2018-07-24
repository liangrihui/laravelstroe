<?php
namespace LRH\Models;

class User extends \Illuminate\Database\Eloquent\Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}