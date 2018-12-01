<?php
header("content-type:text/html;charset=utf-8");
/*
 *单链表的约瑟夫问题 P43
 */
class Node{
    public $value;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function josephusKill1($head,$num){
    if($head == null || $head->next == null || $num == 0){
        return $head;
    }

    $last = $head;
    while ($last->next != $head){
        $last = $last->next;
    }
    $count = 0;
    while ($last != $head){
        if(++ $count == $num){
            $last->next = $head->next;
            $count = 0;
        }
        else{
            $last = $last->next;
        }
        $head = $last->next;
    }
    return $head;
}

function josephusKill2($head,$num){
    if($head == null || $head->next == null || $num == 0){
        return $head;
    }

    $cur = $head->next;
    $tem = 1;

    while ($cur != $head){
        $tem ++;
        $cur = $cur->next;
    }
    $tem = getLive($tem,$num);
    while (-- $tem != 0){
        $head = $head->next;
    }
    $head->next = $head;
    return $head;

}

function getLive($i,$num){
    if($i == 1){
        return 1;
    }
    return (getLive($i - 1,$num) + $num - 1) % $i +1;
}

$head1 = new Node(1);
$head1->next = new Node(2);
$head1->next->next = new Node(3);
$head1->next->next->next = new Node(4);
$head1->next->next->next->next = new Node(5);
$head1->next->next->next->next->next = $head1;
echo "初始循环列表为：";
echo "</br>";
print_r($head1);
echo "</br>";
echo "</br>";
echo "方法1剩余结点为：";
print_r(josephusKill1($head1,2));

echo "</br>";
$head2 = new Node(1);
$head2->next = new Node(2);
$head2->next->next = new Node(3);
$head2->next->next->next = new Node(4);
$head2->next->next->next->next = new Node(5);
$head2->next->next->next->next->next = $head2;
echo "方法2剩余结点为：";
print_r(josephusKill2($head2,2));