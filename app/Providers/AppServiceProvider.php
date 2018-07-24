<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use AvoRed\Ecommerce\Http\Middleware\FrontAuth;
use Liang\Models\Biochemistry;
use Liang\Models\Blood;
use Liang\Models\Bookmark;
use Liang\Models\LiverKidney;

class AppServiceProvider extends ServiceProvider
{

//    /**
//     * All of the container bindings that should be registered.
//     *
//     * @var array
//     */
//    public $bindings = [
//        ServerProvider::class => DigitalOceanServerProvider::class,
//    ];
//
//    /**
//     * All of the container singletons that should be registered.
//     *
//     * @var array
//     */
//    public $singletons = [
//        DowntimeNotifier::class => PingdomDowntimeNotifier::class,
//    ];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $tt = Bookmark::get();
//        foreach ($tt as $t){
//            $t->img = str_replace('http://favicon.byi.pw/?url=','http://statics.dnspod.cn/proxy_favicon/_/favicon?domain=',$t->img);
//            $t->save();
//        }

        //
//       $aa = LiverKidney::select('check_time')->get();
//       foreach ($aa as $ta){
//            Blood::create(['user_id'=>5,'check_time'=>$ta->check_time]);
//            Biochemistry::create(['user_id'=>5,'check_time'=>$ta->check_time]);
//       }
//       dd($aa);
    }

    /**
     * Register any application services.
     *注册任何应用程序服务。   绑定服务到服务容器
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\Repositories\Interfaces\ArticleInterface', 'App\Repositories\Implements\ArticleRepository');
    }


}
