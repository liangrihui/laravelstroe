<?php

namespace LRH;


use Illuminate\Support\ServiceProvider;
use LRH\Repository\RoleRepository;

class Provider extends ServiceProvider
{

    public function boot(){

        $this->registerResources();

    }


    public function register(){

    $this->app->alias('RoleRepositoryInterface',' LRH\Repository\RoleRepositoryInterface');

    $this->app->singleton('RoleRepositoryInterface',function (){
       return new RoleRepository();
    });
    }

    public function registerResources(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/migration');
        $this->loadViewsFrom(__DIR__.'/views','LRH');

    }

}