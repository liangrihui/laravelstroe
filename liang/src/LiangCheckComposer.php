<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1
 * Time: 9:49
 */

namespace Liang;


use Illuminate\View\View;

class LiangCheckComposer
{
    public function compose(View $view){

        $piss_explain = array(
            "COL" => array('name'=>'颜色','refer_min'=>'浅黄色','refer_max'=>'深黄色','unit'=>""),
            "SG" => array('name'=>'尿比重','refer_min'=>'1.015','refer_max'=>'1.025','unit'=>""),
            "UBG" => array('name'=>'尿胆原','refer_min'=>'正常','refer_max'=>'正常','unit'=>""),
            "BLD" => array('name'=>'隐血','refer_min'=>'阴性(-)','refer_max'=>'阴性(-)','unit'=>""),
            "WBC" => array('name'=>'白细胞','refer_min'=>'0','refer_max'=>'5','unit'=>""),
            "LEU" => array('name'=>'白细胞酶','refer_min'=>'阴性(-)','refer_max'=>'阴性(-)','unit'=>""),
            "PRO" => array('name'=>'尿蛋白','refer_min'=>'阴性(-)','refer_max'=>'阴性(-)','unit'=>""),
            "GLU" => array('name'=>'尿糖','refer_min'=>'阴性(-)','refer_max'=>'阴性(-)','unit'=>""),
            "BIL" => array('name'=>'胆红素','refer_min'=>'阴性(-)','refer_max'=>'阴性(-)','unit'=>""),
            "KET" => array('name'=>'酮体','refer_min'=>'阴性(-)','refer_max'=>'阴性(-)','unit'=>""),
            "RBC" => array('name'=>'尿红细胞','refer_min'=>'阴性(-)','refer_max'=>'阴性(-)','unit'=>""),
            "NIT" => array('name'=>'尿红细胞','refer_min'=>'阴性(-)','refer_max'=>'阴性(-)','unit'=>""),
            "PH" => array('name'=>'酸碱度','refer_min'=>'4.6','refer_max'=>'8.0','unit'=>""),
        );


        $biochemistry_explain = array(

            "KF"=>array("name"=>"他克莫司",'refer_min'=>'1','refer_max'=>'20','unit'=>"ng/ml"),
            "CRE"=>array("name"=>"肌酐",'refer_min'=>'44','refer_max'=>'120','unit'=>"umol/L"),
            "Urea"=>array("name"=>"尿素",'refer_min'=>'2.5','refer_max'=>'7.8','unit'=>"mmol/L"),
            "GLB"=>array("name"=>"球蛋白",'refer_min'=>'15','refer_max'=>'35','unit'=>"g/L"),
            "URIC"=>array("name"=>"尿酸",'refer_min'=>'150','refer_max'=>'430','unit'=>"umol/L"),
            "CysC"=>array("name"=>"胱抑素",'refer_min'=>'0.63','refer_max'=>'1.25','unit'=>"mg/L"),
            "CHOL"=>array("name"=>"总胆固醇",'refer_min'=>'3.1','refer_max'=>'5.7','unit'=>"mmol/L"),
            "eGFR"=>array("name"=>"肾小球滤过率",'refer_min'=>'70','refer_max'=>'205','unit'=>"ml/min"),
            "LDH"=>array("name"=>"乳酸脱氢酶",'refer_min'=>'109','refer_max'=>'245','unit'=>"IU/L"),
            "AST"=>array("name"=>"谷草转氨酶",'refer_min'=>'0','refer_max'=>'65','unit'=>"IU/L"),
            "ALT"=>array("name"=>"谷丙转氨酶",'refer_min'=>'3','refer_max'=>'60','unit'=>"IU/L"),
            "TBIL"=>array("name"=>"总胆红素",'refer_min'=>'1.7','refer_max'=>'21.0','unit'=>"IU/L"),
            "DBIL"=>array("name"=>"直接胆红素",'refer_min'=>'0','refer_max'=>'6.8','unit'=>"umol/L"),
            "IBIL"=>array("name"=>"间接胆红素",'refer_min'=>'1.7','refer_max'=>'16.0','unit'=>"umol/L"),
            "TBA"=>array("name"=>"总胆汁酸",'refer_min'=>'0.0','refer_max'=>'12.0','unit'=>"umol/L"),
            "TP"=>array("name"=>"总蛋白",'refer_min'=>'60','refer_max'=>'83','unit'=>"g/L"),
            "ALB"=>array("name"=>"白蛋白",'refer_min'=>'35','refer_max'=>'55','unit'=>"g/L"),
            "A\/G"=>array("name"=>"白球比例",'refer_min'=>'1.1','refer_max'=>'2.5','unit'=>""),
            "BUN"=>array("name"=>"尿素氮",'refer_min'=>'2.5','refer_max'=>'7.8','unit'=>"mmol/L"),
            "GGT"=>array("name"=>"r-谷氨酰转肽酶",'refer_min'=>'7','refer_max'=>'50','unit'=>"IU/L"),
            "CK"=>array("name"=>"肌酸激酶",'refer_min'=>'20','refer_max'=>'200','unit'=>"IU/L"),
            "HBDH"=>array("name"=>"α-羟基丁酸脱氢酶",'refer_min'=>'72','refer_max'=>'185','unit'=>"IU/L"),
            "AMY"=>array("name"=>"淀粉酶",'refer_min'=>'0','refer_max'=>'220','unit'=>"IU/L"),
            "ALP"=>array("name"=>"碱性磷酸酶",'refer_min'=>'40','refer_max'=>'150','unit'=>"IU/L"),
            "B/C" =>array("name"=>"尿素氮/肌酐",'refer_min'=>'0','refer_max'=>'0.1','unit'=>""),
            "TG"=>array("name"=>"甘油三脂",'refer_min'=>'0.56','refer_max'=>'2.32','unit'=>"mmol/L"),
            "HDL-C"=>array("name"=>"高密度脂蛋白",'refer_min'=>'1.16','refer_max'=>'1.42','unit'=>"mmol/L"),
            "LDL-C"=>array("name"=>"低密度脂蛋白",'refer_min'=>'2.07','refer_max'=>'3.10','unit'=>"mmol/L"),
            "Na"=>array("name"=>"钠",'refer_min'=>'137','refer_max'=>'147','unit'=>"mmol/L"),
            "K"=>array("name"=>"钾",'refer_min'=>'3.5','refer_max'=>'5.3','unit'=>"mmol/L"),
            "Cl"=>array("name"=>"氯",'refer_min'=>'99','refer_max'=>'110','unit'=>"mmol/L"),
            "CO2"=>array("name"=>"二氧化碳",'refer_min'=>'22','refer_max'=>'34','unit'=>"mmol/L"),
            "Ca"=>array("name"=>"钙",'refer_min'=>'2.1','refer_max'=>'2.7','unit'=>"mmol/L"),
            "Mg"=>array("name"=>"镁",'refer_min'=>'0.67','refer_max'=>'1.04','unit'=>"mmol/L"),
            "PO4"=>array("name"=>"磷",'refer_min'=>'0.70','refer_max'=>'1.50','unit'=>"mmol/L"),
            "AG"=>array("name"=>"阴离子间隙",'refer_min'=>'8','refer_max'=>'16','unit'=>""),
            "OSM"=>array("name"=>"渗透压",'refer_min'=>'280','refer_max'=>'310','unit'=>"mOsm/KgH2O"),
            "GLU"=>array("name"=>"血糖",'refer_min'=>'3.5','refer_max'=>'6.11','unit'=>"mmol/L"),
        );


        $blood_explain = array(
            "RBC"   =>array("name"=>"红细胞",'refer_min'=>'4.00','refer_max'=>'5.50','unit'=>"10^12/L"),
            "HGB"   =>array("name"=>"血红蛋白",'refer_min'=>'120','refer_max'=>'160','unit'=>"g/L"),
            "WBC"   =>array("name"=>"白细胞",'refer_min'=>'4.0','refer_max'=>'10.0','unit'=>"10^12/L"),
            "PLT"   =>array("name"=>"血小板",'refer_min'=>'100','refer_max'=>'300','unit'=>"10^12/L"),
            "MO%25"    =>array("name"=>"单核细胞比例",'refer_min'=>'3','refer_max'=>'10','unit'=>"%"),
            "NEUT"  =>array("name"=>"中性粒细胞",'refer_min'=>'2.0','refer_max'=>'7.5','unit'=>"10^12/L"),
            "NE%25"    =>array("name"=>"中性粒细胞比例",'refer_min'=>'50','refer_max'=>'70','unit'=>"%"),
            "NE%23"   =>array("name"=>"中性粒细胞绝对值",'refer_min'=>'2.0','refer_max'=>'7.0','unit'=>"10^12/L"),
            "LY"    =>array("name"=>"淋巴细胞",'refer_min'=>'0.8','refer_max'=>'4.0','unit'=>"10^12/L"),
            "LY%25"   =>array("name"=>"淋巴细胞比例",'refer_min'=>'20','refer_max'=>'40','unit'=>"%"),
            "MPV"   =>array("name"=>"平均血小板体积",'refer_min'=>'7.0','refer_max'=>'13.0','unit'=>"fl"),
            "HCT"   =>array("name"=>"红细胞压积",'refer_min'=>'38','refer_max'=>'50.8','unit'=>"%"),
            "MCV"   =>array("name"=>"平均红细胞体积",'refer_min'=>'83.9','refer_max'=>'99.1','unit'=>"fl"),
            "RDW-CV"=>array("name"=>"红细胞体积分布宽度",'refer_min'=>'11.5','refer_max'=>'15.0','unit'=>"%"),
            "MCH"   =>array("name"=>"平均红细胞血红蛋白",'refer_min'=>'27.8','refer_max'=>'33.8','unit'=>"pg"),
            "MCHC"  =>array("name"=>"平均血红蛋白浓度",'refer_min'=>'329','refer_max'=>'355','unit'=>"g/L"),
            "MO%23"   =>array("name"=>"单核细胞绝对值",'refer_min'=>'0.12','refer_max'=>'1.0','unit'=>"10^12/L"),
            "MONO"  =>array("name"=>"单核细胞计数",'refer_min'=>'0.12','refer_max'=>'1.0','unit'=>"10^12/L"),
            "LY%23"   =>array("name"=>"淋巴细胞绝对值",'refer_min'=>'0.8','refer_max'=>'4.0','unit'=>"10^12/L"),
            "PDW"   =>array("name"=>"血小板体积分布宽度",'refer_min'=>'15.5','refer_max'=>'18.0','unit'=>"%"),
            "PCT"   =>array("name"=>"血小板压积",'refer_min'=>'0.108','refer_max'=>'0.272','unit'=>"%"),
            "P-LCR" =>array("name"=>"大型血小板比例",'refer_min'=>'10','refer_max'=>'50','unit'=>"%"),
            "EO"    =>array("name"=>"嗜酸性粒细胞比例",'refer_min'=>'0.5','refer_max'=>'5.0','unit'=>"%"),
            "EO%23"   =>array("name"=>"嗜酸性粒细胞绝对值",'refer_min'=>'0.02','refer_max'=>'0.50','unit'=>"10^12/L"),
            "BA%23"   =>array("name"=>"嗜碱性粒细胞绝对值",'refer_min'=>'0','refer_max'=>'0.1','unit'=>"10^12/L"),
            "BA%25"    =>array("name"=>"嗜碱性粒细胞比例",'refer_min'=>'0','refer_max'=>'1','unit'=>"%"),
            "NRBC"  =>array("name"=>"有核红细胞比例",'refer_min'=>'0','refer_max'=>'0.2','unit'=>"%"),
            "NRBC%23" =>array("name"=>"有核红细胞绝对",'refer_min'=>'0','refer_max'=>'0.01','unit'=>"10^12/L"),);

        $view->with('blood_explain',$blood_explain)
            ->with('biochemistry_explain',$biochemistry_explain)
            ->with('piss_explain',$piss_explain);
    }

}
//
//+    URL 中+号表示空格                      %2B
//空格 URL中的空格可以用+号或者编码           %20
///   分隔目录和子目录                        %2F
//    ?    分隔实际的URL和参数                    %3F
//    %    指定特殊字符                           %25
//#    表示书签                               %23
//    &    URL 中指定的参数间的分隔符             %26
//    =    URL 中指定参数的值                     %3D