<?php
header("content-type:text/html;charset=utf-8");
/*
 * 给一个链表，若其中包含环，请找出该链表的环的入口结点，否则，输出null。 P139
 *
 */
class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function EntryNodeOfLoop($pHead)
{
    if($pHead == null){
        return null;
    }
    $fast = $pHead->next->next;
    $slow = $pHead->next;
    while($fast != $slow){   //如果相遇就停下，找到相遇的结点（这里的相遇包含没有环的情况，如果没有环，最后slow和fast的值都是null，也会停止循环）
        $fast = $fast->next->next;
        $slow = $slow->next;
    }
    $fast = $pHead;
    while($fast != $slow){
        $fast = $fast->next;
        $slow = $slow->next;
    }

    return $slow;
}
$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
$head->next->next->next->next->next = new ListNode(6);
$head->next->next->next->next->next->next = $head->next->next->next;
print_r(EntryNodeOfLoop($head));