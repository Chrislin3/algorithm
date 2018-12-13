<?php
header("content-type:text/html;charset=utf-8");
/*
 * 请实现一个函数，用来判断一颗二叉树是不是对称的。注意，如果一个二叉树同此二叉树的镜像是同样的，定义其为对称的。 P159
 */
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function isSymmetrical($pRoot)
{
    if($pRoot == null){
        return null;
    }

    return isSymmetrical2($pRoot,$pRoot);


}

function isSymmetrical2($pRoot1,$pRoot2){
    if($pRoot1->left == null && $pRoot2->right == null){
        return true;
    }
    if($pRoot1->left == null || $pRoot2->right == null){
        return true;
    }
    if($pRoot1->val != $pRoot2->val){
        return false;
    }
    return isSymmetrical2($pRoot1->left,$pRoot2->right) && isSymmetrical2($pRoot1->right,$pRoot2->left);
}