<?php
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|| - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
注册自动加载器
| - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
|
Composer提供了一个方便的、自动生成的类装入器
|我们的应用程序。我们只需要利用它！我们仅仅需要它
在这里的脚本中这样我们就不用担心手动操作了
稍后加载我们的任何类。放松是很好的。引入composer 的加载类
*/

require __DIR__ . '/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|我们需要阐明PHP开发，所以让我们打开电灯。
这个引导框架并让它准备好使用，然后
会加载这个应用程序，这样我们就可以运行它并发送
回复到浏览器，让我们的用户高兴
*/

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->resourcePath('../themes/avored/default');
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|运行应用程序
| - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
|
一旦我们有了应用程序，我们就可以处理传入的请求
通过内核，并将相关的响应发送回
客户的浏览器允许他们享受创意
我们为他们准备了很好的应用程序。
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
