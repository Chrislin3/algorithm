<?php
header("content-type:text/html;charset=utf-8");
/*
 * 剪绳子 把一根绳子剪成多段，并且使得每段的长度乘积最大。 P96
 */

//动态规划
function integerBreak1($length){
    if($length < 2){
        return 0;
    }
    if($length == 2){
        return 1;
    }

    if($length == 3){
        return 2;
    }
    $products = array();
    $products[0] = 0;
    $products[1] = 1;
    $products[2] = 2;
    $products[3] = 3;
    for($i=4;$i<=$length;$i++){
        $max = 0;
        for($j = 1;$j<$i;$j++){
            $product = $products[$j] * $products[$i-$j];
            if($max < $product){
                $max = $product;
            }
            $products[$i] = $max;
        }
    }
    return $products[$length];
}

//贪心算法
function integerBreak2($length){
    if($length < 2){
        return 0;
    }
    if($length == 2){
        return 1;
    }

    if($length == 3){
        return 2;
    }
    $timesOf3 = floor($length / 3);
    if($length - $timesOf3 * 3 == 1){
        $timesOf3--;
        $timesOf2 = ($length - $timesOf3 * 3)/2;
    }
    return (pow(3,$timesOf3) * pow(2,$timesOf2));

}

echo integerBreak1(10);
echo integerBreak2(10);