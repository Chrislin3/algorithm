<?php
header("content-type:text/html;charset=utf-8");
/*
 * 荷兰国旗问题
 * 传入数组arr和数字num，比num小的值放在数组左边，比num大的值放在数组右边，和num相同的值放在数组中间
 * */

function netherlandFlag(&$arr,$l = 0,$r = 0,$num){
    $less = $l-1;
    $more = $r+1;
    $current = $l;
    while ($current<$more){
        if($arr[$current] < $num){
            swap($arr,++$less,$current++);//小于区域加1，并与当前数交换，当前区域右移
        }
        elseif ($arr[$current]>$num){   //大于区域减1，并于当前数交换，换过来的数是未知的，于是current不变，继续判断
            swap($arr,--$more,$current);
        }
        else{
            $current++;
        }
    }
}

function swap(&$arr,$i,$j){  //注意这里引用变量的使用

    $tem = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tem;
}

$arr = [2,33,45,22,64,6,2,1,0,2];
netherlandFlag($arr,0,count($arr)-1,2);
print_r($arr);