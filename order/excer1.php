<?php
function bubbleSort($arr){
    if($arr == null || count($arr)<2){
        return true;
    }
    else{
        for($end = count($arr)-1;$end>0;$end--){
            for($i=0;$i<$end;$i++){
                if($arr[$i]>$arr[$i+1]){
                    swap($arr,$i,$i+1);
                }
            }
        }
    }
    return $arr;
}

function bubbleSort2($arr){
    if($arr == null || count($arr)<2){
        return true;
    }
    else{
        for($start = 0;$start<count($arr)-1;$start++){
            for($i=count($arr)-1;$i > $start;$i--){
                if($arr[$i] < $arr[$i-1]){
                    swap($arr,$i,$i-1);
                }
            }
        }
    }
    return $arr;
}

function swap(&$arr,$i,$j){
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;

}
$arr = [2,33,45,22,64,67,12,1,0,9];
$array = bubbleSort2($arr);
print_r($array);
?>