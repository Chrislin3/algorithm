<?php
header("content-type:text/html;charset=utf-8");
/*
 * 把一个数组最开始的若干个元素搬到数组的末尾，我们称之为数组的旋转。
 * 输入一个非减排序的数组的一个旋转，输出旋转数组的最小元素。
 * 例如数组{3,4,5,1,2}为{1,2,3,4,5}的一个旋转，该数组的最小值为1。
 * NOTE：给出的所有元素都大于0，若数组大小为0，请返回0。  P82
 */

function minNumberInRotateArray($rotateArray)
{
    if($rotateArray == null){
        return 0;
    }
    $little = 0;
    $high = count($rotateArray) - 1;
    if($rotateArray[$little] < $rotateArray[$high]){    //如果旋转数组已经是按从小到大排序，那就无需查找，第一个数就是最小的
        return $rotateArray[0];
    }
    while ($little < $high){        //如果左边下标比右边下标小，则进入循环
        if($high == $little + 1){   //如果右边下标就是坐标下边的下一个值，证明最小值找到了，它就是右边下标指向的值
            return $rotateArray[$high];
        }

        $mid = floor(($little + $high)/2);
        if($rotateArray[$little] == $rotateArray[$mid] && $rotateArray[$high] == $rotateArray[$mid]){
            //如果三个索引值相等，那么无法区分中间值归属于前面还是后面，就只能顺序查找
            return midSearch($rotateArray,$little,$high);
        }
        if($rotateArray[$little] <= $rotateArray[$mid]){ //注意这里的等号！！！！！如果这里没有等号，那么对于数组[5,5,5,1,2]，就会陷入死循环
            $little = $mid;
        }
        elseif ($rotateArray[$high] >= $rotateArray[$mid]){//注意这里的等号！！！！！
            $high = $mid;
        }

    }

}

function midSearch($rotateArray,$index1,$index2){ //遍历查找两个索引之间的最小值
    $min = $rotateArray[$index1];
    for($i = $index1 + 1;$i<=$index2;$i++){
        if($rotateArray[$i] < $min){
            $min = $rotateArray[$i];
        }
    }
    return $min;

}

//$rotateArray = [6501,6828,6963,7036,7422,7674,8146,8468,8704,8717,9170,9359,9719,9895,9896,9913,9962,154,293,334,492,1323,1479,1539,1727,1870,1943,2383,2392,2996,3282,3812,3903,4465,4605,4665,4772,4828,5142,5437,5448,5668,5706,5725,6300,6335];
$rotateArray = [1,2,3,4];
echo minNumberInRotateArray($rotateArray);