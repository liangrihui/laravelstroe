<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/30
 * Time: 16:33
 */

namespace Liang\Models;


class Biochemistry extends BaseModel
{
    protected $table='biochemistrys';
    protected $fillable = ['user_id',"ALT", "AST", "ALP", "TBIL", "DBIL", "Urea", "IBIL", "CRE", "TP", "URIC", "ALB", "CHOL", "GLB", "CO2", "A/G", "CysC", "eGFR", "β2-MG", "CHE", "LDH", "GGT", "CK", "α-HBDH", "AMY", "TBA", "BUN", "B/C", "TG", "HDL-C", "LDL-C", "Na", "K", "Cl", "Ca", "Mg", "PO4", "AG", "OSM", "GLU", 'check_time'];
}