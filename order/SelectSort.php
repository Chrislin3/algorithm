<?php
header("content-type:text/html;charset=utf-8");
/*
 * 选择法排序：
 * 两两比较，最小的值在每一次循环的开头
 * 时间复杂度：O（N^2）;额外空间复杂度O（1）
 * */

function selectSort(&$arr){
    if($arr == null || count($arr)<2){
        return true;
    }
  //  echo count($arr);
    for ($start = 0;$start<count($arr)-1;$start++){//大循环决定开始的位置start，每循环一次开始位置就会向下移一次
        $minIndex = $start;  //假设最小值索引在开始位置

        for($i=$start+1;$i<count($arr);$i++){

            $minIndex = ($arr[$minIndex] < $arr[$i]) ? $minIndex : $i; //判断单次循环的最小值，从而确定最小值索引
        }
        swap($arr,$minIndex,$start);//将最小值移到开始的位置

    }
}


function swap(&$arr,$i,$j){  //注意这里引用变量的使用

    $tem = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tem;
}

$arr = [2,33,45,22,64,67,12,1,0,9];
selectSort($arr);
print_r($arr);//结果：Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 9 [4] => 12 [5] => 22 [6] => 33 [7] => 45 [8] => 64 [9] => 67 )