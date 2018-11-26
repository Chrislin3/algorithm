<?php

header("content-type:text/html;charset=utf-8");
/*
 *在二叉树中找到一个结点的后继结点 P151
 */
class Node{
    public $value;
    public $left;
    public $right;
    public $parent;
    public function __construct($value)
    {
        $this->value = $value;
    }

}

function getNextNode($node){
    if($node == null){
        return false;
    }
    if($node->right != null){
        return getLeftMost($node->right);
    }
    else{
        $parent = $node->parent;
        while ($parent !=null && $parent->left != $node){
            $parent = $parent->parent;
            $node = $parent;
        }
        return $parent;
    }
}

function getLeftMost($node){
    if($node == null){
        return false;
    }
    while ($node->left != null){
        $node = $node->left;
    }
    return $node;
}

function inOrderUnRecure(&$head){
    if($head == null){
        return false;
    }

    $stack = new SplStack();
    while (!$stack->isEmpty() || $head != null){
        if($head != null){
            $stack->push($head);
            $head = $head->left;
        }
        else{
            $head = $stack->pop();
            echo $head->value." ";
            $head = $head->right;
        }


    }


}


$head = new Node(6);
$head->parent = null;
$head->left = new Node(3);
$head->left->parent = $head;
$head->left->left = new Node(1);
$head->left->left->parent = $head->left;
$head->left->left->right = new Node(2);
$head->left->left->right->parent = $head->left->left;
$head->left->right = new Node(4);
$head->left->right->parent = $head->left;
$head->left->right->right = new Node(5);
$head->left->right->right->parent = $head->left->right;
$head->right = new Node(9);
$head->right->parent = $head;
$head->right->left = new Node(8);
$head->right->left->parent = $head->right;
$head->right->left->left = new Node(7);
$head->right->left->left->parent = $head->right->left;
$head->right->right = new Node(10);
$head->right->right->parent = $head->right;

echo "当前测试结点为：";
echo "</br>";
$test = $head->right->left;
echo $test->value;
echo "</br>";

echo "测试结点的后继结点是：";
echo "</br>";
$node = getNextNode($test);
echo $node->value;
echo "</br>";

echo "完成中序遍历：";
echo "</br>";
inOrderUnRecure($head);
