<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入两个整数序列，第一个序列表示栈的压入顺序，请判断第二个序列是否可能为该栈的弹出顺序。
 * 假设压入栈的所有数字均不相等。
 * 例如序列1,2,3,4,5是某栈的压入顺序，序列4,5,3,2,1是该压栈序列对应的一个弹出序列，但4,3,5,1,2就不可能是该压栈序列的弹出序列。
 * （注意：这两个序列的长度是相等的） P168
 */

function IsPopOrder($pushV, $popV)
{
    if(count($pushV) == 0 || count($pushV) != count($popV)){
        return false;
    }
    $myPush = new SplStack();
    $myPop = new SplStack();
    for($i = count($popV)-1;$i>=0;$i--){
        $myPop->push($popV[$i]);
    }
    for($i = 0;$i<count($pushV);$i++){
        if($pushV[$i] != $myPop->top()){
            $myPush->push($pushV[$i]);
        }
        else{
            $myPop->pop();
        }
    }

    while (!$myPush->isEmpty()){
        if($myPush->pop() != $myPop->pop()){
            return false;
        }
    }
    return true;
}

$pushV = [1,2,3,4,5];
$popV = [4,5,3,2,1];
echo IsPopOrder($pushV, $popV);