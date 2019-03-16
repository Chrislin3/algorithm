<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入n个整数，找出其中最小的K个数。例如输入4,5,1,6,2,7,3,8这8个数字，则最小的4个数字是1,2,3,4,。P209
 */
//第一种方法：先排序，然后输出前k个值
function GetLeastNumbers_Solution1($input, $k)
{
    // write code here

    $array = [];
    if($input == null || $k>count($input)){

        return $array;
    }
    sort($input);
 //   print_r($arr);
    for($i = 0;$i<$k;$i++){
        echo "===";
        $array[] = $input[$i];
    }
    return $array;
}

//第二种方法

//第三种方法：利用大根堆数据结构
function GetLeastNumbers_Solution3($input, $k){
    $array = [];
    if($input == null || $k>count($input)){
        return $array;
    }
    $maxHeap = new SplMaxHeap();
    for($i = 0;$i < count($input);$i++){
        $maxHeap->insert($input[$i]);
        if ($k < $maxHeap->count()){
            $maxHeap->extract();
        }

    }
    foreach ($maxHeap as $value){
        $array[] = $value;
    }
    return array_reverse($array);
}

$input = [4,5,1,6,2,7,3,8];

print_r(GetLeastNumbers_Solution3($input,4));