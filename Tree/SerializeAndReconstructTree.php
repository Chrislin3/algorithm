<?php
header("content-type:text/html;charset=utf-8");
/*
 二叉树的序列化和反序列化 P103
 */
class Node{
    public $value;
    public $left;
    public $right;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

//二叉树的序列化
function serialByPre($head){
    if($head == null){

        return "#_";
    }
    $str = $head->value."_";
    $str .= serialByPre($head->left);
    $str .= serialByPre($head->right);
    return $str;

}

//二叉树的反序列化
function reconByPreString($preString){
    $values = explode("_",$preString);
    $queue = new SplQueue();
    foreach ($values as $value){
        $queue->enqueue($value);
    }
    return reconPreOrder($queue);
}

function reconPreOrder($queue){
    $value = $queue->dequeue();
    if($value == "#"){
        return null;
    }
    $head = new Node($value);
    $head->left = reconPreOrder($queue);
    $head->right = reconPreOrder($queue);
    return $head;
}

echo "初始化二叉树：";
echo "</br>";
$head = new Node(1);
$head->left = new Node(2);
$head->right = new Node(3);
$head->left->left = new Node(4);
$head->right->right = new Node(5);
print_r($head);
echo "</br>";
echo "</br>";

echo "二叉树的序列化：";
echo "</br>";
$str = serialByPre($head);
echo $str;
echo "</br>";
echo "</br>";

echo "二叉树的反序列化：";
echo "</br>";
$head = reconByPreString($str);
print_r($head);