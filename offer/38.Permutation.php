<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入一个字符串,按字典序打印出该字符串中字符的所有排列。
 * 例如输入字符串abc,则打印出由字符a,b,c所能排列出来的所有字符串abc,acb,bac,bca,cab和cba。P197
 * 使用的是回溯法
 */
//function Permutation($str)
//{
//    $arr = [];
//    if($str == null){
//        return null;
//    }
//    $index = 0;
//  //  $source = str_split($str) ;
//    permu($str,$index,$arr);
//    sort($arr);
//    return $arr;
//}
//
//function permu(&$source,$index,&$arr){
//
//    if($index == strlen($source)-1){
//        $arr[] = $source;
//        return;
//    }
//    for($i = $index;$i<strlen($source);$i++){
//        if($i != $index && $source[$i] == $source[$index]){
//            continue;
//        }
//        swap($source,$i,$index);//
//        permu($source,$index + 1,$arr);
//        swap($source,$i,$index);
//    }
//
//}
//function swap(&$arr,$i,$j){
//    $temp = $arr[$i];
//    $arr[$i] = $arr[$j];
//    $arr[$j] = $temp;
//}

function Permutation($str)
{
    $result = array();
    Permu($result, 0, $str);
    sort($result);
    return $result;
}

function Permu(&$result, $begin, &$str)
{
    if($begin == strlen($str) - 1){
        $result[] = $str;
        print_r($result);
        echo "</br>";
        return;
    }
    for($i = $begin; $i < strlen($str); $i++){
        if($i != $begin && $str[$begin] == $str[$i]){
            continue;
        }
        echo $str[$i];
        echo "</br>";
        swap($begin, $i, $str);
        Permu($result, $begin + 1, $str);
        swap($begin, $i, $str);
    }
}

function swap($vala, $valb, &$str)
{
    $tmp = $str[$vala];
    $str[$vala] = $str[$valb];
    $str[$valb] = $tmp;
}

$str = 'abc';
Permutation($str);
//print_r(Permutation($str));