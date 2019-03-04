<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入一棵二叉搜索树，将该二叉搜索树转换成一个排序的双向链表。要求不能创建任何新的结点，只能调整树中结点指针的指向。 P191
 */
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function Convert($pRootOfTree)
{
    if($pRootOfTree ==null){
        return null;
    }
    $pre = null;
    $head = null;
    inOrder($pRootOfTree,$pre,$head);
    return $head;
}

function inOrder($pRootOfTree,&$pre,&$head){
    if($pRootOfTree ==null){
        return $head;
    }
  //  $pre = null;
    inOrder($pRootOfTree->left,$pre,$head);
    $pRootOfTree->left = $pre;
    if($pre != null){
        $pre->right = $pRootOfTree;
    }

    $pre = $pRootOfTree;
    if($head == null){
        $head = $pRootOfTree;
    }
    inOrder($pRootOfTree->right,$pre,$head);
}

$root = new TreeNode(2);
$root->left = new TreeNode(1);
$root->right = new TreeNode(3);
//$root->left->left = new TreeNode(4);
//$root->left->right = new TreeNode(7);
print_r(Convert($root));