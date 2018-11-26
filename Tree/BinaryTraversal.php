<?php
header("content-type:text/html;charset=utf-8");
/*
 *用非递归的方式遍历二叉树 P88
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

function preOrderUnRecure(&$head){
    if($head == null){
        return false;
    }

    $stack = new SplStack();
    $stack->push($head);
    while (!$stack->isEmpty()){
        $cur = $stack->pop();
        echo $cur->value." ";

        if($cur->right != null){
            $stack->push($cur->right);

        }

        if($cur->left != null){
            $stack->push($cur->left);

        }
    }
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

function posOrderUnRecure(&$head){
    if($head == null){

        return false;
    }
    $stack1 = new SplStack();
    $stack2 = new SplStack();
    $stack1->push($head);

    while (! $stack1->isEmpty()){

        $cur = $stack1->pop();
        $stack2->push($cur);

        if($cur->left != null){
            $stack1->push($cur->left);

        }

        if($cur->right != null){
            $stack1->push($cur->right);

        }

    }
    while(!$stack2->isEmpty()){

        echo ($stack2->pop()->value)." ";
    }
}


$head = new Node(5);
$head->left = new Node(3);
$head->right = new Node(8);
$head->left->left = new Node(2);
$head->left->right = new Node(4);
$head->left->left->left = new Node(1);
$head->right->left = new Node(7);
$head->right->left->left = new Node(6);
$head->right->right = new Node(10);
$head->right->right->left = new Node(9);
$head->right->right->right = new Node(11);

preOrderUnRecure($head); //结果： 5 3 2 1 4 8 7 6 10 9 11
echo "</br>";
inOrderUnRecure($head); //结果： 1 2 3 4 5 6 7 8 9 10 11
echo "</br>";
posOrderUnRecure($head);  //结果： 1 2 4 3 6 7 9 11 10 8 5
//print_r($head);