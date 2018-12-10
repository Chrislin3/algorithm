<?php
header("content-type:text/html;charset=utf-8");
/*
 * 给定一个double类型的浮点数base和int类型的整数exponent。求base的exponent次方。P110
 */

function Power($base, $exponent)
{
    if($base == 0){
        return 0;
    }
    if($exponent == 0){
        return 1;
    }
    if($exponent > 0){
        $res = 1;
        for($i = 1;$i<=$exponent;$i++){
            $res = $res * $base;
        }
        return $res;
    }
    elseif ($exponent < 0){
        $res = 1;
        for($i = 1;$i<=abs($exponent);$i++){
            $res = $res * $base;
        }
        return 1/$res;
    }
}