<?php
header("content-type:text/html;charset=utf-8");
/*
 * 冒泡法排序：两两比较，让大的数向下沉,或者让小的数往上浮
 * 思想：两两比较相邻记录的关键字，如果反序就交换，直到没有反序的记录为止。
 * 时间复杂度：O（N^2）;额外空间复杂度O（1）
 *
 * */
//第一种：大的数向下沉
function bubbleSort1($arr = array()){
    if($arr==null || count($arr)<2){
        return true;
    }
    for($end = count($arr)-1;$end>0;$end--){ //大循环决定结束的位置end，每循环一次结束位置end就会前移一次

        for($i=0;$i<$end;$i++){
            if($arr[$i]>$arr[$i+1]){
                swap($arr,$i,$i+1);
            }
        }
    }
    return $arr;
}
//第二种：小的数往上浮
function bubbleSort2($arr){
    if($arr == null || count($arr)<2){
        return true;
    }
    else{
        for($start = 0;$start<count($arr)-1;$start++){   //大循环决定结束的位置start，每循环一次结束位置start就会后移一次
            for($i=count($arr)-1;$i > $start;$i--){
                if($arr[$i] < $arr[$i-1]){
                    swap($arr,$i,$i-1);
                }
            }
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
$arr1 = bubbleSort1($arr);
print_r($arr1);//输出结果：Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 9 [4] => 12 [5] => 22 [6] => 33 [7] => 45 [8] => 64 [9] => 67 )
?>