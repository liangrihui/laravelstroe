<?php
/**
├── AipOcr.php             //OCR
└── lib
├── AipHttpClient.php        //内部http请求类
├── AipBCEUtil.php           //内部工具类
└── AipBase                  //Aip基类
 */

namespace Liang\Models;

use Liang\Word\AipOcr;

class MyApiOcr
{
    const APP_ID = '11416484';
    const API_KEY = 'y2rQpcXZ4KnpBU4IqxEpPEZ2';
    const SECRET_KEY = 'hWgNtXFqyKRXgl8wRi2ZzlWcAI6ii130';


    /*
     * 返回一个客户端实例
     */
    public static function getClient(){

        $client = new AipOcr(self::APP_ID,self::API_KEY,self::SECRET_KEY);

        return $client;
    }

}