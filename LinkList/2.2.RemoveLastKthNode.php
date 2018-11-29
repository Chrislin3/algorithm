<?php
header("content-type:text/html;charset=utf-8");
/*
 *在单链表和双链表中删除倒数第K个结点 P35
 */
class SingleNode{
    public $value;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function removeSingleLastKthNode(SingleNode $head,$Kth){
    if($head == null || $Kth == 0){
        return $head;
    }
    $cur = $head;
    while ($cur != null){
        $Kth--;
        $cur = $cur->next;
    }
    if($Kth > 0){
        return $head;
    }
    elseif ($Kth == 0){
        return $head->next;
    }
    else{
        $cur = $head;
        while (++$Kth != 0){  //这里是抠边界问题
 //           $Kth++;
            $cur = $cur->next;
        }
        $cur->next = $cur->next->next;
        return $head;
    }
}

class DoubleNode{
    public $value;
    public $last;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function removeDoubleLastKthNode(DoubleNode $head,$Kth){
    if($head == null || $Kth == 0){
        return $head;
    }
    $cur = $head;
    while ($cur != null){
        $Kth--;
        $cur = $cur->next;
    }

    if ($Kth == 0){
        $head =  $head->next;
        $head->last = null;
    }
    if($Kth < 0){
        $cur = $head;
        while (++$Kth != 0){
  //          $Kth ++;
            $cur = $cur->next;
        }
        $next = $cur->next->next;
        $cur->next = $next;
        if($next != null){
            $next->last = $cur;
        }

    }
    return $head;
}


$head1 = new SingleNode(1);
$head1->next = new SingleNode(3);
$head1->next->next = new SingleNode(5);
$head1->next->next->next = new SingleNode(7);
$head1->next->next->next->next = new SingleNode(9);
$head1->next->next->next->next->next = new SingleNode(10);
$head1->next->next->next->next->next->next = new SingleNode(11);
$head1->next->next->next->next->next->next->next = new SingleNode(12);

echo "单链表为：";
echo "</br>";
print_r($head1);
echo "</br>";
echo "</br>";
echo "删除倒数第三个结点后的单链表为：";
echo "</br>";
print_r(removeSingleLastKthNode($head1,3));


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
echo "删除倒数第三个结点后的双向链表为：";
echo "</br>";
print_r(removeDoubleLastKthNode($head2,3));