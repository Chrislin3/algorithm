<?php
header("content-type:text/html;charset=utf-8");
/*
 * 定义栈的数据结构，请在该类型中实现一个能够得到栈中所含最小元素的min函数（时间复杂度应为O（1））。 P165
 */

$myStack = new SplStack();
$myMin = new SplStack();
function mypush($node)
{
    global $myStack;
    global $myMin;
    $myStack->push($node);
    if($myMin->isEmpty() || $node<=$myMin->top()){
        $myMin->push($node);
    }

}
function mypop()
{
    global $myStack;
    global $myMin;
    if($myStack->top() == $myMin->top()){
        $myMin->pop();
        $myStack->pop();
    }
    else{
        $myStack->pop();
    }
}
function mytop()
{
    global $myStack;
    return $myStack->top();
}
function mymin()
{
    global $myMin;
    return $myMin->top();
}
