<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入两个单调递增的链表，输出两个链表合成后的链表，当然我们需要合成后的链表满足单调不减规则。 P145
 */
class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function Merge($pHead1, $pHead2)
{
    if($pHead1 == null){
        return $pHead2;
    }
    if($pHead2 == null){
        return $pHead1;
    }
  //  $pHead = new ListNode(null);
    if($pHead1->val <= $pHead2->val){
        $pHead = $pHead1;
        $pHead->next = Merge($pHead1->next,$pHead2);
    }
    else{
        $pHead = $pHead2;
        $pHead->next = Merge($pHead1,$pHead2->next);
    }
    return $pHead;
}

$head1 = new ListNode(1);
$head1->next = new ListNode(4);
$head1->next->next = new ListNode(5);
$head1->next->next->next = new ListNode(7);
$head1->next->next->next->next = new ListNode(8);
$head1->next->next->next->next->next = new ListNode(12);

$head2 = new ListNode(1);
$head2->next = new ListNode(3);
$head2->next->next = new ListNode(6);
$head2->next->next->next = new ListNode(9);
$head2->next->next->next->next = new ListNode(11);

print_r(Merge($head1,$head2));