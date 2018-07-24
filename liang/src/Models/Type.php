<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/17
 * Time: 10:22
 */

namespace Liang\Models;


class Type extends BaseModel
{
    protected $fillable = ['name'];

    public function bookmark(){
        return $this->belongsTo(Bookmark::class);
    }
}