<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/21
 * Time: 15:03
 */

namespace Liang\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Liang\Models\Biochemistry;
use Liang\Models\Blood;
use Liang\Models\Piss;
use Liang\Models\LiverKidney;
use Liang\Word\AipOcr;
use phpDocumentor\Reflection\Types\Array_;

class MyBodyController
{

    // 你的 APPID AK SK
    const APP_ID = '11416484';
    const API_KEY = 'y2rQpcXZ4KnpBU4IqxEpPEZ2';
    const SECRET_KEY = 'hWgNtXFqyKRXgl8wRi2ZzlWcAI6ii130';
    public $is_piss = false;


    /*
     * 生化34项  代号 数组
     */
    public $biochemistry = array(
        "ALT"   => "丙氨酸氨基转移酶",
        "ALT1"   => "谷丙转氨酶",
        "AST"   => "天门冬氨酸氨基转移酶",
        "AST1"   => "谷草转氨酶",
        "ALP"   => "碱性磷酸酶",
        "TBIL"  => "总胆红素",
        "DBIL"  => "直接胆红素",
        "Urea"  => "尿素",
        "IBIL"  => "间接胆红素",
        "CRE"   => "肌酐",
        "TP"    => "总蛋白",
        "URIC"  => "尿酸",
        "ALB"   => "白蛋白",
        "CHOL"  => "总胆固醇",
        "GLB"   => "球蛋白",
        "CO2"   => "二氧化碳",
        "A/G1"   => "白球比例",
        "A/G"    => "A/G比值",
        "CysC"  => "胱抑素",
        "CysC1"  => "胱抑素c",
        "eGFR"  => "肾小球滤过率",
        "eGFR1"  => "肾小球滤过率估算值",
        "β2-MG" => "β2微球蛋白",
        "CHE"   => "胆碱酯酶",
        "LDH"   => "乳酸脱氢酶",
        "GGT"   => "r-谷氨酰转肽酶",
        "GGT1"   => "谷氨酰转肽酶",
        "CK"    => "肌酸激酶",
        "α-HBDH"  => "α-羟基丁酸脱氢酶",
        "α-HBDH1"  => "羟基丁酸脱氢酶",
        "AMY"   => "淀粉酶",
        "TBA"   => "总胆汁酸",
        "BUN"   => "尿素氮",
        "B/C"   => "尿素氮/肌酐",
        "TG"    => "甘油三脂",
        "HDL-C" => "高密度脂蛋白",
        "LDL-C" => "低密度脂蛋白",
        "Na"    => "钠",
        "K"     => "钾",
        "Cl"    => "氯",
        "Ca"    => "钙",
        "Mg"    => "镁",
        "PO4"   => "磷",
        "AG"    => "阴离子间隙",
        "OSM"   => "渗透压",
        "GLU"   => "血糖",
    );
    public $biochemistry_form = array(
        "ALT"   => array("谷丙转氨酶"),
        "AST"   => array("谷草转氨酶"),
        "ALP"   => array("碱性磷酸酶"),
        "TBIL"  => array("总胆红素"),
        "DBIL"  => array("直接胆红素"),
        "Urea"  => array("尿素"),
        "IBIL"  => array("间接胆红素"),
        "CRE"  => array("肌酐"),
        "TP"    => array("总蛋白"),
        "URIC"  => array("尿酸"),
        "ALB"   => array("白蛋白"),
        "CHOL"  => array("总胆固醇"),
        "GLB"   => array("球蛋白"),
        "CO2"   => array("二氧化碳"),
        "A/G"   => array("白球比例"),
        "CysC"  => array("胱抑素"),
        "eGFR"  => array("肾小球滤过率"),
        "β2-MG" => array("β2微球蛋白"),
        "CHE"   => array("胆碱酯酶"),
        "LDH"   => array("乳酸脱氢酶"),
        "GGT"   => array("r-谷氨酰转肽酶"),
        "CK"    => array("肌酸激酶"),
        "α-HBDH"  => array("α-羟基丁酸脱氢酶"),
        "AMY"   => array("淀粉酶"),
        "TBA"   => array("总胆汁酸"),
        "BUN"   => array("尿素氮"),
        "B/C"   => array("尿素氮/肌酐"),
        "TG"    => array("甘油三脂"),
        "HDL-C" => array("高密度脂蛋白"),
        "LDL-C" => array("低密度脂蛋白"),
        "Na"    => array("钠"),
        "K"     => array("钾"),
        "Cl"   => array("氯"),
        "Ca"    => array("钙"),
        "Mg"    => array("镁"),
        "PO4"   => array("磷"),
        "AG"    => array("阴离子间隙"),
        "OSM"   => array("渗透压"),
        "GLU"   => array("血糖"),
        'check_time' => array("检查时间")

    );
    /*
     * 尿常规  代号 数组
     */
    public $piss = array(
        "COL"   => "颜色",
        "LEU"   => "白细胞酶",
        "PRO"   => "蛋白",
        "BLD"   => "潜血",
        "KET"   => "酮体",
        "SG"    => "比重",
        "NIT"   => "亚硝酸盐",
        "PH"    => "酸碱度",
        "UBG"   => "尿胆原",
        "BIL"   => "胆红素",
        "RBC"   => "红细胞",
        "WBC"   => '白细胞',
        "GLU"   => '尿糖',

    );
    public $piss_form = array(
        "COL"   => array("颜色"),
        "LEU"   => array("白细胞酶"),
        "PRO"   => array("蛋白"),
        "BLD"   => array("潜血"),
        "KET"   => array("酮体"),
        "SG"    => array("比重"),
        "NIT"   => array("亚硝酸盐"),

        "PH"    => array("酸碱度"),
        "UBG"   => array("尿胆原"),
        "BIL"   => array("胆红素"),
        "RBC"   => array("红细胞"),
        "WBC"   => array('白细胞'),
        "GLU"   => array('尿糖'),
        'check_time' => array("检查时间")
    );
    /*
     * 尿常规  除去数字之后可以 匹配的值 数组
     */
    public $piss_value = array("阴性(-)", "阴性", "+-", "++", "+++", "正常", "淡黄色", "淡黄", "清晰", "浑浊", "微浊");
    /*
     * 血常规  代号 数组
     */
    public $blood = array(

        "RBC"       => "红细胞",
        "RBC1"       => "红细胞计数",
        "HCT"       => "红细胞压积",
        "MCV"       => "平均红细胞体积",
        "RDW-CV"    => "红细胞体积分布宽度",
        "HGB"       => "血红蛋白",
        "MCHC"      => "平均血红蛋白浓度",
        "MCH"       => "平均红细胞血红蛋白",
        "WBC"       => "白细胞",
        "WBC1"       => "白细胞计数",
        "MO%"       => "单核细胞比例",
        "MO#"       => "单核细胞绝对值",
        "MO#1"       => "单核细胞绝对值计数",
        "MONO"      => "单核细胞",
        "MONO1"      => "单核细胞计数",
        "NEUT"      => "中性粒细胞",
        "NEUT1"      => "中性粒细胞计数",
        "NE%"       => "中性粒细胞比例",
        "LY"        => "淋巴细胞",
        "LY1"        => "淋巴细胞计数",
        "LY%"       => "淋巴细胞比例",
        "LY#"       => "淋巴细胞绝对值",
        "LY#1"       => "淋巴细胞绝对值计数",
        "PLT"       => "血小板",
        "PLT1"       => "血小板计数",
        "MPV"       => "平均血小板体积",
        "PDW"       => "血小板体积分布宽度",
        "PCT"       => "血小板压积",
        "EO"        => "嗜酸性粒细胞比例",
        "EO#"       => "嗜酸性粒细胞绝对值",
        "EO#1"       => "耆酸性粒细胞绝对值",
        "NE#"       => "中性粒细胞绝对值",
        "P-LCR"     => "大型血小板比例",
        "BA%"       => "嗜碱性粒细胞比例",
        "BA%1"       => "耆碱性粒细胞比例",
        "BA#"       => "嗜碱性粒细胞绝对值",
        "NRBC"      => "有核红细胞比例",
        "NRBC#"     => "有核红细胞绝对",
        "NRBC#1"     => "有核红细胞绝对计数",
    );
    public $blood_form = array(
        "WBC"       => array("白细胞"),
        "NE%"        => array("中性粒细胞比例"),
        "LY%"       => array("淋巴细胞比例"),
        "MO%"        => array("单核细胞比例"),
        "EO"        => array("嗜酸性粒细胞比例"),
        "BA%"        => array("嗜碱性粒细胞比例"),
        "NE#"       => array("中性粒细胞绝对值"),
        "LY#"       => array("淋巴细胞绝对值"),
        "MO#"       => array("单核细胞绝对值"),
        "EO#"       => array("嗜酸性粒细胞绝对值"),
        "BA#"       => array("嗜碱性粒细胞绝对值"),
        "RBC"       => array("红细胞"),
        "HGB"       => array("血红蛋白"),
        "HCT"       => array("红细胞压积"),
        "MCV"       => array("平均红细胞体积"),
        "MCH"       => array("平均红细胞血红蛋白"),
        "MCHC"      => array("平均血红蛋白浓度"),
        "RDW-CV"    => array("红细胞体积分布宽度"),
        "NRBC"      => array("有核红细胞比例"),
        "NRBC#"     => array("有核红细胞绝对"),
        "PLT"       => array("血小板"),
        "MPV"       => array("平均血小板体积"),
        "PCT"       => array("血小板压积"),
        "PDW"       => array("血小板体积分布宽度"),
        "MONO"      => array("单核细胞"),
        "NEUT"      => array("中性粒细胞"),
        "LY"        => array("淋巴细胞"),
        "P-LCR"     => array("大型血小板比例"),
        'check_time' => array("检查时间")
    );
    public $kf = array(
        'KF' => "他克莫司",
        'KF1' => "普乐可福药物浓度",
        'CsA' => '环孢素');
    public $kf_form = array(
        'KF506' => array("他克莫司"),
        'CsA' => array('环孢素'),);

