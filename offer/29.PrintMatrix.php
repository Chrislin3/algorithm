<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入一个矩阵，按照从外向里以顺时针的顺序依次打印出每一个数字. P161
 */

function printMatrix($matrix)
{
    $leftRow = 0;
    $leftCol = 0;
    $rightRow = count($matrix) - 1;
    $rightCol = count($matrix[0]) - 1;
    if($matrix == null){
        return null;
    }

    $arr = [];
    $array = [];
    while ($leftRow <= $rightRow && $leftCol <= $rightCol){
        $arr[] = printEdge($matrix,$leftRow++,$leftCol++,$rightRow--,$rightCol--); //得到一个二维数组，注意数组的添加方式
    }
    foreach ($arr as $value){
        foreach ($value as $val){
            $array[] = $val;
        }

    }
    return $array;
}

function printEdge($matrix,$leftRow,$leftCol,$rightRow,$rightCol){
    $arr = [];
    //注意分支if-elseif-else的添加，它们三个有重叠
    if($leftRow == $rightRow){         //如果只有一行，必定是从左至右打印
        for($i = $leftCol; $i<=$rightCol;$i ++ ){
         //   echo $matrix[$leftRow][$i]." ";
        //    echo "=====";
            $arr[] = $matrix[$leftRow][$i];
        }
    }
    elseif($leftCol == $rightCol){  //如果只有一列，必定是从上至下打印
        for($i = $leftRow; $i<=$rightRow;$i ++ ){
          //  echo $matrix[$i][$leftCol]." ";
            $arr[] = $matrix[$i][$leftCol];
        }
    }
    else{
        for($i = $leftCol;$i < $rightCol;$i++){
            //   echo $matrix[$leftRow][$i]." ";
            $arr[] = $matrix[$leftRow][$i];
        }
        for($i = $leftRow;$i < $rightRow;$i++){
            //    echo $matrix[$i][$rightCol]." ";

            $arr[] = $matrix[$i][$rightCol];
        }
        for($i = $rightCol;$i > $leftCol;$i--){
            //    echo $matrix[$rightRow][$i]." ";
            $arr[] = $matrix[$rightRow][$i];
        }
        for($i = $rightRow;$i > $leftRow;$i--){
            //  echo $matrix[$i][$leftCol]." ";
            $arr[] = $matrix[$i][$leftCol];
        }
    }

    return $arr;
}

//$matrix = array(array(1,2,3,4),array(5,6,7,8),array(9,10,11,12),array(13,14,15,16),array(17,18,19,20));
$matrix = [[1,2,3,4,5]];
print_r(printMatrix($matrix));