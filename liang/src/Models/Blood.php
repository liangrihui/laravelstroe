<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/30
 * Time: 16:32
 */

namespace Liang\Models;


class Blood extends BaseModel
{

    protected $fillable =['user_id',
"WBC", "NE%" , "LY%", "MO%", "EO" , "BA%", "NE#", "LY#", "MO#", "EO#", "BA#", "RBC", "HGB", "HCT", "MCV", "MCH", "MCHC", "RDW-CV","NRBC", "NRBC#", "PLT", "MPV", "PCT", "PDW", "MONO", "NEUT", "LY", "P-LCR", 'check_time'];
}