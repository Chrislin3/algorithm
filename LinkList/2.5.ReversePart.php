<?php
header("content-type:text/html;charset=utf-8");
/*
 *翻转部分单向链表 P40
 */
class Node{
    public $value;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function reversePart($head,$from,$to){
    $length = 0;
    $node1 = $head;
    $fPre = null;
    $fPos = null;
    while ($node1 != null ){
        $length++;
        $fPre = $length == $from-1 ? $node1 : $fPre;  //随着node的不断递推，让fPre指向from的前一结点
        $fPos = $length == $to+1   ? $node1 : $fPos;  //随着node的不断递推，让fPos指向to的后一结点
        $node1 = $node1->next;
    }
    if($from<1 || $from > $to || $to>$length){
        return $head;
    }

    $node1 = $fPre == null ? $head : $fPre->next;  //node1就相当于pre（程序2.4）啊
    $node2 = $node1->next;       ////node2就相当于cur（程序2.4）啊
    $node1->next = $fPos;
    $next = null;

    while ($node2 != $fPos){

        $next = $node2->next;
        $node2->next = $node1;
        $node1 = $node2;
        $node2 = $next;
    }
    if($fPre != null){         //没有换头
        $fPre->next = $node1;
        return $head;
    }
    return $node1;
}

$head = new Node(1);
$head->next = new Node(3);
$head->next->next = new Node(5);
$head->next->next->next = new Node(7);
$head->next->next->next->next = new Node(9);
$head->next->next->next->next->next = new Node(11);

echo "当前链表为：";
echo "</br>";
print_r($head);
echo "</br>";
echo "</br>";
echo "翻转部分结点后的单链表为：";
echo "</br>";
print_r(reversePart($head,2,5));
echo "</br>";
echo "</br>";