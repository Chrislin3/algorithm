<?php
header("content-type:text/html;charset=utf-8");
/*
 * 插入法排序：
 * 每一个位置的值向前滑动，挨个与它之前的值进行比较，插到合适的位置
 * 时间复杂度：与数据情况有关
 * 最好的情况：O（N）;
 * 最差的情况：O（N^2）
 * 额外空间复杂度O（1）
 * */

function insertSort(&$arr){
    if($arr == null || count($arr)<2){
        return true;
    }

    for($current=1;$current<count($arr);$current++){    //current为目前要进行插入操作的数字，0位置不需要再插入了，所以从1开始
        for($i = $current;$i>0 && $arr[$i-1]>$arr[$i];$i--){ //i>0保证往前滑比较的时候不越界，$arr[$i-1]>$arr[$i] 表示要进行插入操作的数字i与它前面的那个数进行比较，
                                                         //如果比它小就往前滑，所以执行i--，继续和它前一个数比较，直到插进适合它的位置
            swap($arr,$i-1,$i);
        }
    }
    return $arr;
}

function swap(&$arr,$i,$j){  //注意这里引用变量的使用

    $tem = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tem;
}

$arr = [2,33,45,22,64,67,12,1,0,9];
$array = insertSort($arr);
print_r($array);//结果：Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 9 [4] => 12 [5] => 22 [6] => 33 [7] => 45 [8] => 64 [9] => 67 )