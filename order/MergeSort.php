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

//函数功能：执行排序递归过程
function sortProcess(&$arr,$l,$r){
    if ($l == $r) {                    //这个范围只有一个数，表明已经排好了
        return true;
    }

    $mid = floor(($l + $r)/2);         //求中点的位置

    sortProcess($arr,$l,$mid);        //左部分进行排序, T(N/2)
    sortProcess($arr,$mid+1,$r);      //右部分进行排序, T(N/2)
    merge($arr,$l,$mid,$r);               //整体归并排序，传参的意义：从l到min已经排好序，mid+1到r已经排好序, O(N)
    //T(N) = 2T(N/2) + O(N)
    //根据master公式O(N^d * logN)，复杂度为O(N * logN)
}

//函数功能：从l到min已经排好序，mid+1到r已经排好序，如何让它整体有序
function merge(&$arr,$l,$mid,$r){
    $help = array();                  //初始化辅助数组
    $i = 0;                            //合并数组的索引
    $p1 = $l;                          //p1指向左边数组的起始位置，相当于index1
    $p2 = $mid + 1;                    //p2指向右边数组的起始位置，相当于index2
    while($p1<=$mid && $p2<=$r){      //这是谁小填谁的过程
        $help[$i++] = $arr[$p1] < $arr[$p2] ? $arr[$p1++] : $arr[$p2++]; //谁小填谁的过程中还伴随着指针的右移
    }
    //两个必有且只有一个越界，即使这两个while是顺序执行的，但是只会执行一个
    while($p1<=$mid){                //p2越界，p1数组还有值，那就要把p1剩下的拷贝进辅助数组，此时不会执行下一个while循环
        $help[$i++] = $arr[$p1++];
    }

    while($p2<=$r){                //进入这个while的时候，前一个while肯定没有执行，p1越界，p2数组还有值，那就要把p2剩下的拷贝进辅助数组
        $help[$i++] = $arr[$p2++];
    }

    for($i = 0;$i<count($help);$i++){ //把辅助数组的数据全部填进原数组
        $arr[$l+$i] = $help[$i];
    }
}

$arr = [2,33,45,22,64,67,12,1,0,9];
mergeSort($arr);
print_r($arr);