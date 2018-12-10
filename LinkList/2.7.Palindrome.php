<?php
header("content-type:text/html;charset=utf-8");
/*
 *判断一个链表是否是回文结构 P48
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
    if($head == null || $head->next == null){
        echo "单链表是回文结构";
        return true;
    }
    $right = $head->next;
    $cur = $head;
    while ($cur->next != null && $cur->next->next != null){
        $right = $right ->next;
        $cur = $cur->next->next;
    }
    $stack = new SplStack();
    while ($right != null){
        $stack->push($right->value);
        $right = $right->next;
    }

    while (! $stack->isEmpty()){
        if($head->value != $stack->pop()){
            echo "单链表不是回文结构";
            return false;
        }
        $head = $head->next;
    }
    echo "单链表是回文结构";
    return true;

}

function isPalindrome3($head){
    if($head == null || $head->next == null){
        echo "单链表是回文结构";
        return true;
    }
    $n1 = $head;
    $n2 = $head;
    while ($n2->next != null && $n2->next->next != null){
        $n1 = $n1->next;  //中间结点
        $n2 = $n2->next->next; //终点结点
    }
    $n3 = $n1->next;   //右边链表的开头
    $n1->next = null;
    //右边链表进行翻转
    $next = null;
    $pre = null;
    while ($n3 != null){
        $next = $n3->next;
        $n3->next = $pre;
        $pre = $n3;
        $n3 = $next;
    }
    while ($head != null && $pre != null){
        if($head->value != $pre->value){
            echo "单链表不是回文结构";
            return false;
        }
        $head = $head->next;
        $pre = $pre->next;
    }
    echo "单链表是回文结构";
    return true;


}
echo "单链表为：";
echo "</br>";
$head1 = new Node(1);
$head1->next = new Node(2);
$head1->next->next = new Node(3);
$head1->next->next->next = new Node(2);
$head1->next->next->next->next = new Node(1);
print_r($head1);
echo "</br>";
echo "</br>";
echo "方法1判断是否回文：";
echo "</br>";
echo isPalindrome1($head1);

$head2 = new Node(1);
$head2->next = new Node(2);
$head2->next->next = new Node(3);
$head2->next->next->next = new Node(2);
$head2->next->next->next->next = new Node(1);
echo "</br>";
echo "</br>";
echo "方法2判断是否回文：";
echo "</br>";
echo isPalindrome2($head2);

$head3 = new Node(1);
$head3->next = new Node(2);
$head3->next->next = new Node(3);
$head3->next->next->next = new Node(2);
$head3->next->next->next->next = new Node(1);
echo "</br>";
echo "</br>";
echo "方法3判断是否回文：";
echo "</br>";
echo isPalindrome3($head3);