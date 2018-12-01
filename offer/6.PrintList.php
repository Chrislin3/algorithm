<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/1 0001
 * Time: 下午 1:11
 */
header("content-type:text/html;charset=utf-8");
/*
 *从尾到头打印链表 P58
 */
class Node{
    public $value;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}
function printListFromTailToHead($head){
    if($head == null || $head->next == null){
        return [];
    }

    $cur = $head;
    $pre = null;
    $next = null;
    while ($cur != null){
        $next = $cur->next;
        $cur->next = $pre;
        $pre = $cur;
        $cur = $next;
    }
    $arr = [];
    while($pre != null){
        $arr[] = $pre->value;
        $pre = $pre->next;
    }
    return $arr;
}

$head = new Node(1);
$head->next = new Node(2);
$head->next->next = new Node(3);
$head->next->next->next = new Node(4);
$head->next->next->next->next = new Node(5);
print_r($head);
echo "</br>";
print_r(printListFromTailToHead($head));
