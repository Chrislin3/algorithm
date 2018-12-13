<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入一个整数数组，实现一个函数来调整该数组中数字的顺序，使得所有的奇数位于数组的前半部分，所有的偶数位于数组的后半部分，
 * 并保证奇数和奇数，偶数和偶数之间的相对位置不变。 P129
 */
function reOrderArray($array)
{
    $length = count($array);
    if($length == 0 || $length == 1){
        return $array;
    }
    $odd = 0;
    $even = 0;
    $arr1 = [];
    $arr2 = [];
    for($i = 0;$i<$length;$i++){
        if($array[$i] % 2 == 0){
            $arr1[$even++] = $array[$i];
        }
        else{
            $arr2[$odd++] = $array[$i];
        }
    }

    for($i = 0;$i<$even;$i++){
        $arr2[] = $arr1[$i];

    }

    return $arr2;
}
$array = [1,2,3,4,5];
print_r(reOrderArray($array));