<?php
header("content-type:text/html;charset=utf-8");
/*
 * 汉诺塔问题（递归）需要2^N-1步
 */

function process($N,$from,$to,$help){
    if($N == 1){
        echo "Move 1 from ".$from." to ".$to."</br>";//如果只有一个数，只需要从开始转移到结束
    }
    else{
        process($N-1,$from,$help,$to);//第一步将数字通过to由from转移到help上
        echo "Move ".$N." from ".$from." to ".$to."</br>";
        process($N-1,$help,$to,$from);//第二步，借助from把数字从help转移到to上去
    }
}

process(3,"左","右","中");
