<?php
header("content-type:text/html;charset=utf-8");
/*
 *打印两个有序链表的公共部分 P34
 * 注意是有序链表哦！！！
 */
class Node{
    public $value;
    public $next;
    public function __construct($value){
        $this->value = $value;
    }

}

function printCommonPrint(Node $head1,Node $head2){
    while ($head1 != null && $head2!= null){
        if($head1->value < $head2->value){
            $head1 = $head1->next;
        }
        elseif ($head1->value > $head2->value){
            $head2 = $head2->next;
        }
        else{
            echo $head1->value." ";
            $head1 = $head1->next;
            $head2 = $head2->next;
        }
    }
}

$head1 = new Node(1);
$head1->next = new Node(3);
$head1->next->next = new Node(5);
$head1->next->next->next = new Node(7);
$head1->next->next->next->next = new Node(9);
$head1->next->next->next->next->next = new Node(10);
$head1->next->next->next->next->next->next = new Node(11);
$head1->next->next->next->next->next->next->next = new Node(12);

$head2 = new Node(2);
$head2->next = new Node(4);
$head2->next->next = new Node(6);
$head2->next->next->next = new Node(8);
$head2->next->next->next->next = new Node(9);
$head2->next->next->next->next->next = new Node(10);
$head2->next->next->next->next->next->next = new Node(11);
$head2->next->next->next->next->next->next->next = new Node(12);

echo "链表1为：";
echo "</br>";
print_r($head1);
echo "</br>";
echo "</br>";

echo "链表2为：";
echo "</br>";
print_r($head2);
echo "</br>";
echo "</br>";

echo "两个链表的公共部分是：";
echo "</br>";
printCommonPrint($head1,$head2);