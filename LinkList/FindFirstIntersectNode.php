<?php
header("content-type:text/html;charset=utf-8");
/*
 *两个链表相交的一系列问题 P6257
 */

class Node{
    public $value;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function getLoopNode($head){
    if($head == null || $head->next == null || $head->next->next == null){
        return null;
    }
    $slow = $head->next;
    $fast = $head->next->next;
    while ($slow != $fast){
        if($fast->next == null || $fast->next->next == null){
            return null;
        }
        $slow = $slow->next;
        $fast = $fast->next->next;

    }

    $fast = $head;
    while ($slow != $fast){
        $slow = $slow->next;
        $fast = $fast->next;
    }
    return $fast;
}

function noLoop($head1,$head2){
    $cur1 = $head1;
    $cur2 = $head2;
    $n = 0;  //两个链表长度的差值
    while ($cur1->next != null){
        $n ++;
        $cur1 = $cur1->next;
    }
    while ($cur2->next != null){
        $n --;
        $cur2 = $cur2->next;
    }

    if($cur1 != $cur2){
        return null;
    }
    $cur1 = $n > 0 ? $head1 :$head2;      //长链
    $cur2 = $cur1 == $head1 ? $head2 : $head1; //短链
    $n = abs($n);
    while ($n != 0){          //长链先走差值的步数
        $n --;
        $cur1 = $cur1->next;
    }
    while ($cur1 != $cur2){  //两个链一起走
        $cur1 = $cur1->next;
        $cur2 = $cur2->next;

    }
    return $cur1;
}



function FindFirstIntersectNode(){

}