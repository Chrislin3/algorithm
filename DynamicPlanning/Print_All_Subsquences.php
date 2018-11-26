<?php
header("content-type:text/html;charset=utf-8");
/*
 * 打印所有子串（递归）
 */
function printAllSubsquence($str,$i,$res){//res是上级做的决定扔给我的是什么，有可能是空，也有可能是上一级的字符
    //basecase: i来到了整个字符串的终止位置
    if($i == count($str)) {
        echo $res."</br>";         //打印上级扔给我的字符串
        return;
    }
    else{//做决策，要当前字符还是不要
        printAllSubsquence($str,$i+1,$res);//我不要当前字符
        printAllSubsquence($str,$i+1,$res.$str[$i]);//我要当前字符
    }

}

$test = "abc";
$str = str_split($test);//字符串转为数组
printAllSubsquence($str,0,"");
