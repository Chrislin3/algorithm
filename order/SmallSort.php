<?php
header("content-type:text/html;charset=utf-8");
/*
 * 归并法排序的变形：求最小和
 * */

function smallSum(&$arr){

    if($arr == null || count($arr)<2){
        return 0;
    }

    return mergeProcess($arr,0,count($arr) - 1);
}

function mergeProcess(&$arr,$l,$r){
    if ($l == $r) {
        return true;
    }

    $mid = floor(($l + $r)/2);
    return mergeProcess($arr,$l,$mid) + mergeProcess($arr,$mid+1,$r) +  merge($arr,$l,$mid,$r);

}

function merge(&$arr,$l,$mid,$r){

    $help = array();
    $i = 0;
    $p1 = $l;
    $p2 = $mid + 1;
    $res = 0;
    while ($p1 <= $mid && $p2 <= $r) {
        $res += $arr[$p1] < $arr[$p2] ? ($r - $p2 + 1) * $arr[$p1] : 0;//如果左边比右边小，那么左边的这个数比右边后面的数（有$r - $p2 + 1个）都小，
                                                                       //用这个个数乘以左边的该数，就可以得到该数的最小和
        $help[$i++] = $arr[$p1] < $arr[$p2] ? $arr[$p1++] : $arr[$p2++];
    }

    while ($p1<=$mid){
        $help[$i++] = $arr[$p1++];
    }

    while ($p2<=$r){
        $help[$i++] = $arr[$p2++];
    }

    for($i = 0;$i<$r-$l+1;$i++){
        $arr[$l + $i] = $help[$i];
    }
   // echo $res;
    return $res;
}

$array = [2,33,45,22,64,67,12,1,0,9];
$res = smallSum($array);

echo($res);