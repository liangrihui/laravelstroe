<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/19
 * Time: 9:08
 */

namespace AvoRed\Ecommerce\Models\Database;


class Categorie extends BaseModel
{
    protected $fillable = ['parent_id','name','slug','mate_title','mata_description'];



}