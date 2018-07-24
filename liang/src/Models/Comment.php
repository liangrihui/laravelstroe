<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6
 * Time: 20:47
 */

namespace Liang\Models;


use AvoRed\Ecommerce\Models\Database\User;

class Comment extends BaseModel
{
    protected $fillable = ['status','content','user_id','article_id','url','email'];

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }


}