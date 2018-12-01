<?php
header("content-type:text/html;charset=utf-8");
/*
 *替换空格 P51
 */

function replaceSpace($str){
    if($str == null){
        return false;
    }
    $originalLength = strlen($str);
    $blank_num = 0;
    for($i = 0; $i < $originalLength;$i++){
        if($str[$i] == ' '){
            $blank_num ++ ;
        }
    }
    $newLength = $originalLength + $blank_num * 2;
    $p1 = $originalLength - 1;
    $p2 = $newLength - 1;
    while ($p1 != $p2){
        if($str[$p1] != ' '){
            $str[$p2] = $str[$p1];
            $p2 --;
            $p1 --;
        }
        else{
            $str[$p2--] = '0';
            $str[$p2--] = '2';
            $str[$p2--] = '%';
            $p1 --;
        }

    }
    return $str;
}

$str = 'hello world';
echo replaceSpace($str);
