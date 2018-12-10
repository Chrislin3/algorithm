<?php
header("content-type:text/html;charset=utf-8");
/*
 *两个单链表生成相加链表 P59
 */
class Node{
    public $value;
    public $next;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function addList(Node $head1,Node $head2){
    if($head1 == null && $head2 == null){
        return null;
    }

    $stack1 = new SplStack();
    $stack2 = new SplStack();

    while ($head1 != null){
        $stack1->push($head1);
        $head1 = $head1->next;
    }

    while ($head2 != null){
        $stack2->push($head2);
        $head2 = $head2->next;
    }

    $jinwei = 0;

    $node = null;
    while (! $stack1->isEmpty() || ! $stack2->isEmpty()){
        $n1 = $stack1->isEmpty() ? 0 : $stack1->pop()->value;
        $n2 = $stack2->isEmpty() ? 0 : $stack2->pop()->value;
        $n = $n1 + $n2 + $jinwei;
        $pre = $node;             //注意这三行！！！旧的结点与新结点的连接方式！！！
        $node = new Node($n % 10);
        $node->next = $pre;

        $jinwei = floor($n / 10);

    }

    if($jinwei == 1){
        $pre = $node;
        $node = new Node(1);
        $node->next = $pre;

    }

    return $node;
}

$head1 = new Node(9);
$head1->next = new Node(3);
$head1->next->next = new Node(7);

$head2 = new Node(6);
$head2->next = new Node(3);

print_r($head1);
//Node Object ( [value] => 9 [next] => Node Object ( [value] => 2 [next] => Node Object ( [value] => 7 [next] => ) ) )
echo "</br>";
print_r($head2);
//Node Object ( [value] => 6 [next] => Node Object ( [value] => 3 [next] => ) )
echo "</br>";
print_r(addList($head1,$head2));
//结果：Node Object ( [value] => 9 [next] => Node Object ( [value] => 9 [next] => Node Object ( [value] => 0 [next] => ) ) )

echo "</br>";


?>