    /*
     * 上传图片 和获取图片的处理
     *
     */
    public function uploadImage(Request $request)
    {

        //处理图片和收集数据
        if ($request->isMethod('POST')) {
            $image     = $request->file('file');//获取图片信息
            $imageName = $image->getClientOriginalName();

            $relativePath = 'upload/user/5';//相对路径目录
            $moveToPath   = public_path($relativePath);//判断是否有目录 绝对路径
            if (!File::exists($moveToPath)) {
                File::makeDirectory($moveToPath, 0775, true, true);
            }

            $dbpath = $relativePath . '/' . $imageName;
            if ($image->move($moveToPath, $imageName)) {
            } else {
                echo '上传失败';
            }

            //运用百度的OCR 文字识别进行处理 图片文字

            $client                      = new AipOcr($this::APP_ID, $this::API_KEY, $this::SECRET_KEY);
            // 如果有可选参数
            $options                     = array();

//            $options["language_type"] = "CHN_ENG";
            $options["detect_direction"] = "true";
//            $options["detect_language"] = "true";

            $img                         = file_get_contents(asset($dbpath));
            $result                      = $client->basicAccurate($img, $options);//识别结果集basicGeneral  basicAccurate


            //处理识别结果的数组
            $arra = $result['words_result'];
            //用array_dot 把数组变成一维数组 用array_values 取出数组的值
            $arr  = array_values(array_dot($arra));
//        dd($arr);

            //根据识别的值 进行判断 是那种类型的检查单
            $check_type = array();
            $check_form =array();
            $type       = '';//保存那个表的标识
            $new_check ='';

            if (in_array("阴性(-)", $arr)) {

                $check_type    = $this->piss;
                $check_form    = $this->piss_form;
                $type          = 'piss';
                $this->is_piss = true;
                $new_check = $new_piss = Piss::orderBy('check_time','desc')->first();

            } elseif (in_array("血常规", $arr) || in_array("血红蛋白", $arr) || in_array("血红蛋白(HGB", $arr) || in_array("血红蛋白(HGB)", $arr) || in_array("嗜碱性粒细胞比例(BA)", $arr) || in_array("淋巴细胞比例", $arr)) {
                $check_form = $this->blood_form;
                $check_type = $this->blood;
                $type       = 'blood';
                $new_check  = Blood::orderBy('check_time','desc')->first();

            }elseif(in_array('KF',$arr) || in_array('他克莫司浓度',$arr)){
                $check_form = $this->kf_form;
                $check_type = $this->kf;
                $type       = 'biochemistry';
                $new_check  = Biochemistry::orderBy('check_time','desc')->first();

            }else{
                $check_form = $this->biochemistry_form;
                $check_type = $this->biochemistry;
                $type       = 'biochemistry';
                $new_check  = Biochemistry::orderBy('check_time','desc')->first();
            }

            //从大量识别数据中获取正确的结果  arr 是识别结果数组  $check_type 是上面判断是检查项目
            $arr1 = $this->inspect_result($arr,$check_type,$check_form);


            return view('Liang::bodys.uploadImage')->with('result', $arr1)->with('tupian', $dbpath)->with('type', $type)->with('new_check',$new_check);
        }

        return view('Liang::bodys.uploadImage');
    }


