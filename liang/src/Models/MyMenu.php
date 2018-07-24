<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/12
 * Time: 9:27
 */

namespace Liang\Models;


class MyMenu extends BaseModel
{
    protected $fillable = ['parent_id','name','route'];

    public function children()
    {
        return $this->whereParentId($this->attributes['id']);
    }

    public function whereParentId($id){
        return $this->where('parent_id','=',$id)->get();
    }

}