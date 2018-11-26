<?php
header("content-type:text/html;charset=utf-8");
/*
 *将正方形矩阵顺时针转动90度 P333
 */

function rotate(&$matrix){
    $zuoRow = 0;
    $zuoCol = 0;
    $youRow = count($matrix) - 1;
    $youCol = count($matrix[0]) - 1;

    while ($zuoRow<=$youRow && $zuoCol<=$youCol){
        printEdge($matrix,$zuoRow++,$zuoCol++,$youRow--,$youCol--);
    }
}

function printEdge(&$matrix,$zuoRow,$zuoCol,$youRow,$youCol){
    $times = $youRow - $zuoRow;

    for($i = 0;$i<$times;$i++){
        $temp = $matrix[$zuoRow][$zuoCol+$i];                            //上边界数值暂且存储
        $matrix[$zuoRow][$zuoCol+$i] = $matrix[$youRow - $i][$zuoCol];   //上边界位置等于左边界数值
        $matrix[$youRow - $i][$zuoCol] = $matrix[$youRow][$youCol - $i]; //左边界位置等于下边界数值
        $matrix[$youRow][$youCol - $i] = $matrix[$zuoRow + $i][$youCol]; //下边界位置等于右边界数值
        $matrix[$zuoRow + $i][$youCol] = $temp;                          //右边界位置等于上边界存储在temp中的数值

    }
}
$matrix = array(array(1,2,3,4),array(5,6,7,8),array(9,10,11,12),array(13,14,15,16));

rotate($matrix);
if($matrix){

    for($i = 0;$i<count($matrix);$i++){
        for($j=0;$j<count($matrix[$i]);$j++){
            echo $matrix[$i][$j]."\t";
        }
        echo "</br>";
    }

}
/*
 * 结果：
 * 13 9 5 1
   14 10 6 2
   15 11 7 3
   16 12 8 4
 */

