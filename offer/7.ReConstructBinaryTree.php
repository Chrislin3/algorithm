<?php
header("content-type:text/html;charset=utf-8");
/*
 *重建二叉树 P62
 */
class TreeNode
{
    var $val;
    var $left = NULL;
    var $right = NULL;

    function __construct($val)
    {
        $this->val = $val;
    }
}
function reConstructBinaryTree($pre, $vin)
{
    if($pre == null || $vin == null){
        return false;
    }

    $rootValue = $pre[0];
    $root = new TreeNode($rootValue);

    $index = array_search($pre[0],$vin);
    $pre_left = array_slice($pre,1,$index);    //1是数组的截取的起始索引位置，index是截取的长度，而不是截取的结束索引位置！！！并且截取之后原数组pre的长度不变
    $vin_left = array_slice($vin,0,$index);
    $root->left = reConstructBinaryTree($pre_left,$vin_left);

    $pre_right = array_slice($pre,$index + 1);
    $vin_right = array_slice($vin,$index + 1);

    $root->right = reConstructBinaryTree($pre_right,$vin_right);

    return $root;

}

$pre = array(1,2,4,7,3,5,6,8);
$vin = array(4,7,2,1,5,3,8,6);

print_r(reConstructBinaryTree($pre,$vin));


