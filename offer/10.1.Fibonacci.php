<?php
header("content-type:text/html;charset=utf-8");
/*
 * 大家都知道斐波那契数列，现在要求输入一个整数n，请你输出斐波那契数列的第n项（从0开始，第0项为0）。n<=39   P74
 */

function Fibonacci($n)
{
    if($n < 0  || $n > 39){
        return false;
    }
    if($n <= 1){
        return $n;
    }
    $res = 0;
    $res1 = 0;
    $res2 = 1;
    for($i = 2;$i<=$n;$i++){
        $res = $res1 + $res2;
        $res1 = $res2;
        $res2 = $res;
    }
    return $res;
}

$n = 39;
echo Fibonacci($n);