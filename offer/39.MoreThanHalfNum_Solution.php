<?php
header("content-type:text/html;charset=utf-8");
/*
 * 数组中有一个数字出现的次数超过数组长度的一半，请找出这个数字。P205
 * 例如输入一个长度为9的数组{1,2,3,2,2,2,5,4,2}。由于数字2在数组中出现了5次，超过数组长度的一半，因此输出2。如果不存在则输出0。
 */
function MoreThanHalfNum_Solution($numbers)
{
    if($numbers == null){
        return null;
    }
    $count = 1;
    $num = $numbers[0];
    for($i = 1;$i<count($numbers);$i++){
        if($numbers[$i] == $numbers[$i-1]){
            $num = $numbers[$i];
            $count++;
        }
        else{
            $count--;
            if($count == 0 ){
                $count = 1;
                $num = $numbers[$i];
            }

        }
    }
    //此时已经把出现次数最多的值找出来了，下一步就是看看这个值有没有超过一半
    $count = 0;
    echo $num;
    foreach ($numbers as $value){
        if($value == $num){
            $count ++;
        }
    }
    if($count > floor(count($numbers)/2)){
        return $num;
    }
    else{
        return 0;
    }
}

$arr = [4,2,1,4,2,4];
echo MoreThanHalfNum_Solution($arr);