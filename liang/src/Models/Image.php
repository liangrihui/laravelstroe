<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/22
 * Time: 9:01
 */

namespace Liang\Models;


use AvoRed\Ecommerce\Models\Database\User;

class Image extends BaseModel
{
    protected $fillable  = ['user_id','path'];


    /*
     * 用户关联
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

}