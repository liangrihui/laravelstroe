<?php

namespace Liang\Models;


class Bookmark extends BaseModel
{
    protected $fillable = ['name','url','menu_id','img'];

    public function menu(){
        return $this->hasOne(MyMenu::class,'id','menu_id');
    }

}