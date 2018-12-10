<?php
header("content-type:text/html;charset=utf-8");
/*
 * 一只青蛙一次可以跳上 1 级台阶，也可以跳上 2 级。求该青蛙跳上一个 n 级的台阶总共有多少种跳法。  P77
 */

function jumpFloor($number)
{
    if($number < 0){
        return false;
    }
    if($number <= 2){
        return $number;
    }
    $res = 0;
    $res1 = 1;
    $res2 = 2;
    for($i = 3;$i <= $number;$i++){
        $res = $res1 + $res2;
        $res1 = $res2;
        $res2 = $res;
    }
    return $res;
}

$n = 2;
echo jumpFloor($n);