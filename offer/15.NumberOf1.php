<?php
header("content-type:text/html;charset=utf-8");
/*
 * 二进制中1的个数 输入一个整数，输出该数二进制表示中 1 的个数。 P100
 */
function NumberOf1_1($n)
{
    $count = 0;
    if($n < 0){
        $n = $n & 0x7FFFFFFF;
        $count ++;
    }

    while ($n){
        $n = ($n-1) & $n;
        $count ++;

    }

    return $count;

}

function NumberOf1_2($n){
    $count = 0;
    for($i = 0;$i<32;$i++){
        if($n & (1 << $i)){
            $count++;
        }
    }
    return $count;
}

echo NumberOf1_1(100)."</br>";
echo NumberOf1_2(100);