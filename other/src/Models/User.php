<?php
namespace LRH\Models;

class User extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['id'];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}