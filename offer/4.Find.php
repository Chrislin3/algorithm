<?php
header("content-type:text/html;charset=utf-8");
/*
 *二维数组中查找P45
 */

function Find($matrix,$num){
    $row_length = count($matrix);
    $col_length = count($matrix[0]);

    if($matrix==null){
        return false;
    }
    $row = 0;
    $col = $col_length - 1;
    while ($row < $row_length && $col >= 0){
        if($matrix[$row][$col] == $num){
            return true;
        }
        elseif ($matrix[$row][$col] > $num){
            $col --;
        }
        else{
            $row ++;
        }
    }
    return false;

}

$matrix = array(array(1,2,8,9),array(2,4,9,12),array(4,7,10,13),array(6,8,11,15));
echo Find($matrix,7);