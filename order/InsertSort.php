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

    for($i=1;$i<count($arr);$i++){    //i为即将要进行插入操作的数，0位置不需要在插入了，所以从1开始
        for($j = $i-1;$j>=0 && $arr[$j]>$arr[$j+1];$j--){ //j>=0保证不越界，$arr[$j]>$arr[$j+1] 表示要进行插入操作的数与它前面的那个数进行比较，
                                                         //如果比它小就往前滑，之后j-1，继续和它前一个数比较，直到插进适合它的位置
            swap($arr,$j,$j+1);
        }
    }
}

function swap(&$arr,$i,$j){  //注意这里引用变量的使用

    $tem = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tem;
}

$arr = [2,33,45,22,64,67,12,1,0,9];
insertSort($arr);
print_r($arr);//结果：Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 9 [4] => 12 [5] => 22 [6] => 33 [7] => 45 [8] => 64 [9] => 67 )