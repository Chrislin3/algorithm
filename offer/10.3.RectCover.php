<?php
header("content-type:text/html;charset=utf-8");
/*
 * 我们可以用2*1的小矩形横着或者竖着去覆盖更大的矩形。请问用n个2*1的小矩形无重叠地覆盖一个2*n的大矩形，总共有多少种方法？  P79
 */

function rectCover($number)
{
    if($number <0){
        return false;

    }
    if($number <=2){
        return $number;
    }
    $res = 0;
    $res1 = 1;
    $res2 = 2;
    for($i = 3;$i<=$number;$i++){
        $res = $res1 + $res2;
        $res1 = $res2;
        $res2 = $res;
    }
    return $res;
}