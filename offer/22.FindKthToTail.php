<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入一个链表，输出该链表中倒数第k个结点。 P134
 */
class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function FindKthToTail($head, $k)
{
    if($head == null || $k ==0){
        return null;
    }
    $count = 0;
    $cur = $head;
    while ($cur != null){
        $cur = $cur->next;
        $count++;
    }
    if($count < $k){
        return null;
    }
    for($i = 1;$i<=$count-$k;$i++){
        $head = $head->next;
    }
    return $head;
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
print_r(FindKthToTail($head,0));