    /*
     * inspect_result 方法是
     * 数组arr 获取需要的数据
     * $type 是检查项目
     *  赋值个数组result
     *  返回数组result
     */
    public function inspect_result(Array $arr, Array $type,Array $form)
    {
        $reslut = $form;
        $lenght = count($arr);
        foreach ($arr as $key => $value) {
            if ($key < $lenght - 1) {

//            $name = preg_replace('/[0-9a-z\/L\.~%\-\^:]/', '', trim($value));
                //GBK/GB2312使用：
                // preg_match_all("/[\x80-\xff]+/", $str, $chinese);
                //UTF-8 使用：
                //preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $str, $chinese);

                //匹配 是否是中文字符串 如果不是 直接执行下一次循环
                if (!preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", trim($value),$tt)) {
                    continue;
                }else{
                    if (trim($value) == 'A/G比值'){
                        $name ='A/G比值';
                    }else{
                        $name =$tt[0][0];
                    }

                }
                //匹配 是否是中文字符串 如果是 在该方法mStrost 方法中根据 value 进行配对 找出该中文的检查代码 code_name
                $code_name = $this->mStrpos($name, $type);
                //如果在检查项目中找不到该value 则直接进行下一次循环 不给于赋值
                if ($code_name == '') {
                    continue;
                }

                //为检查项目代码赋值
                //匹配当前字符串是否有包含 浮点数字 如果是 那可能是该项目的值
//                $value = preg_replace('/^[0-9a-zA-z~]*[\x{4e00}-\x{9fa5}]+/u','',$value);


                if(preg_match_all('/[0-9]{1,4}\.?[0-9]{0,3}/', $value, $valu) ){
                    if (preg_match_all('/^[0-9]{1,4}\.?[0-9]{0,3}/', $value, $valu2)){
                        $data =$valu2[0][1]??$valu2[0][0];
                    }else{
                        $data =$valu[0][0];
                    }
                  $reslut[$code_name][1] = $data >1000 ? $this->subNumb($data): $data;

                }elseif (preg_match_all('/^[0-9]{1,}\.?[0 -9]{0,3}/', $arr[$key + 1], $next) || $this->is_piss) {
                    if (preg_match_all('/^[0-9]{1,4}\.?[0-9]{0,3}/', $arr[$key + 1], $next)) {
                        $reslut[$code_name][1] = $next[0][0] >1000 ? $this->subNumb($next[0][0]): $next[0][0];
                    }

                    if (in_array($arr[$key + 1], $this->piss_value)) {
                        $reslut[$code_name][1] = $arr[$key + 1];
                    }

                } else if (($key + 2< $lenght) && preg_match_all('/^[0-9]{1,4}\.?[0-9]{0,3}/', $arr[$key + 2], $next2)) {

                    $reslut[$code_name][1] = $next2[0][0] >1000 ? $this->subNumb($next2[0][0]): $next2[0][0];

                } else if (($key + 3< $lenght) && preg_match_all('/^[0-9]{1,4}\.?[0-9]{0,3}/', $arr[$key + 3], $next3)) {

                    $reslut[$code_name][1] = $next3[0][0] >1000 ? $this->subNumb($next3[0][0]): $next3[0][0];

                } else {
                    continue;
                }


            }

            //在识别数组中匹配 检查的时间
            if (preg_match_all('/[0-9]{4}(\/|\-)[0-9]{1,2}(\/|\-)[0-9]{1,2}/', $value, $dateTime)) {

                $date       = preg_replace('/\//', '-', $dateTime[0][0]);
                $date_array = explode('-', $date);
                if (intval($date_array[1]) < 10) {
                    $date_array[1] = '0' . $date_array[1];
                }
                if (intval($date_array[2]) < 10) {
                    $date_array[2] = '0' . $date_array[2];
                }
                $date_result             = implode('-', $date_array);
                $reslut["check_time"][1] = $date_result;
            }
        }

        return $reslut;
    }

