<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/30
 * Time: 16:33
 */

namespace Liang\Models;


class LiverKidney extends BaseModel
{

    protected $fillable = ["KF","TP", "user_id","G","ALB","AST", "ALT","STB","DBIL","CHE","Scr","Urea","SUA","CysC","CHOL","eGFR",'check_time'];
}