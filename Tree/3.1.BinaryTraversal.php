<?php
header("content-type:text/html;charset=utf-8");
/*
 *分别用递归和非递归的方式遍历二叉树 P88
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

function preOrderUnRecure1($head){
    if($head == null){
        return ;
    }

    echo $head->value." ";
    preOrderUnRecure1($head->left);
    preOrderUnRecure1($head->right);
}

function preOrderUnRecure2($head){
    if($head == null){
        return ;
    }

    $stack = new SplStack();
    $stack->push($head);
    while (!$stack->isEmpty()){
        $cur = $stack->pop();//注意这里，下一次循环应该是从当前的弹出结点为起点，而不是head
        echo $cur->value." ";

        if($cur->right != null){
            $stack->push($cur->right);
        }

        if($cur->left != null){
            $stack->push($cur->left);
        }
    }
}

function inOrderUnRecure1($head){
    if($head == null){
        return ;
    }

    inOrderUnRecure1($head->left);
    echo $head->value." ";
    inOrderUnRecure1($head->right);
}

function inOrderUnRecure2($head){
    if($head == null){
        return false;
    }

    $stack = new SplStack();

    while(! $stack->isEmpty() || $head != null){
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

function posOrderUnRecure1($head){
    if($head == null){
        return ;
    }

    posOrderUnRecure1($head->left);
    posOrderUnRecure1($head->right);
    echo $head->value." ";

}

function posOrderUnRecure2($head){
    if($head == null){
        return ;
    }

    $stack1 = new SplStack();
    $stack2 = new SplStack();
    $stack1->push($head);
    while (! $stack1->isEmpty()){
        $head = $stack1->pop();
        $stack2->push($head);
        if($head->left != null){
            $stack1->push($head->left);
        }
        if($head->right != null){
            $stack1->push($head->right);
        }
    }
    while (! $stack2->isEmpty()){
        $head = $stack2->pop();
        echo $head->value." ";

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

preOrderUnRecure1($head); //结果： 5 3 2 1 4 8 7 6 10 9 11
preOrderUnRecure2($head); //结果： 5 3 2 1 4 8 7 6 10 9 11

inOrderUnRecure1($head);    //结果： 1 2 3 4 5 6 7 8 9 10 11
inOrderUnRecure2($head);    //结果： 1 2 3 4 5 6 7 8 9 10 11

posOrderUnRecure1($head);  //结果： 1 2 4 3 6 7 9 11 10 8 5
posOrderUnRecure2($head);  //结果： 1 2 4 3 6 7 9 11 10 8 5
