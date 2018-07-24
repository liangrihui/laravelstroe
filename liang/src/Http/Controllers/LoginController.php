<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5
 * Time: 8:40
 */

namespace Liang\Http\Controllers;


use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function loginForm()
    {
        return view('Liang::auth.login');
    }



    public function redirectPath()
    {
        return '/blog';

    }

}