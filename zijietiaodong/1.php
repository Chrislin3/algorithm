<?php
//$N = trim(fgets(STDIN));
$N = 200;
$retain = 1024 - $N;
$retain_bin = decbin($retain);
//echo $retain_bin;
$arr = str_split((string)$retain_bin);
//print_r($arr);

$arr64 = array();
$arr16 = array();
$arr4 = array();
$arr1 = array();

for($i = 0;$i<count($arr);$i++){
    if($i < count($arr) - 6){
        $arr64[] = $arr[$i];
    }
    elseif ($i >= count($arr) - 6 && $i<count($arr) - 4){
        $arr16[] = $arr[$i];
    }
    elseif ($i >= count($arr) - 4 && $i<count($arr) - 2){
        $arr4[] = $arr[$i];
    }
    elseif ($i >= count($arr) - 2 ){
        $arr1[] = $arr[$i];
    }
}

//print_r($arr64);
//print_r($arr16);
$num64 = bindec((int)(implode('',$arr64))) ;
$num16 = bindec((int)(implode('',$arr16)));
$num4 = bindec((int)(implode('',$arr4)));
$num1 = bindec((int)(implode('',$arr1)));
//echo $num64;
//echo $num16;

$num = $num64 + $num16 + $num4 + $num1;

echo $num;
?>