    /*
     * 方法根据 字符串name  在数组type 中查找 是否存在于type 数组中
     * 首先在type 数组的key 中匹配 如果匹配不到这 运用similar_text方法匹配数组value 的相似度
     */
    public function mStrpos($name, $type)
    {
        $code_name = '';
//        $similar   = array();
        if (in_array($name,$type)){
            $key =array_search($name,$type);
            if($key == 'CO2' || $key =='PO4'){
                $code_name = $key;
            }else{
                $code_name = preg_replace('/[0-9]/','',$key);
            }
        }
//        if ($code_name == '') {
//            foreach ($type as $kay => $value) {
////            $values = preg_replace('','',$value[0])
//                similar_text($name, $value[0], $simi);
//                $similar[$kay] = $simi;
//            }
//            arsort($similar);
////            echo $name;
////            var_dump($similar);
//            $code_name = key($similar);
//        }
        return $code_name;
    }


    public function blood()
    {
        $new_check  = Blood::orderBy('check_time','desc')->first();
        return view('Liang::bodys.blood')->with('new_check',$new_check);
    }

    public function biochemistry()
    {
        $new_check  = Biochemistry::orderBy('check_time','desc')->first();
        return view('Liang::bodys.biochemistry')->with('new_check',$new_check);
    }

    public function piss()
    {
        $new_check = $new_piss = Piss::orderBy('check_time','desc')->first();
        return view('Liang::bodys.piss')->with('new_check',$new_check);
    }

