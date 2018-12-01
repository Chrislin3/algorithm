<?php
header("content-type:text/html;charset=utf-8");
/*
 *判断一个列表是否是回文结构 P48
 */
class Node{
    public $value;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function isPalindrome1($head){
    if($head == null){
        return false;
    }
    $stack = new SplStack();
    $cur = $head;
    while ($cur != null){
        $stack->push($cur->value);
        $cur = $cur->next;
    }
    while ($head != null){
        if($head->value == $stack->pop()){
            $head = $head->next;
        }
        else{
            echo "单链表不是回文结构";
            return false;
        }
    }
    echo "单链表是回文结构";
    return true;
}

function isPalindrome2($head){
    if($head == null){
        return false;
    }
    $length = 0;
    $cur = $head;
    while ($cur != null){
        $length ++;
    }
    $stack = new SplStack();
    $num = floor($length / 2);
    $yushu = $length % 2;
    while ($head != null){
        $num --;
        if($num != 0){
            $stack->push($head->value);
            $head = $head->next;
        }
        elseif ($yushu == 0){

        }

    }
}

$head = new Node(1);
$head->next = new Node(2);
$head->next->next = new Node(3);
$head->next->next->next = new Node(2);
$head->next->next->next->next = new Node(1);
print_r($head);
echo "</br>";
echo isPalindrome1($head);