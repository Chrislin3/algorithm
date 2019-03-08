<?php
function mergeSort(&$arr){
    if ($arr == null || count($arr) < 2) {
        return;
    }
    sortProcess($arr,0,count($arr)-1);
}

function sortProcess(&$arr=array(),$l,$r){
    if($l == $r){
        return;
    }
    $mid = floor(($l+$r)/2);
    sortProcess($arr,$l,$mid);
    sortProcess($arr,$mid+1,$r);
    merge($arr,$l,$mid,$r);
}

function merge(&$arr,$l,$mid,$r){
    $help = array();
    $i = 0;
    $p1 = $l;
    $p2 = $mid +1;
    while($p1<=$mid && $p2<=$r){
        $help[$i++] = $arr[$p1] < $arr[$p2] ? $arr[$p1++] : $arr[$p2++];
    }
    while($p1<=$mid){
        $help[$i++] = $arr[$p1++];
    }
    while($p2<=$r){
        $help[$i++] = $arr[$p2++];
    }
    for($i = 0;$i<count($help);$i++){ //把辅助数组的数据全部填进原数组
        $arr[$l+$i] = $help[$i];
    }
}

$arr = [2,33,45,22,64,67,12,1,0,9];
mergeSort($arr);
print_r($arr);
?>