<?php
header("content-type:text/html;charset=utf-8");
/*
 *转圈打印矩阵 P331
 */
function spiralOrderPrint($matrix){
    $zuoRow = 0;
    $zuoCol = 0;
    $youRow = count($matrix) - 1;
    $youCol = count($matrix[0]) - 1;

    while ($zuoRow<=$youRow && $zuoCol<=$youCol){
        printEdge($matrix,$zuoRow++,$zuoCol++,$youRow--,$youCol--);
    }
}

function printEdge($matrix,$zuoRow,$zuoCol,$youRow,$youCol){
    if($zuoRow == $youRow){                                      //子矩阵只有一行
        for($i = $zuoCol;$i<=$youCol;$i++){
            echo $matrix[$zuoRow][$i]."";
        }
    }
    elseif($zuoCol == $youCol){                                      //子矩阵只有一列
        for($i = $zuoRow;$i<=$youRow;$i++){
            echo $matrix[$i][$zuoCol]."";
        }
    }
    else{
        $curRow = $zuoRow;
        $curCol = $zuoCol;
        while ($curCol != $youCol){              //游走在上边界，不变的是左上角的行$zuoRow
            echo $matrix[$zuoRow][$curCol]." ";
            $curCol ++;
        }
        while ($curRow != $youRow){             //游走在右边界，不变的是右下角的列$youCol
            echo $matrix[$curRow][$youCol]." ";
            $curRow ++;
        }
        while ($curCol != $zuoCol){             //游走在下边界，不变的是右下角的行$youRow
            echo $matrix[$youRow][$curCol]." ";
            $curCol --;
        }
        while ($curRow != $zuoRow){             //游走在左边界，不变的是左上角的列$zuoCol
            echo $matrix[$curRow][$zuoCol]." ";
            $curRow --;
        }
    }


}

$matrix = array(array(1,2,3,4),array(5,6,7,8),array(9,10,11,12),array(13,14,15,16));
spiralOrderPrint($matrix);//输出结果：1 2 3 4 8 12 16 15 14 13 9 5 6 7 11 10