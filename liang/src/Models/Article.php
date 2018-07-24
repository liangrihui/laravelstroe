<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5
 * Time: 8:57
 */

namespace Liang\Models;


use AvoRed\Ecommerce\Models\Database\User;

class Article extends BaseModel
{
    protected $fillable = ['title','content','status','created_by','tags'];

    public function user(){
        return $this->hasOne(User::class,'id','created_by');
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function getArticleCommentAttribute(){
        return $this->comment()->count();
    }

    public function getNewCommentAttribute(){
        return $this->comment()->max('updated_at');
    }

    public function getSubContentAttribute(){

        $content = strip_tags($this->attributes['content']);
        $length = strlen($content);
        $substr = mb_substr($content,0,200,'utf-8');
        return $substr.(($length > 200) ? '...' : '');
//        return $content;
    }
    public function getTagArrayAttribute(){
        $tags = preg_split('/\s*,|，、\s*/',$this->attributes['tags']);
        return $tags;
    }


}