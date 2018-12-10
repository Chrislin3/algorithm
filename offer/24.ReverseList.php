<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入一个链表，反转链表后，输出新链表的表头。P142
 */

class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function ReverseList($pHead)
{
    if($pHead == null || $pHead->next == null){
        return $pHead;
    }
    $cur = $pHead;
    $pre = null;
    $next = null;
    while ($cur != null){
        $next = $cur->next;
        $cur->next = $pre;
        $pre = $cur;
        $cur = $next;
    }
    return $pre;   //注意这里返回的是pre，不是pHead ！！！！！！
}

$pHead = new ListNode(1);
$pHead->next = new ListNode(2);
$pHead->next->next = new ListNode(3);
$pHead->next->next->next = new ListNode(4);
$pHead->next->next->next->next = new ListNode(5);
print_r($pHead);
echo "</br>";
print_r(ReverseList($pHead));