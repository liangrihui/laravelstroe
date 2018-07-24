<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |干预图像支持“GD库”和“Imagick”来处理图像
内部|。你可以根据你的PHP选择其中一个
|配置。默认情况下，PHP的“GD库”实现被使用。
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    'sizes' => [
        'small' => ['150', '150'],
        'med' => ['350', '350'],
        'large' => ['750', '750'],
    ],


);
