<?php
header("content-type:text/html;charset=utf-8");
/*
 * 在 O(1) 时间内删除链表节点。 P119
 */
class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function deleteNode($head,$deleteNode){
    if($head == null || $deleteNode == null){
        return false;
    }
    if($head->next == null){
        return null;
    }
    if($deleteNode->next == null){
        return traverseDelete($head);
    }
    else{
        $deleteNode->val = $deleteNode->next->val;
        $deleteNode->next = $deleteNode->next->next;
        return $head;
    }
}

function traverseDelete($head){
    $cur = $head;
    while ($cur->next->next != null){
        $cur = $cur->next;

    }
    $cur->next = null;
    return $head;
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
$deleteNode = $head->next->next->next->next;
print_r(deleteNode($head,$deleteNode));