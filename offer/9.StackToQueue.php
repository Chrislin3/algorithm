<?php
header("content-type:text/html;charset=utf-8");
/*
 * 用两个栈来实现一个队列，完成队列的Push和Pop操作。 队列中的元素为int类型。 P68
 */

$push_stack = new SplStack();
$pop_stack = new SplStack();
function mypush($node)
{
    global $push_stack;
    $push_stack->push($node);

}
function mypop()
{
    global $push_stack;
    global $pop_stack;
    if($pop_stack->isEmpty() && $push_stack->isEmpty()){
        return false;
    }
    else if($pop_stack->isEmpty()){
        while (!$push_stack->isEmpty()){
            $node = $push_stack->pop();
            $pop_stack->push($node);
        }
    }

    return $pop_stack->pop();


}

