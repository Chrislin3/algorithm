<?php
header("content-type:text/html;charset=utf-8");
/* 随机快排
 * 用到了荷兰国旗问题
 *时间复杂度：O(N * logN);额外空间复杂度O（logN）
 * */

function quickSort(&$arr){
    if($arr == null || count($arr)<2){
        return true;
    }
    quickProcess($arr,0,count($arr)-1);

}

function quickProcess(&$arr,$l,$r){
    if($l<$r){
        swap($arr, $l + floor(randFloat() * ($r - $l + 1)), $r);
        $p = partition($arr,$l,$r);
        quickProcess($arr,$l,$p[0]-1);
        quickProcess($arr,$p[1]+1,$r);
    }
}

function partition(&$arr,$l = 0,$r = 0){   //最后的位置作为划分，返回等于区域的范围
    $less = $l-1;
    //$more = $r+1;
    $more = $r;
    //$num = $arr[$r];
    while ($l<$more){
        if($arr[$l] < $arr[$r]){
            swap($arr,++$less,$l++);//小于区域加1，并与当前数交换，当前区域右移
        }
        elseif ($arr[$l]>$arr[$r]){   //大于区域减1，并于当前数交换，换过来的数是未知的，于是current不变，继续判断
            swap($arr,--$more,$l);
        }
        else{
            $l++;
        }
    }
    swap($arr,$more,$r);//与荷兰国旗问题的不同之处，之前一直把最后一个值r当做num值，最后一步当l和more重合时，应当将r归为中间值，此时就需要more与r交换
    return array($less+1,$more);   //返回边界的标号，在这两个标号之间的值都是相同的
}

function swap(&$arr,$i,$j){  //注意这里引用变量的使用

    $tem = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tem;
}

/**
 * 生成0~1随机小数
 */
function randFloat($min=0, $max=1){
    return $min + mt_rand()/mt_getrandmax() * ($max-$min);
}

$arr = [2,33,45,22,64,6,2,1,0,2];
quickSort($arr);
print_r($arr);