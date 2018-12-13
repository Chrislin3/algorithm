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

    $next = $pHead->next;

    if($pHead->val == $next->val){  //若头结点与相邻的节点相等，就一直向下遍历到不等的地方，此时next就指向不等的结点
        while ($next != null && $pHead->val == $next->val){
            $next = $next->next;
        }
        return deleteDuplication($next); //以该不等的结点为头，继续向下遍历
    }
    else{
        $pHead->next = deleteDuplication($pHead->next);//若头结点与相邻的节点不等，那就看下一个结点。
    }

    return $pHead;

}

$head = new ListNode(1);
$head->next = new ListNode(1);
$head->next->next = new ListNode(2);
$head->next->next->next = new ListNode(3);
$head->next->next->next->next = new ListNode(3);
$head->next->next->next->next->next = new ListNode(4);
$head->next->next->next->next->next->next = new ListNode(5);
print_r(deleteDuplication($head));