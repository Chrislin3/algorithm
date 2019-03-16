<?php
header("content-type:text/html;charset=utf-8");
/*
 * 整数中1出现的次数 常规方法 P221
 */
function NumberOf1Between1AndN_Solution($n){

    $num = 0;
    for($i = 0;$i<=$n;$i++){
        $num += numberOf1($i);
    }
    return $num;

}
function numberOf1($n){
    $numper = 0;
    while ($n){
        if($n % 10 == 1){
            $numper ++;
        }
        $n /= 10;

    }
    return $numper;
}

$n = 21235;
echo NumberOf1Between1AndN_Solution($n);