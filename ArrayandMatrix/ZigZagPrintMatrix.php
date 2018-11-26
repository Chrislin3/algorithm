<?php
header("content-type:text/html;charset=utf-8");
/*
 *“之”字形打印矩阵 P335
 */

function printMatrixZigZag($matrix){
    //A指针先向右沿着第一行移动，到达最右边的一个元素之后再沿着最后一列向下移动
    $ARow = 0;
    $ACol = 0;
    //B指针先向右沿着第一列移动，到达最下边的一个元素之后再沿着最后一行向右移动
    $BRow = 0;
    $BCol = 0;
    //最后的一个元素所在行和列
    $endRow = count($matrix)-1;
    $endCol = count($matrix[0])-1;
    //标记读取顺序，自上而下还是自下而上
    $fromUp = false;
    while ($ARow != $endRow){     //A指针的行没有达到最后元素的行，循环就会持续进行
        printLevel($matrix, $ARow, $ACol, $BRow, $BCol, $fromUp);
        //A先右再下
        $ARow = $ACol == $endCol ? $ARow+1 : $ARow;
        $ACol = $ACol == $endCol ? $ACol : $ACol+1;
        //B先下再右
        $BRow = $BRow == $endRow ? $BRow : $BRow+1;
        $BCol = $BRow == $endRow ? $BCol+1 : $BCol;
        $fromUp = !$fromUp;
    }

}

function printLevel($matrix, $ARow, $ACol, $BRow, $BCol, $fromUp){
    //自上而下读，以A作为标准
    if($fromUp){
        while ($ARow != $BRow+1){                 //A的行没有达到B的行（重叠时也要读，故 +1）
            echo $matrix[$ARow++][$ACol--]. " "; //按照A的行加一，列减一读取，即向左下方读取
        }
    }
    //自下而上读，，以B作为标准
    else{
        while ($BRow != $ARow-1){                //B的行没有达到A的行（重叠时也要读，故 -1）
            echo $matrix[$BRow--][$BCol++]. " "; //按照B的行减一，列加一读取，即向右上方读取
        }
    }
}

$matrix = array(array(1,2,3,4),array(5,6,7,8),array(9,10,11,12));
printMatrixZigZag($matrix);//输出结果：1 2 5 10 7 4 4 7 10 12
