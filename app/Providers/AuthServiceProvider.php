<?php

namespace App\Providers;

use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Liang\Models\Article;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
//        Article::class => ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('update-post',function ($user, $post){
//            return $user->id == $post->id;
//        });
//        Gate::define('update-delete','PostPolicy@delete');
//        Gate::resource('posts','PostPolicy');
        // Gates 接受一个用户实例作为第一个参数，并且可以接受可选参数，比如 相关的 Eloquent 模型：
//        foreach($this->getPermission() as $permission) {
//            // dd($permission->roles);
//            Gate::define($permission->name, function($user) use ($permission) {
//                // 返回collection
//                return $user->hasRole($permission->roles);
//            });
//        }

        //
    }
//    public function getPermission()
//    {
//        return Permission::with('roles')->get();
//    }

}
