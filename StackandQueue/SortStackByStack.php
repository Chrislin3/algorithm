<?php
header("content-type:text/html;charset=utf-8");
/*
 * 用一个栈实现另一个栈的排序 P13
 */

function sortStackByStack(SplStack $stack){
    $help = new SplStack();
    if($stack->isEmpty()){
        return false;
    }

    while (! $stack->isEmpty()){
        $top = $stack->pop();

        while (! $help->isEmpty() && $top > $help->top()){
            $stack->push($help->pop());
        }
        $help->push($top);
    }

    while (! $help->isEmpty()){
        $stack->push($help->pop());
    }
}

echo "初始化栈：";
echo "</br>";
$stack = new SplStack();
$stack ->push(3);
$stack ->push(7);
$stack ->push(2);
$stack ->push(0);
$stack ->push(1);
print_r($stack);
echo "</br>";
echo "</br>";

echo "栈排序：";
echo "</br>";
sortStackByStack($stack);
print_r($stack);