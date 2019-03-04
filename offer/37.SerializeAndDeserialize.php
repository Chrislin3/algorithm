<?php
header("content-type:text/html;charset=utf-8");
/*
 * 请实现两个函数，分别用来序列化和反序列化二叉树 P194
 */
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}

function MySerialize($pRoot)
{

    if($pRoot == null){
        $string = "# ";
        return $string;
    }
    else{
        $string = $pRoot->val.' ';
        $string .= MySerialize($pRoot->left);
        $string .= MySerialize($pRoot->right);
        return $string;

    }
  //  return substr($string, 0,-1);

}

function MyDeserialize($s)
{
    if(!$s)
        return null;

    $arr = explode(' ',$s);
    $index = 0;
    $count = count($arr);
    $head  = Deserialize($arr, $index, $count);
    return $head;
}

function Deserialize($arr, &$index, $count) // count的作用是防止索引index溢出,每次递归时$index要记住自己所处的位置，故使用引用
{
    if($index >= $count || $arr[$index] == '#')
    {
        $index++;
        return null ;
    }

    $node = new TreeNode($arr[$index]);
    $index++;
    $node->left = Deserialize($arr, $index, $count);
    $node->right = Deserialize($arr, $index, $count);
    return $node;
}


$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->left = new TreeNode(4);
$root->right->left = new TreeNode(5);
$root->right->right = new TreeNode(6);
$string = MySerialize($root);
echo $string."</br>";

print_r(MyDeserialize($string));
