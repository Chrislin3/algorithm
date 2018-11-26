<?php
header("content-type:text/html;charset=utf-8");
/*
 * 仅用递归函数和栈操作逆序一个栈 P8
 */

function getAndRemoveLastElement(SplStack $stack){
    if($stack->isEmpty()){
        return false;
    }
    $value = $stack->pop();
    if($stack->isEmpty()){
        return $value;
    }
    else{
        $last = getAndRemoveLastElement($stack);
        $stack->push($value);
        return $last;
    }
}

function reverse(SplStack $stack){
    if($stack->isEmpty()){
        return false;
    }
    else{
        $value = getAndRemoveLastElement($stack);
        reverse($stack);
        $stack->push($value);

    }
}

echo "原栈：";
echo "</br>";
$stack = new SplStack();
$stack->push(1);
$stack->push(7);
$stack->push(0);
$stack->push(2);
print_r($stack);
echo "</br>";

echo "逆序后的栈：";
echo "</br>";
reverse($stack);
print_r($stack);