<?php
header("content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/24 0024
 * Time: 上午 10:51
 */
function walk($matrix,$i,$j){
    if($i == count($matrix)-1 && $j == count($matrix[0])-1){
        return $matrix[$i][$j];
    }
    if($i == count($matrix)-1){    //到了最下边，只能向右走
        return $matrix[$i][$j] + walk($matrix,$i,$j + 1);
    }
    if($i == count($matrix[0])-1){    //到了最右边，只能向下走
        return $matrix[$i][$j] + walk($matrix,$i + 1,$j);
    }
    $right = walk($matrix,$i ,$j+1);
    $down = walk($matrix,$i+1,$j);
    return $matrix[$i][$j] + min($right,$down);//当前位置加上往右和往下的最小路径和
}

$m = array(array(1,3,5,9),array(8,1,3,4),array(5,0,6,1),array(8,8,4,0));
echo count($m);
//echo $m;
walk($m,0,0);
