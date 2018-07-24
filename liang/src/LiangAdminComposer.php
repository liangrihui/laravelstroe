<?php
namespace Liang;

use AvoRed\Ecommerce\Models\Database\User;

class LiangAdminComposer
{
    public function compose(\Illuminate\View\View $view){
        $menu = \Liang\Models\MyMenu::where('parent_id','=',null)->get();

        $all  = \Liang\Models\MyMenu::get();

//        dd($menu);
        $view->with('menu',$menu)->with('allmenu',$all);
    }

}