<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/17
 * Time: 21:09
 */

namespace Liang\Models;


class Html
{

    /**
     * @param $url 请求网址
     * @param bool $params 请求参数
     * @param int $ispost 请求方式
     * @param int $https https协议
     * @return bool|mixed
     */
    public static function curl($url, $params = false, $ispost = 0, $https = 0)
    {
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($https) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        }
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                if (is_array($params)) {
                    $params = http_build_query($params);
                }
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }

        $response = curl_exec($ch);

        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }
//    // 发送请求
//$result = self::curl('网址', '参数', true);
//// 收到的数据需要转化一下
//$json = json_decode($result);

    public static function getContent($url){
        $c = curl_init();

        curl_setopt($c,CURLOPT_URL,$url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
        // 在发起连接前等待的时间，如果设置为0，则不等待
        curl_setopt ($c, CURLOPT_CONNECTTIMEOUT, 0);
        // 设置 CURL 最长执行的秒数
        curl_setopt ($c, CURLOPT_TIMEOUT, 30);
        //如果curl请求的网页发生了重定向，那么抓取的结果很可能为空
        curl_setopt($c,CURLOPT_FOLLOWLOCATION,1);
        //如果网页进行了gzip 压缩，那么抓取的结果可能为乱码
//        curl_setopt($c,CURLOPT_ENCONDING,'gzip');

        $https = strstr($url,':',true);

        if ($https == "https") {
            curl_setopt($c, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
            curl_setopt($c, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        }elseif($https != 'http'){
            exit('不是网页');
        }
        $data = curl_exec($c);
        // 检查文件是否正确取得
        if (curl_errno($c)){
            echo "无法取得 URL 数据";
        //echo curl_error($ch);/*显示错误信息*/
            exit;
        }
        curl_close($c);
        $data = mb_convert_encoding($data,'utf-8','GBK,UTF-8,ASCII');
        return $data;
    }

    public static function getHead($store){
        // 解析 HTML 的 <head> 区段
        preg_match("/<head.*>(.*)<\/head>/smUi",$store, $htmlHeaders);
        if(!count($htmlHeaders)){
            echo "无法解析数据中的 <head>区段";
            exit;
        }
        return $htmlHeaders;
    }

    public static function getTitle($url){
        $data =  preg_replace('/\n\s*\r/','',self::getContent($url));
//        dd($data);
        $htmlHeaders =self::getHead($data);

        // 取得 <head> 中 meta 设置的编码格式
//        if(preg_match("/<meta[^>]*http-equiv[^>]*charset=(.*)(\"|')/Ui",$htmlHeaders[1], $results)){
//            $charset = $results[1];
//        }else{
//            preg_match("/<meta[^>]*charset=(\"|')(.*)(\"|')/Ui",$htmlHeaders[1], $results);
////            dd($results);
//            $charset = $results[2];
//        }
        $title = "无法获得标题";
        // 取得 <title> 中的文字
        if(preg_match("/<title>(.*)<\/title>/",$htmlHeaders[1], $htmlTitles)){
            if(!count($htmlTitles)){
                echo "无法解析 <title> 的内容";
                exit;
            }

//            $title = $htmlTitles[1];
//        dd($htmlTitles[1]);
// 将 <title> 的文字编码格式转成 UTF-8
//            if($charset == "gbk"){
//                $title=$htmlTitles[1];
//            }else{
                $title=$htmlTitles[1];
//            }

        }
        // 取得 图片 中的文字
//        if(preg_match('/<link.+href=\"?(.+\.ico)\"?.+>/i',$htmlHeaders[1], $htmlTitles)){
//            if(!count($htmlTitles)){
//                echo "无法解析 图片 的内容";
//                exit;
//            }
//
//            $title[2] =$htmlTitles[1];
//        }
//        dd($title);
        return $title;
    }


}