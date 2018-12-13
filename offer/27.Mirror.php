<?php
header("content-type:text/html;charset=utf-8");
/*
 * 操作给定的二叉树，将其变换为源二叉树的镜像。 P157
 */
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function Mirror(&$root)
{
    if($root == null){
        return null;
    }
    if($root->left == null && $root->right == null){
        return ;
    }
    $tempNode = $root->left;
    $root->left = $root->right;
    $root->right = $tempNode;
    Mirror($root->left);
    Mirror($root->right);

}