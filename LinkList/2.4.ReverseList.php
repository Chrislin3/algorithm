<?php
header("content-type:text/html;charset=utf-8");
/*
 *翻转单向和双向链表 P40
 */
class SingleNode{
    public $value;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}
function reverseSingleList($head){
    if($head == null || $head->next == null){
        return $head;
    }
    $cur = $head;
    $pre = null;
    $next = null;

    while ($cur != null){
        $next = $cur->next;
        $cur->next = $pre;
        $pre = $cur;
        $cur = $next;
    }
    return $pre;
}

class DoubleNode{
    public $value;
    public $next;
    public $last;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function reverseDoubleList($head){
    if($head == null || $head->next == null){
        return $head;
    }
    $cur = $head;
    $pre = null;
    $next = null;
    while ($cur != null){
        $next = $cur->next;
        $cur->next = $pre;
        $cur->last = $next;
        $pre = $cur;
        $cur = $cur->next;
    }
    return $pre;
}

$head1 = new SingleNode(1);
$head1->next = new SingleNode(3);
$head1->next->next = new SingleNode(5);
$head1->next->next->next = new SingleNode(7);
$head1->next->next->next->next = new SingleNode(9);
$head1->next->next->next->next->next = new SingleNode(11);

echo "当前单链表为：";
echo "</br>";
print_r($head1);
echo "</br>";
echo "</br>";
echo "翻转后的单链表为：";
echo "</br>";
print_r(reverseSingleList($head1));
echo "</br>";
echo "</br>";

$head2 = new DoubleNode(1);
$head2->last = null;
$head2->next = new DoubleNode(3);
$head2->next->last = $head2;
$head2->next->next = new DoubleNode(5);
$head2->next->next->last = $head2->next;
$head2->next->next->next = new DoubleNode(7);
$head2->next->next->next->last = $head2->next->next;
$head2->next->next->next->next = null;


echo "双向链表为：";
echo "</br>";
print_r($head2);
echo "</br>";
echo "</br>";
echo "翻转后的双向链表为：";
echo "</br>";
print_r(reverseDoubleList($head2));