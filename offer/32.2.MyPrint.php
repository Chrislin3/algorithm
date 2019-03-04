<?php
header("content-type:text/html;charset=utf-8");
/*
 * 从上到下按层打印二叉树，同一层结点从左至右输出。每一层输出一行。 P174
 */
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function MyPrint($pRoot)
{
    $queue = new SplQueue();
    $resultArray = [];

    if($pRoot == null){
        return $resultArray;
    }
    $queue->enqueue($pRoot);
    $line = 0;
    while (!$queue->isEmpty()){

        $array = [];
        $num = $queue->count();
        while ($num ){

            $num --;
            $t = $queue->dequeue();
            if ($t == null)          //即使子结点是null也会被放进队列，此时要判断如果队列中的值时null，就要退出循环
                break;
            $array[] = $t->val;//将该层结点拿出来，然后将它的左右结点放进队列
            $queue->enqueue($t->left);
            $queue->enqueue($t->right);
        }
        if($array){
            if($line%2 == 0){
                $resultArray[] = $array;
            }
            else{
                $resultArray[] = array_reverse($array) ;
            }

        }
        $line++;

    }
    foreach ($resultArray as $value){
        foreach ($value as $val){
            echo $val." ";
        }
        echo "</br>";
    }
 //   return $resultArray;
}
$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->left = new TreeNode(4);
$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(6);
$root->right->right = new TreeNode(7);

MyPrint($root);