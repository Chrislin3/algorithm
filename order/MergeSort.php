<?php
header("content-type:text/html;charset=utf-8");
/*
 * 归并法排序：
 * master公式的使用
 * T(N) = a*T(N/b) + O(N^d)
 *  1) log(b,a) > d -> 复杂度为O(N^log(b,a))
 *  2) log(b,a) = d -> 复杂度为O(N^d * logN)
 *  3) log(b,a) < d -> 复杂度为O(N^d)
 *
 * 时间复杂度：O(N * logN);额外空间复杂度（help辅助数组）O（N）
 * */

function mergeSort(&$arr){
    if ($arr == null || count($arr) < 2) {
        return;
    }
    sortProcess($arr,0,count($arr) - 1);  //对0到终点的数据进行排序
}

function sortProcess(&$arr,$l,$r){
    if ($l == $r) {                    //这个范围只有一个数，表明已经排好了
        return true;
    }

    $mid = floor(($l + $r)/2);

    sortProcess($arr,$l,$mid);        //左部分进行排序, T(N/2)
    sortProcess($arr,$mid+1,$r);      //右部分进行排序, T(N/2)
    merge($arr,$l,$mid,$r);               //整体归并排序，传参的意义：从l到min已经排好序，mid到r已经排好序, O(N)
    //T(N) = 2T(N/2) + O(N)
    //根据master公式O(N^d * logN)，复杂度为O(N * logN)
}

function merge(&$arr,$l,$mid,$r){
    $help = array_fill(0,$r-$l,0);     //初始化生成一个0到$r-$l的0数组作为辅助数组，其长度为$r-$l+1;
    $i = 0;                            //合并数组的索引
    $p1 = $l;                          //p1指向左边数组的起始位置
    $p2 = $mid + 1;                    //p2指向右边数组的起始位置
    while($p1<=$mid && $p2<=$r){
        $help[$i++] = $arr[$p1] < $arr[$p2] ? $arr[$p1++] : $arr[$p2++];
    }
    //两个必有且只有一个越界
    while($p1<=$mid){                //p2越界，p1数组还有值
        $help[$i++] = $arr[$p1++];
    }

    while($p2<=$r){                //p1越界，p2数组还有值
        $help[$i++] = $arr[$p2++];
    }

    for($i = 0;$i<count($help);$i++){
        $arr[$l+$i] = $help[$i];
    }
}

$arr = [2,33,45,22,64,67,12,1,0,9];
mergeSort($arr);
print_r($arr);