<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入数字 n，按顺序打印出从 1 到最大的 n 位十进制数。比如输入 3，则打印出 1、2、3 一直到最大的 3 位数即 999。 P114
 */
function print1ToMaxOfNDigits($n){
    if($n<=0){
        return 0;
    }
    $length = $n;
    $number = array();
//    $number[$length] = '\0';
    while (!increment($number,$length)){
        printNumber($number,$length);
    }

}
function increment(&$number,$length){
    $isOverflew = false;
    $nTakeOver = 0;
    for($i = $length-1;$i>=0;$i--){
        $nSum = $number[$i] + $nTakeOver ;
        if($i == $length - 1){
            $nSum ++;
        }
        if($nSum >= 10){
            if($i == 0){
                $isOverflew = true;
            }
            else{
                $nSum = $nSum - 10;
                $nTakeOver = 1;
                $number[$i] = strval($nSum);
            }
        }
        else{
            $number[$i] = strval($nSum);
            break;
        }
    }
    return $isOverflew;
}

function printNumber($number,$length){
 //   $length = count($number);
    for($i=0;$i<$length;$i++){
        echo $number[$i];
    }
    echo ' ';
 //   var_dump($number)."</br>";
}

print1ToMaxOfNDigits(4);