<?php
header("content-type:text/html;charset=utf-8");
/*
 统计完全二叉树的结点个数 P178
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


function nodeNum($head){
    if($head == null){
        return 0;
    }
    $level = 1;//第一层
    $height = mostLeftlevel($head,$level); //求完全二叉树的高度，其实就是最总的层数！

    $nodeNum = bs($head,$level,$height);
    return $nodeNum;
}

function mostLeftLevel($node,$level){
    while ($node != null){

        $level ++;
        $node = $node->left;
    }
    return $level - 1;
}

function bs($node,$level,$height){
    if($level == $height){
        return 1;
    }
    if(mostLeftLevel($node->right,$level + 1) == $height){   //
        return (1 << ($height - $level)) + bs($node->right,$level +1,$height);
    }
    else{
        return (1 << ($height - $level -1)) + bs($node->left,$level +1,$height);
    }
}

$head = new Node(1);
$head->left = new Node(2);
$head->right = new Node(3);
$head->left->left = new Node(4);
$head->left->right = new Node(5);
$head->right->left = new Node(6);
echo nodeNum($head);    //输出结果： 6
