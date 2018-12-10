<?php
header("content-type:text/html;charset=utf-8");
/*
 * 在一个排序的链表中，存在重复的结点，请删除该链表中重复的结点，重复的结点不保留，返回链表头指针。
 * 例如，链表1->2->3->3->4->4->5 处理后为 1->2->5。P122
 */
class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function deleteDuplication($pHead)
{
    if($pHead == null || $pHead->next == null){
        return $pHead;
    }

    $cur = $pHead;
    $next = $pHead->next;

    while ($cur != null && $next != null){
        if($cur->val == $next->val){

        }

    }

}