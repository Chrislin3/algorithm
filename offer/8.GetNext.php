<?php
header("content-type:text/html;charset=utf-8");
/*
 * 二叉树的下一个结点 P65
 * 给定一个二叉树和其中的一个结点，请找出中序遍历顺序的下一个结点并且返回。
 */
class TreeLinkNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function getNext($pNode)
{
    if($pNode->right == null && $pNode->next == null){  //如果既没有右子树有没有父结点，那么它的中序遍历就没有后继结点
        return null;
    }

    if($pNode->right != null){           //如果有右子树，那下一结点就是其右子树最左边的子树
        $cur = $pNode->right;
        while ($cur->left != null){
            $cur = $cur->left;
        }
        return $cur;
    }
    else if($pNode->next != null){
        //如果没有右子树，但是是有父结点，那还要判断该结点是其父结点的左子树还是右子树，
        //如果是它是其父结点左子树，那么这个父结点就是其后继结点，
        //如果它是其父结点的右子树，那还要继续找父结点，直到遍历道的结点是其父结点的左子树，才是找到了后继结点
        $parent = $pNode->next;
        $cur = $pNode;
        while ($parent != null && $cur == $parent->right){
            $cur = $parent;
            $parent = $parent->next;
        }
        if($cur == $parent->left){
            return $parent;
        }
        else{
            return null;
        }

    }

}
$head = new TreeLinkNode(1);
$head->left = new TreeLinkNode(2);
$head->right = new TreeLinkNode(3);
$head->left->next = $head;
$head->right->next = $head;

print_r(getNext($head));

