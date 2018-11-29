<?php
header("content-type:text/html;charset=utf-8");
/*
 *删除链表的中间结点和a/b处的结点 P38
 */
class Node{
    public $value;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function removeMidNode($head){
    if($head == null || $head->next == null){
        return $head;
    }
    elseif($head->next->next ==null){
        return $head->next;
    }
    else{
        $pre = $head;
        $cur = $head->next->next;
        while ($cur->next != null && $cur->next->next != null){
            $pre = $pre->next;
            $cur = $cur->next->next;
        }
        $pre->next = $pre->next->next;
        return $head;
    }
}

function removeByRatio($head,$a,$b){
    if($a == 0 || $b == 0 || $a>$b){
        return $head;
    }
    $length = 0;
    $cur = $head;
    while ($cur != null){
        $length ++;
        $cur = $cur->next;
    }
    $ratio = ceil($a * $length / $b);
    if($ratio == 1){
        $head = $head->next;
    }
    if($ratio > 1){
        $cur = $head;
        while (--$ratio != 1){
            $cur = $cur->next;
        }
        $cur->next = $cur->next->next;
    }

    return $head;

}

$head1 = new Node(1);
$head1->next = new Node(3);
$head1->next->next = new Node(5);
$head1->next->next->next = new Node(7);
$head1->next->next->next->next = new Node(9);
$head1->next->next->next->next->next = new Node(11);


$head2 = new Node(2);
$head2->next = new Node(4);
$head2->next->next = new Node(6);
$head2->next->next->next = new Node(8);
$head2->next->next->next->next = new Node(10);
$head2->next->next->next->next->next= new Node(12);

echo "当前链表为：";
echo "</br>";
print_r($head1);
echo "</br>";
echo "</br>";
echo "删除中间结点后的单链表为：";
echo "</br>";
print_r(removeMidNode($head1));
echo "</br>";
echo "</br>";

echo "当前链表为：";
echo "</br>";
print_r($head2);
echo "</br>";
echo "</br>";
echo "删除2/3(第4个)结点后的单链表为：";
echo "</br>";
print_r(removeByRatio($head2,2,3));
