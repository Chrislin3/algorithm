<?php
header("content-type:text/html;charset=utf-8");
/* 堆排
 * 给定一个数组， 求如果排序之后， 相邻两数的最大差值， 要求时
 * 间复杂度O(N)， 且要求不能用非基于比较的排序。
 * */
function maxGap($nums){
    if($nums == null || count($nums)<2){
        return 0 ;
    }
    $len = count($nums);
    $min = min($nums);

    $max = max($nums);


   if($min == $max){
       return 0;
   }

    $hasNum = array();         //初始化桶内是否有数的数组，长度为输入的数组长度加1，初始值为false
    for($i=0;$i<$len + 1;$i++) {
        $hasNum[$i] = false;
    }

    $mins = array();            //初始化每个桶内的最小值数组，长度为输入的数组长度加1，初始值为0
    for($i=0;$i<$len + 1;$i++) {
        $mins[$i] = 0;
    }

    $maxs = array();            //初始化每个桶内的最大值数组，长度为输入的数组长度加1，初始值为0
    for($i=0;$i<$len + 1;$i++) {
        $maxs[$i] = 0;
    }
   for($i = 0;$i< $len;$i++){
       $bit = bucket($nums[$i],$len,$min,$max);   //求出当前值所在的桶号

       $mins[$bit] = $hasNum[$bit] ? min($mins[$bit],$nums[$i]) : $nums[$i];  //若桶内有数，则求出每个痛的最小值
       $maxs[$bit] = $hasNum[$bit] ? max($maxs[$bit],$nums[$i]) : $nums[$i];    //若桶内有数，则求出每个痛的最大值
       $hasNum[$bit] = true;                                                //将桶内是否有数标志设为真
   }

   $res = 0;
   $lastMax = $maxs[0];     //上一个桶的最大值
    for($i = 1;$i <= $len;$i++){
        if($hasNum[$i]){                            //桶内的值非空，则进行比较，得到差值
            $res = max($res,$mins[$i] - $lastMax);  //差值为当前桶的最小值与上一个非空桶的最大值的差
            $lastMax = $maxs[$i];
        }
    }
    return $res;

}

//计算桶号的函数
function bucket($num,$len,$min,$max){

    return floor(($num - $min) * $len / ($max - $min));
}

$arr = [2,33,45,22,64,6,2,1,0,2];
$res = maxGap($arr);
echo($res);     //输出结果：19