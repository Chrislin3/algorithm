<?php
header("content-type:text/html;charset=utf-8");
/*
 *数组中重复的数字 P39
 */
function duplicate($numbers,&$duplication){
    //这里要特别注意~找到任意重复的一个值并赋值到duplication[0]
    //函数返回True/False
    if($numbers  == null){
        return false;
    }
    for($i = 0;$i<count($numbers);$i++){
        while ($numbers[$i] != $i){

            if($numbers[$i] == $numbers[$numbers[$i]]){
                $duplication[0] = $numbers[$i];

                return true;
            }
            swap($numbers,$i,$numbers[$i]);//把交换放在审核是否相等后面
        }

    }
    return false;
}

function swap(&$arr,$i,$j){
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

$arr = array(2,2,3,0,4);
duplicate($arr,$a);
print_r($a);