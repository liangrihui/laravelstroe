<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 17:10
 */

namespace Liang\ShangPi;


use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    protected $defer = true;


    public function boot(){

    }

    public function register(){
        $this->app->alias('shangpi','Liang\ShangPi\Manager');
        $this->app->singleton('shangpi',function($app){
            return new Manager();
        });

    }

    public function provides()
    {
        return ['shangpi','Liang\ShangPi\Manager'];
    }
}