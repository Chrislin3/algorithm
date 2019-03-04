<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入一颗二叉树的跟节点和一个整数，打印出二叉树中结点值的和为输入整数的所有路径。路径定义为从树的根结点开始往下一直到叶结点所经过的结点形成一条路径。
 * (注意: 在返回值的list中，数组长度大的数组靠前) P182
 */
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
$result = [];
function FindPath($root, $expectNumber){
//    global  $result;
    $result = [];
    $array = [];
    Path($root, $expectNumber,$array,$result);
    return $result;
}
function Path($root, $expectNumber,$array,&$result)
{
//    global  $result;
    if($root == null){
        return null;
    }
    $array[] = $root->val;
    $expectNumber = $expectNumber - $root->val;
    if($root->left == null && $root->right == null && $expectNumber == 0){
        $result[] = $array;
    }
    else{
        Path($root->left, $expectNumber,$array,$result);
        Path($root->right, $expectNumber,$array,$result);
    }
    //array_pop($array);
}

$root = new TreeNode(10);
$root->left = new TreeNode(5);
$root->right = new TreeNode(12);
$root->left->left = new TreeNode(4);
$root->left->right = new TreeNode(7);

print_r(FindPath($root,19));