<?php
header("content-type:text/html;charset=utf-8");
/*
 *数组中重复的数字(不打乱数组顺序) P41
 */
function getDuplicate($numbers){
    if($numbers == null){
        return false;
    }
    $start = 1;
    $end = count($numbers)-1;
    while ($end >= $start){
        $mid = (($start + $end) >> 2) + $start;
        $count = getCount($numbers,$start,$mid);
        if($start == $end){
            if($count >1){
                return $start;
            }
            else{
                break;   //没有重复的值，退出循环
            }
        }
        if($count > $mid - $start +1){
            $end = $mid ;
        }
        else{
            $start = $mid +1;
        }
    }
    return false;
}

function getCount($numbers,$start,$end){
    if($numbers == null){
        return false;
    }
    $count = 0;
    for($i=0;$i<count($numbers)-1;$i++){
        if($numbers[$i] >= $start && $numbers[$i] <= $end){
            $count ++;
        }
    }
    return $count;
}

$arr = array(1,3,5,4,3,2,6,7);
echo getDuplicate($arr);