    /*
     * 为 模型对象object 的属性赋值 和保存
     */
    public function save_check($obj,Array $array){
        foreach ($array as $kay => $value){
            if ($value != ''){
                $obj->$kay = $value;
            }
        }
        if ($obj->save()){
            return true;
        }else{
            return exit('保存出错');
        }
    }

    /*
     *  保存 识别后的 数局
     */
    public function check_store(Request $request)
    {
//        dd($request->all());
        $type = $request->input('type');
        $time = $request->input('check_time');
        $value_array = $request->except(['_token','type']);

//        dd(Blood::where('check_time',$time)->first());
        if ($type == 'blood') {
            if ($old_check = Blood::where('check_time',$time)->first()==null){

                $new_check = new Blood();
                $this->save_check($new_check,$value_array);
            }else{
                $this->save_check($old_check,$value_array);
            }

            return redirect()->route('manage.blood')->with('massages','检查单上传保存成功！');

        } elseif ($type == 'biochemistry') {

            if ($old_check = Biochemistry::where('check_time',$time)->first()==null){

                $new_check = new Biochemistry();
                $this->save_check($new_check,$value_array);

            }else{

                $this->save_check($old_check,$value_array);

            }

            return redirect()->route('manage.biochemistry')->with('massages','检查单上传保存成功！');

        }elseif ($type == 'piss') {

            if ($old_check = Piss::where('check_time',$time)->first()==null){

                $new_check = new Piss();
                $this->save_check($new_check,$value_array);

            }else{

                $this->save_check($old_check,$value_array);

            }

            return redirect()->route('manage.piss')->with('massages','检查单上传保存成功！');

        }

    }

    /*
     * 获取 折线图和 柱形图 的数据
     */
    public function getChartData($table, $column,$type=false)
    {
        if ($type){
            $data = DB::table($table . 's')->select($column, 'check_time')->orderBy('check_time','desc')->get();
        }else{
            $data = DB::table($table . 's')->select($column, 'check_time')->orderBy('check_time')->get();
        }


        foreach ($data as $da) {

            $da->value = $da->$column;

            $date = date_create($da->check_time);
            $t    = date_format($date, "Y-m-d");
//            $t =date_create_from_format("Y-m-d",$da->check_time);
            $da->check_time = $t;
        }
//        dd($data);
        echo json_encode($data);

    }

    /*
     * 获取 饼形图 的数据
     */
    public function getPieChartData($table, $column, $max, $min)
    {


//        如果是查询尿的arr 数组中的项目
        $arr = array('LEU','NIT','PRO','GLU','KET','UBG','BLD','BIL','COL','TURB','MS','EC','FATTY','CRYSTAL');
        if ($table == 'piss' && in_array($column,$arr)){
            $count = Piss::where('id','>','0')->count();

            $abnormalityMin           = 0;
            $normal                   = DB::table($table . 's')->where($column,'阴性(-)')->orWhere($column,'正常')->orWhere($column,'淡黄色')->orWhere($column,'清晰')->count();
            $abnormalityMax           = $count-$normal;

        }else{

        $abnormalityMax           = DB::table($table . 's')->where($column, '>=', $max)->count();
        $abnormalityMin           = DB::table($table . 's')->where($column, '<', $min)->count();
        $normal                   = DB::table($table . 's')->whereBetween($column, [$min, $max])->count();
        }
        $result                   = array();
        $result['abnormalityMin'] = $abnormalityMin;
        $result['normal']         = $normal;
        $result['abnormalityMax'] = $abnormalityMax;

        echo json_encode($result);
    }


    /*
     * 取出钱三位数
     */
    public function subNumb($number){
        return substr($number,0,3);
    }


    public function test(Request $request)
    {


    }
}
