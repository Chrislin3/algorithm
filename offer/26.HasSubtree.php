<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入两棵二叉树A，B，判断B是不是A的子结构。（ps：我们约定空树不是任意一个树的子结构）。 P148
 */
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function HasSubtree($pRoot1, $pRoot2)  //先寻找有没有相同的结点
{
    if($pRoot1 == null || $pRoot2 == null){
        return null;
    }
    $result = false;
    if($pRoot1->val == $pRoot2->val){
        $result = DoesTree1HasTree2($pRoot1,$pRoot2);//如果有相同的结点，就开始比较B是不是A的子树
        if(!$result){//如果比较失败，就找A的左子树继续找和B相同的结点
            $result = HasSubtree($pRoot1->left, $pRoot2);
        }
        if(!$result){//如果左子树比较失败，就找A的右子树继续找和B相同的结点
            $result = HasSubtree($pRoot1->right, $pRoot2);
        }

    }
    return $result;
}

function DoesTree1HasTree2($pRoot1,$pRoot2){
    if($pRoot2 == null){ //如果结点B为空，证明B是A的子树
        return true;
    }
    if($pRoot1 == null){
        return false;
    }
    if($pRoot1->val != $pRoot2->val){//如果A的值和B的值不等，直接返回false
        return false;
    }
    return DoesTree1HasTree2($pRoot1->left,$pRoot2->left) && DoesTree1HasTree2($pRoot1->right,$pRoot2->right);//继续比较左子树和右子树，得出最终的result
}

