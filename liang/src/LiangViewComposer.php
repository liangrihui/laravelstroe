<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 9:35
 */

namespace Liang;


use Illuminate\View\View;
use Liang\Models\Tag;

class LiangViewComposer
{
    public function compose(View $view){
        $tas = new Tag();
        $tags = $tas->allTag()->shuffle();
        $avg =$tas->tagtunVag();

        $view->with('tags',$tags)->with('avg',$avg);
    }

}