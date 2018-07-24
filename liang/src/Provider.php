<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 17:10
 */

namespace Liang;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{



    public function boot()
    {

        $this->registerResources();

        View::composer('Liang::articles.right',LiangViewComposer::class);
        View::composer('Liang::adminlte.*',LiangAdminComposer::class);
        View::composer('Liang::bodys.*',LiangCheckComposer::class);

    }

    public function register(){
        App::register(\Liang\ShangPi\Provider::class);
    }

    public function registerResources(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/views','Liang');

    }




}


